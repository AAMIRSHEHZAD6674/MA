<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Inspection;
use App\Models\Tehsil;
use App\Models\UnionCouncil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class InspectionController extends Controller
{
    public function store(Request $request)
    {
        // Validate main inspection data
        $validated = $request->validate([
            'school_code' => 'required|string|max:50',
            'district_id' => 'required|exists:districts,id',
            'user_id' => 'required|exists:users,id',
            'school_status' => 'required|in:open,close',
            'students_cleanliness' => 'required|boolean',
            'school_cleanliness' => 'required|boolean',
            'head_management_assessment' => 'nullable|string',
            'teaching_learning_assessment' => 'nullable|string',
            'attachments'=>'nullable',
            'data'=>'nullable',
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
        //$validated['user_id'] = auth()->id();
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

        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'message' => 'Failed to create inspection.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function login(Request $request)
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
            // Create a personal access token
            $token = $user->createToken('YourAppName')->plainTextToken;
            $districts = District::all();
            $tehsils   = Tehsil::all();
            $union_council = UnionCouncil::all();

            // Return the token in the response
            return response()->json(['token' => $token,'user_id'=>$user->id,'data'=>['error'=>'false','message'=>'Successfully Login','districts'=>$districts,'tehsils'=>$tehsils,'union_council'=>$union_council]]);
        }

        // If authentication fails
        return response()->json(['data'=>['error'=>'true','message'=>'Unauthorized User']]);
    }

}
