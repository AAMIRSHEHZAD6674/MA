<?php

namespace App\Http\Controllers;

use App\Models\Inspection;
use App\Models\StaffAttendance;
use App\Models\Target;
use App\Models\Tehsil;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $userId = $request->query('user_id');
        $startDate = $request->query('start_date') ?: now()->startOfMonth()->toDateString();
        $endDate = $request->query('end_date') ?: now()->toDateString();

        $user = null;

        // Filtered inspections
        $inspections = Inspection::query()
            ->when($userId, fn($q) => $q->where('user_id', $userId))
            ->when($startDate, fn($q) => $q->whereDate('created_at', '>=', $startDate))
            ->when($endDate, fn($q) => $q->whereDate('created_at', '<=', $endDate))
            ->get();

        // Staff attendance summary
        $staffAttendances = DB::table('staff_attendance')
            ->join('inspections', 'staff_attendance.inspection_id', '=', 'inspections.id')
            ->when($userId, fn($q) => $q->where('inspections.user_id', $userId))
            ->when($startDate, fn($q) => $q->whereDate('inspections.created_at', '>=', $startDate))
            ->when($endDate, fn($q) => $q->whereDate('inspections.created_at', '<=', $endDate))
            ->select('status', DB::raw('count(*) as count'))
            ->groupBy('status')
            ->pluck('count', 'status')
            ->toArray();

        $staffAttendances = array_merge(['present' => 0, 'absent' => 0], $staffAttendances);

        // Student attendance summary
        $studentData = (array)DB::table('student_attendance')
            ->join('inspections', 'student_attendance.inspection_id', '=', 'inspections.id')
            ->when($userId, fn($q) => $q->where('inspections.user_id', $userId))
            ->when($startDate, fn($q) => $q->whereDate('inspections.created_at', '>=', $startDate))
            ->when($endDate, fn($q) => $q->whereDate('inspections.created_at', '<=', $endDate))
            ->select(DB::raw('SUM(enrollment) as total_enrollment'), DB::raw('SUM(absent) as total_absent'))
            ->first();

        $studentAttendances = [
            'total_enrollment' => $studentData['total_enrollment'] ?? 0,
            'total_absent' => $studentData['total_absent'] ?? 0,
        ];

        // Targets and achievements
        if ($userId) {
            $user = User::with('targets')->findOrFail($userId);

            $targets = $user->targets->map(function ($target) use ($user, $startDate, $endDate) {
                $query = Inspection::where('user_id', $user->id)
                    ->whereDate('created_at', '>=', $target->start_date)
                    ->whereDate('created_at', '<=', $target->end_date);

                if ($startDate) $query->whereDate('created_at', '>=', $startDate);
                if ($endDate) $query->whereDate('created_at', '<=', $endDate);

                $achieved = $query->count();
                $target->achieved = $achieved;
                $target->remaining = max($target->target_assign - $achieved, 0);

                return $target;
            });
        } else {
            $targets = Target::with('user')->get()->map(function ($target) use ($startDate, $endDate) {
                $query = Inspection::where('user_id', $target->user_id)
                    ->whereDate('created_at', '>=', $target->start_date)
                    ->whereDate('created_at', '<=', $target->end_date);

                if ($startDate) $query->whereDate('created_at', '>=', $startDate);
                if ($endDate) $query->whereDate('created_at', '<=', $endDate);

                $achieved = $query->count();
                $target->achieved = $achieved;
                $target->remaining = max($target->target_assign - $achieved, 0);

                return $target;
            });
        }

        // Inspection map points
        $inspection_map = Inspection::query()
            ->whereNotNull('latitude')
            ->whereNotNull('longitude')
            ->when($userId, fn($q) => $q->where('user_id', $userId))
            ->when($startDate, fn($q) => $q->whereDate('created_at', '>=', $startDate))
            ->when($endDate, fn($q) => $q->whereDate('created_at', '<=', $endDate))
            ->get(['id', 'school_code', 'latitude', 'longitude']);

        $totalInspections = $inspections->count();
        $openSchools = $inspections->where('school_status', 'open')->count();
        $closedSchools = $inspections->where('school_status', 'close')->count();
        $users = User::all();

        // ===== Additional reports integration =====

        $districtWiseReport = $this->districtWiseReport($startDate, $endDate);
        $userWiseReport = $this->userWiseReport($startDate, $endDate);
        $tehsilWiseReport = $this->tehsilWiseReport($startDate, $endDate);
        $inspectionVsTarget = $this->inspectionVsTargetReport($startDate, $endDate);
        $topBottomOffices = $this->officesPerformanceReport($startDate, $endDate);

        return view('dashboard', compact(
            'totalInspections',
            'openSchools',
            'closedSchools',
            'staffAttendances',
            'studentAttendances',
            'targets',
            'users',
            'user',
            'inspection_map',
            'districtWiseReport',
            'userWiseReport',
            'tehsilWiseReport',
            'inspectionVsTarget',
            'topBottomOffices',
            'startDate',
            'endDate'
        ));
    }

    // === Helper methods for additional reports ===

    private function districtWiseReport($startDate, $endDate)
    {
        return Inspection::select('office_id', DB::raw('count(*) as total_inspections'))
            ->whereBetween('created_at', [$startDate, $endDate])
            ->groupBy('office_id')
            ->with('district')
            ->get();
    }

    private function userWiseReport($startDate, $endDate)
    {
        return User::withCount(['inspections' => function ($query) use ($startDate, $endDate) {
            $query->whereBetween('created_at', [$startDate, $endDate]);
        }])->get();
    }

    private function tehsilWiseReport($startDate, $endDate)
    {
        return Tehsil::withCount(['users as inspections_count' => function ($query) use ($startDate, $endDate) {
            $query->whereHas('inspections', function ($q) use ($startDate, $endDate) {
                $q->whereBetween('created_at', [$startDate, $endDate]);
            });
        }])->get();
    }

    private function inspectionVsTargetReport($startDate, $endDate)
    {
        $users = User::withCount(['inspections' => function ($query) use ($startDate, $endDate) {
            $query->whereBetween('created_at', [$startDate, $endDate]);
        }])
            ->with(['targets' => function ($query) use ($startDate, $endDate) {
                $query->where('status', 'active')
                    ->where(function ($q) use ($startDate, $endDate) {
                        $q->whereBetween('start_date', [$startDate, $endDate])
                            ->orWhereBetween('end_date', [$startDate, $endDate]);
                    });
            }])
            ->get()
            ->map(function ($user) {
                $totalTarget = $user->targets->sum('target_assign');
                return (object)[
                    'user_name' => $user->name,
                    'target_assign' => $totalTarget,
                    'inspections_done' => $user->inspections_count,
                    'percentage_achieved' => $totalTarget > 0 ? round(($user->inspections_count / $totalTarget) * 100, 2) : 0,
                ];
            });

        return $users;
    }

    private function officesPerformanceReport($startDate, $endDate)
    {
        $officeCounts = DB::table('offices')
            ->leftJoin('inspections', 'offices.id', '=', 'inspections.office_id')
            ->select('offices.id', 'offices.name', DB::raw('COUNT(inspections.id) as inspections_count'))
            ->whereBetween('inspections.created_at', [$startDate, $endDate])
            ->groupBy('offices.id', 'offices.name')
            ->orderByDesc('inspections_count')
            ->get();

        $topPerforming = $officeCounts->take(5);
        $bottomPerforming = $officeCounts->sortBy('inspections_count')->take(5);

        return compact('topPerforming', 'bottomPerforming');
    }
}
