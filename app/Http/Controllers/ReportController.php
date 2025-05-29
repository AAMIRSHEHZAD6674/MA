<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Inspection;
use App\Models\Office;
use App\Models\StaffAttendance;
use App\Models\StudentAttendance;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Vtiful\Kernel\Excel;

class ReportController extends Controller
{
    public function districtReport(Request $request)
    {
        $startDate = $request->start_date ?? now()->startOfMonth()->toDateString();
        $endDate = $request->end_date ?? now()->endOfMonth()->toDateString();

        $report = District::withCount(['offices as total_inspections' => function ($query) use ($startDate, $endDate) {
            $query->select(DB::raw("COUNT(inspections.id)"))
                ->join('inspections', 'offices.id', '=', 'inspections.office_id')
                ->whereBetween('inspections.created_at', [$startDate, $endDate]);
        }])->paginate(10);

        return view('reports.district', compact('report', 'startDate', 'endDate'));
    }

    public function userWise(Request $request)
    {
        $startDate = $request->input('start_date') ?? now()->startOfMonth()->toDateString();
        $endDate = $request->input('end_date') ?? now()->endOfMonth()->toDateString();

        $users = User::with(['office', 'tehsil'])
            ->withCount(['inspections as total_inspections' => function ($q) use ($startDate, $endDate) {
                $q->whereBetween('created_at', [$startDate, $endDate]);
            }])
            ->withCount(['targets as total_targets' => function ($q) use ($startDate, $endDate) {
                $q->whereBetween('start_date', [$startDate, $endDate]);
            }])
            ->get();

        return view('reports.user-wise', compact('users', 'startDate', 'endDate'));
    }

    public function tehsilReport(Request $request)
    {
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        $query = DB::table('inspections')
            ->join('users', 'inspections.user_id', '=', 'users.id')
            ->join('tehsils', 'users.tehsil_id', '=', 'tehsils.id')
            ->select('tehsils.id', 'tehsils.name', DB::raw('COUNT(inspections.id) as total_inspections'))
            ->groupBy('tehsils.id', 'tehsils.name');

        if ($start_date && $end_date) {
            $query->whereBetween('inspections.created_at', [$start_date, $end_date]);
        }

        $report = $query->get();

        return view('reports.tehsil', compact('report', 'start_date', 'end_date'));
    }

