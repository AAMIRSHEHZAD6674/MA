<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Inspection;
use App\Models\Tehsil;
use App\Models\User;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Http;

class InspectionController extends Controller
{
    public function store(Request $request)
    {

        // Validate main inspection data
        $validated = $request->validate([
            'school_code' => 'required|integer',
            'office_id' => 'required|exists:offices,id',
            'user_id' => 'required|exists:users,id',
            'school_status' => 'required|in:open,close',
            'students_cleanliness' => 'required|boolean',
            'school_cleanliness' => 'required|boolean',
            'head_management_assessment' => 'nullable|string',
            'teaching_learning_assessment' => 'nullable|string',
            'attachments' => 'nullable|array',
            'attachments.*' => 'nullable|string',
            'data' => 'nullable',
            'latitude' => 'nullable|numeric|between:-90,90',
            'longitude' => 'nullable|numeric|between:-180,180',


            // Nested arrays
            'staff_attendances' => 'required|array',
            'staff_attendances.*.name' => 'required|string',
            'staff_attendances.*.personal_number' => 'required|string',
            'staff_attendances.*.cnic' => 'required|string',
            'staff_attendances.*.designation' => 'required|string',
            'staff_attendances.*.status' => 'required|in:present,absent',

            'student_attendances' => 'required|array',
            'student_attendances.*.class' => 'required|string',
            'student_attendances.*.enrollment' => 'required|integer',
            'student_attendances.*.absent' => 'required|integer',
        ]);
        DB::beginTransaction();

        try {
            // Create Inspection
            $inspection = Inspection::create($validated);

            // Attach Staff Attendance
            foreach ($validated['staff_attendances'] as $staff) {
                $inspection->staffAttendances()->create($staff);
            }

            // Attach Student Attendance
            foreach ($validated['student_attendances'] as $student) {
                $inspection->studentAttendances()->create($student);
            }

            DB::commit();

            return response()->json([
                'message' => 'Inspection created successfully.',
            ], 201);

        } catch (Exception $e) {
            DB::rollBack();

            return response()->json([
                'message' => 'Failed to create inspection.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function login(Request $request): JsonResponse
    {
        // Validate incoming data
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        // Attempt to authenticate user
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            $token = $user->createToken('YourAppName')->plainTextToken;
            $users_data = User::with(['tehsil', 'office.district'])->findOrFail($user->id);
            $district_name = strtolower($users_data->office->district->name);
            $gender = strtolower($users_data->office->gender);
            $tehsil = strtolower($users_data->tehsil->name);
            if ($users_data->role === 'deo') {
                $api_response = Http::get('http://175.107.63.44:81/pndservices/pnDServices.php?API=398dea8c6877432d4aa2d828f4bcb2fb&_f=GetSchoolDataForAdminVisits&d=' . $district_name . '&g=' . $gender);
            } elseif ($users_data->role === 'sdeo') {
                $api_response = Http::get('http://175.107.63.44:81/pndservices/pnDServices.php?API=398dea8c6877432d4aa2d828f4bcb2fb&_f=GetSchoolDataForAdminVisits&d=' . $district_name . '&g=' . $gender . '&t=' . $tehsil);
                //return $api_response;
            } elseif ($users_data->role === 'asdeo') {
                $api_response = Http::get('http://175.107.63.44:81/pndservices/pnDServices.php?API=398dea8c6877432d4aa2d828f4bcb2fb&_f=GetSchoolDataForAdminVisits&d=' . $district_name . '&g=' . $gender . '&t=' . $tehsil . '&co=' . $district_name . '%20(M)');
                //return $api_response;
            }
            $api_data = $api_response->json();
            $cleaned_api_data = $api_data['resultDesc'] ?? [];
            $targets = $user->targets
                ->filter(function ($target) {
                    return $target->status === 'active';
                })
                ->map(function ($target) use ($user) {
                    $achieved = Inspection::where('user_id', $user->id)
                        ->count();

                    $target->achieved = $achieved;
                    $target->remaining = max($target->target_assign - $achieved, 0);

                    return $target;
                });
            // Return the token in the response
            return response()->json(['token' => $token, 'user_id' => $user->id,
                'office' => $user->office_id, 'resultDesc' => $cleaned_api_data,
                'targets' => $targets,
                'data' => ['error' => 'false', 'message' => 'Successfully Login']]);
        }

        // If authentication fails
        return response()->json(['data' => ['error' => 'true', 'message' => 'Unauthorized User']]);
    }


}


