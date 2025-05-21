<?php

namespace App\Http\Controllers;

use App\Models\Inspection;
use App\Models\StaffAttendance;
use App\Models\Target;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // Get user ID from query string for filtering (optional)
        $userId = $request->query('user_id');

        $user = null;
        $inspections = collect(); // fallback empty collection
        $targets = collect();     // fallback empty collection

        if ($userId) {
            // Fetch specific user with targets
            $user = User::with('targets')->find($userId);

            if (!$user) {
                return redirect()->route('dashboard')->with('error', 'User not found');
            }

            // Fetch inspections only for this user
            $inspections = Inspection::where('user_id', $userId)->get();

            // Process targets with achieved count
            $targetsQuery = Target::query();
            if ($userId) {
                $targetsQuery->where('user_id', $userId);
            }
            $targets = $targetsQuery->get();

            // All users list for dropdown
            $users = User::all();
            $user = User::with('targets')->findOrFail($userId);

            $targets = $user->targets->map(function ($target) use ($user) {
                $achieved = Inspection::where('user_id', $user->id)
                    ->whereDate('created_at', '>=', $target->start_date)
                    ->whereDate('created_at', '<=', $target->end_date)
                    ->count();

                $target->achieved = $achieved;
                $target->remaining = max($target->target_assign - $achieved, 0);

                return $target;
            });

        } else {
            // For admin view, fetch all inspections and targets
            $inspections = Inspection::all();
            $targets = Target::all();
        }

        // Aggregated data for charts
        $totalInspections = $inspections->count();
        $openSchools = $inspections->where('school_status', 'open')->count();
        $closedSchools = $inspections->where('school_status', 'close')->count();

        // Staff attendance status summary
        $staffAttendances = DB::table('staff_attendance')
            ->join('inspections', 'staff_attendance.inspection_id', '=', 'inspections.id')
            ->when($userId, function ($query) use ($userId) {
                return $query->where('inspections.user_id', $userId);
            })
            ->select('status', DB::raw('count(*) as count'))
            ->groupBy('status')
            ->pluck('count', 'status')
            ->toArray();

        $staffAttendances = array_merge(['present' => 0, 'absent' => 0], $staffAttendances);

        // Student attendance summary
        $studentData = (array) DB::table('student_attendance')
            ->join('inspections', 'student_attendance.inspection_id', '=', 'inspections.id')
            ->when($userId, function ($query) use ($userId) {
                return $query->where('inspections.user_id', $userId);
            })
            ->select(DB::raw('SUM(enrollment) as total_enrollment'), DB::raw('SUM(absent) as total_absent'))
            ->first();

        $studentAttendances = [
            'total_enrollment' => $studentData['total_enrollment'] ?? 0,
            'total_absent' => $studentData['total_absent'] ?? 0,
        ];

        // All users list for dropdown
        $users = User::all();

        // Locations with coordinates for map view
        $inspection_map = Inspection::whereNotNull('latitude')
            ->whereNotNull('longitude')
            ->get(['id', 'school_code', 'latitude', 'longitude']);

        return view('dashboard', compact(
            'totalInspections',
            'openSchools',
            'closedSchools',
            'staffAttendances',
            'studentAttendances',
            'targets',
            'users',
            'user',
            'inspection_map'
        ));
    }

}