    function schoolWiseReport(Request $request)
    {
        $query = Inspection::with([
            'office.district',
            'user.tehsil.district'
        ]);

        // Date filters
        if ($request->filled('start_date')) {
            $query->whereDate('created_at', '>=', $request->start_date);
        }

        if ($request->filled('end_date')) {
            $query->whereDate('created_at', '<=', $request->end_date);
        }

        $inspections = $query->paginate(20);

        return view('reports.school-wise', [
            'inspections' => $inspections,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);
    }

    public function dailyInspectionSummary(Request $request)
    {
        $start_date = $request->input('start_date', now()->subMonth()->toDateString());
        $end_date = $request->input('end_date', now()->toDateString());

        $summary = Inspection::select(
            DB::raw('DATE(created_at) as date'),
            DB::raw('COUNT(*) as total_inspections')
        )
            ->whereBetween('created_at', [$start_date, $end_date])
            ->groupBy(DB::raw('DATE(created_at)'))
            ->orderBy('date', 'desc')
            ->get();

        return view('reports.daily_inspection_summary', compact('summary', 'start_date', 'end_date'));
    }

    public function staffAttendanceSummary(Request $request)
    {
        $start_date = $request->input('start_date', now()->subMonth()->toDateString());
        $end_date = $request->input('end_date', now()->toDateString());

        // Get summary of staff attendance grouped by user and status
        $summary = StaffAttendance::select(
            'inspections.user_id',
            'users.name as inspector_name',
            'status',
            DB::raw('COUNT(*) as count')
        )
            ->join('inspections', 'staff_attendance.inspection_id', '=', 'inspections.id')
            ->join('users', 'inspections.user_id', '=', 'users.id')
            ->whereBetween('inspections.created_at', [$start_date, $end_date])
            ->groupBy('inspections.user_id', 'status', 'users.name')
            ->orderBy('users.name')
            ->get()
            ->groupBy('inspector_name');  // Group collection by user name

        return view('reports.staff_attendance_summary', compact('summary', 'start_date', 'end_date'));
    }

    public function studentAttendanceSummary(Request $request)
    {
        $start_date = $request->input('start_date', now()->subMonth()->toDateString());
        $end_date = $request->input('end_date', now()->toDateString());

        // Get student attendance summary grouped by inspector (user)
        $summary = StudentAttendance::select(
            'inspections.user_id',
            'users.name as inspector_name',
            DB::raw('SUM(enrollment) as total_enrollment'),
            DB::raw('SUM(absent) as total_absent')
        )
            ->join('inspections', 'student_attendance.inspection_id', '=', 'inspections.id')
            ->join('users', 'inspections.user_id', '=', 'users.id')
            ->whereBetween('inspections.created_at', [$start_date, $end_date])
            ->groupBy('inspections.user_id', 'users.name')
            ->orderBy('users.name')
            ->get();

        return view('reports.student_attendance_summary', compact('summary', 'start_date', 'end_date'));
    }

    public function officesPerformance(Request $request)
    {
        $start_date = $request->input('start_date', now()->subMonth()->toDateString());
        $end_date = $request->input('end_date', now()->toDateString());

        // Get inspection counts per office within date range
        $offices = Office::withCount(['inspections' => function ($query) use ($start_date, $end_date) {
            $query->whereBetween('created_at', [$start_date, $end_date]);
        }])->orderBy('inspections_count', 'desc')->get();

        // Top 5 performing offices
        $top_offices = $offices->take(5);

        // Bottom 5 performing offices (lowest inspections)
        $bottom_offices = $offices->sortBy('inspections_count')->take(5);

        return view('reports.offices_performance', compact('top_offices', 'bottom_offices', 'start_date', 'end_date'));
    }

    public function inspectionVsTargetReport(Request $request)
    {
        $start_date = $request->input('start_date', now()->startOfMonth()->toDateString());
        $end_date = $request->input('end_date', now()->toDateString());

        // Get users with their targets and inspections filtered by date range
        $users = User::with(['office'])
            ->withCount(['inspections as inspections_count' => function ($query) use ($start_date, $end_date) {
                $query->whereBetween('created_at', [$start_date, $end_date]);
            }])
            ->with(['targets' => function ($query) use ($start_date, $end_date) {
                $query->where('status', 'active')
                    ->where(function ($q) use ($start_date, $end_date) {
                        $q->whereBetween('start_date', [$start_date, $end_date])
                            ->orWhereBetween('end_date', [$start_date, $end_date]);
                    });
            }])
            ->get()
            ->map(function ($user) {
                $totalTarget = $user->targets->sum('target_assign');
                $inspectionsDone = $user->inspections_count;

                $percentageAchieved = $totalTarget > 0
                    ? round(($inspectionsDone / $totalTarget) * 100, 2)
                    : 0;

                return (object)[
                    'user_name' => $user->name,
                    'office_name' => $user->office ? $user->office->name : 'N/A',
                    'target_assign' => $totalTarget,
                    'inspections_done' => $inspectionsDone,
                    'percentage_achieved' => $percentageAchieved,
                ];
            });

        // Sort descending by percentage achieved and take top 20
        $topUsers = $users->sortByDesc('percentage_achieved')->take(20);

        // Prepare chart data
        $chartLabels = $topUsers->map(function ($user) {
            return $user->user_name . ' (' . $user->office_name . ')';
        })->toArray();

        $chartData = $topUsers->pluck('percentage_achieved')->toArray();

        return view('reports.inspection_vs_target', compact(
            'users', 'start_date', 'end_date', 'topUsers', 'chartLabels', 'chartData'
        ));
    }



}
