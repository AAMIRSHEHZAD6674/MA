<?php

namespace App\Http\Controllers;

use App\Models\Inspection;
use App\Models\Office;
use App\Models\Target;
use App\Models\Tehsil;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $authUser = Auth::user();
        $userId = $request->query('user_id');
        $startDate = $request->query('start_date') ?: now()->startOfMonth()->toDateString();
        $endDate = $request->query('end_date') ?: now()->toDateString();

        $user = null;

        // Determine user's district for DEO/SDEO/ASDEO
        $userDistrictId = in_array($authUser->role, ['deo', 'sdeo', 'asedo']) ? $authUser->district_id : null;

        // Filter users list based on role
        $users = User::when($authUser->role != 'admin', function ($q) use ($userDistrictId) {
            $q->whereHas('office', function ($q2) use ($userDistrictId) {
                $q2->where('district_id', $userDistrictId);
            });
        })->get();


        // Filtered inspections
        $inspections = Inspection::query()
            ->when($userId, fn($q) => $q->where('user_id', $userId))
            ->when($authUser->role != 'admin', function ($q) use ($userDistrictId) {
                $q->whereHas('office', fn($q2) => $q2->where('district_id', $userDistrictId));
            })
            ->when($startDate, fn($q) => $q->whereDate('created_at', '>=', $startDate))
            ->when($endDate, fn($q) => $q->whereDate('created_at', '<=', $endDate))
            ->get();

        // Staff Attendance Summary
        $staffAttendances = DB::table('staff_attendance')
            ->join('inspections', 'staff_attendance.inspection_id', '=', 'inspections.id')
            ->when($userId, fn($q) => $q->where('inspections.user_id', $userId))
            ->when($authUser->role != 'admin', function ($q) use ($userDistrictId) {
                $q->whereIn('inspections.office_id', Office::where('district_id', $userDistrictId)->pluck('id'));
            })
            ->when($startDate, fn($q) => $q->whereDate('inspections.created_at', '>=', $startDate))
            ->when($endDate, fn($q) => $q->whereDate('inspections.created_at', '<=', $endDate))
            ->select('status', DB::raw('count(*) as count'))
            ->groupBy('status')
            ->pluck('count', 'status')
            ->toArray();

        $staffAttendances = array_merge(['present' => 0, 'absent' => 0], $staffAttendances);

        // Student Attendance Summary
        $studentData = (array)DB::table('student_attendance')
            ->join('inspections', 'student_attendance.inspection_id', '=', 'inspections.id')
            ->when($userId, fn($q) => $q->where('inspections.user_id', $userId))
            ->when($authUser->role != 'admin', function ($q) use ($userDistrictId) {
                $q->whereIn('inspections.office_id', Office::where('district_id', $userDistrictId)->pluck('id'));
            })
            ->when($startDate, fn($q) => $q->whereDate('inspections.created_at', '>=', $startDate))
            ->when($endDate, fn($q) => $q->whereDate('inspections.created_at', '<=', $endDate))
            ->select(DB::raw('SUM(enrollment) as total_enrollment'), DB::raw('SUM(absent) as total_absent'))
            ->first();

        $studentAttendances = [
            'total_enrollment' => $studentData['total_enrollment'] ?? 0,
            'total_absent' => $studentData['total_absent'] ?? 0,
        ];

        // Targets and Achievements
        if ($userId) {
            $user = User::with('targets')->findOrFail($userId);

            $targets = $user->targets->map(function ($target) use ($user, $startDate, $endDate) {
                $query = Inspection::where('user_id', $user->id)
                    ->whereDate('created_at', '>=', $target->start_date)
                    ->whereDate('created_at', '<=', $target->end_date)
                    ->whereDate('created_at', '>=', $startDate)
                    ->whereDate('created_at', '<=', $endDate);

                $achieved = $query->count();
                $target->achieved = $achieved;
                $target->remaining = max($target->target_assign - $achieved, 0);
                return $target;
            });
        } else {
            $targets = Target::with('user')
                ->when($authUser->role != 'admin', function ($q) use ($userDistrictId) {
                    $q->whereHas('user.office', function ($q2) use ($userDistrictId) {
                        $q2->where('district_id', $userDistrictId);
                    });
                })
                ->get()
                ->map(function ($target) use ($startDate, $endDate) {
                    $query = Inspection::where('user_id', $target->user_id)
                        ->whereDate('created_at', '>=', $target->start_date)
                        ->whereDate('created_at', '<=', $target->end_date)
                        ->whereDate('created_at', '>=', $startDate)
                        ->whereDate('created_at', '<=', $endDate);

                    $achieved = $query->count();
                    $target->achieved = $achieved;
                    $target->remaining = max($target->target_assign - $achieved, 0);

                    return $target;
                });


        }

        // Map data
        $inspection_map = Inspection::query()
            ->whereNotNull('latitude')
            ->whereNotNull('longitude')
            ->when($userId, fn($q) => $q->where('user_id', $userId))
            ->when($authUser->role != 'admin', function ($q) use ($userDistrictId) {
                $q->whereIn('office_id', Office::where('district_id', $userDistrictId)->pluck('id'));
            })
            ->when($startDate, fn($q) => $q->whereDate('created_at', '>=', $startDate))
            ->when($endDate, fn($q) => $q->whereDate('created_at', '<=', $endDate))
            ->get(['id', 'school_code', 'latitude', 'longitude']);

        $totalInspections = $inspections->count();
        $openSchools = $inspections->where('school_status', 'open')->count();
        $closedSchools = $inspections->where('school_status', 'close')->count();

        // Role-based filtered reports
        $districtWiseReport = $this->districtWiseReport($startDate, $endDate, $authUser);
        $userWiseReport = $this->userWiseReport($startDate, $endDate, $authUser);
        $tehsilWiseReport = $this->tehsilWiseReport($startDate, $endDate, $authUser);
        $inspectionVsTarget = $this->inspectionVsTargetReport($startDate, $endDate, $authUser);
        $topBottomOffices = $this->officesPerformanceReport($startDate, $endDate, $authUser);

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

    // ==================== Report Helpers (with auth) ========================

    private function districtWiseReport($startDate, $endDate, $authUser)
    {
        return Inspection::query()
            ->when($authUser->role != 'admin', function ($q) use ($authUser) {
                $q->whereHas('office', fn($q2) => $q2->where('district_id', $authUser->district_id));
            })
            ->whereBetween('created_at', [$startDate, $endDate])
            ->select('office_id', DB::raw('count(*) as total_inspections'))
            ->groupBy('office_id')
            ->with('district')
            ->get();
    }

    private function userWiseReport($startDate, $endDate, $authUser)
    {
        return User::when($authUser->role != 'admin', function ($q) use ($authUser) {
            $q->whereHas('office', function ($query) use ($authUser) {
                $query->where('district_id', $authUser->district_id);
            });
        })
            ->withCount(['inspections' => function ($q) use ($startDate, $endDate) {
                $q->whereBetween('created_at', [$startDate, $endDate]);
            }])
            ->get();

    }

    private function tehsilWiseReport($startDate, $endDate, $authUser)
    {
        return Tehsil::when($authUser->role != 'admin', fn($q) => $q->where('district_id', $authUser->district_id))
            ->withCount(['users as inspections_count' => function ($query) use ($startDate, $endDate) {
                $query->whereHas('inspections', fn($q) => $q->whereBetween('created_at', [$startDate, $endDate]));
            }])
            ->get();
    }

    private function inspectionVsTargetReport($startDate, $endDate, $authUser)
    {
        return User::when($authUser->role != 'admin', function ($q) use ($authUser) {
            $q->whereHas('office', function ($query) use ($authUser) {
                $query->where('district_id', $authUser->district_id);
            });
        })
            ->withCount(['inspections' => function ($q) use ($startDate, $endDate) {
                $q->whereBetween('created_at', [$startDate, $endDate]);
            }])
            ->with(['targets' => function ($q) use ($startDate, $endDate) {
                $q->where('status', 'active')
                    ->where(function ($q2) use ($startDate, $endDate) {
                        $q2->whereBetween('start_date', [$startDate, $endDate])
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

    }

    private function officesPerformanceReport($startDate, $endDate, $authUser)
    {
        $query = DB::table('offices')
            ->leftJoin('inspections', 'offices.id', '=', 'inspections.office_id')
            ->select('offices.id', 'offices.name', DB::raw('COUNT(inspections.id) as inspections_count'))
            ->whereBetween('inspections.created_at', [$startDate, $endDate]);

        if ($authUser->role != 'admin') {
            $query->where('offices.district_id', $authUser->district_id);
        }

        $officeCounts = $query
            ->groupBy('offices.id', 'offices.name')
            ->orderByDesc('inspections_count')
            ->get();

        return [
            'topPerforming' => $officeCounts->take(5),
            'bottomPerforming' => $officeCounts->sortBy('inspections_count')->take(5),
        ];
    }
}
