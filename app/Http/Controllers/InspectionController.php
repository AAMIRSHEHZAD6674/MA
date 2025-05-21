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
            $api = [
                [
                    'school_code' => 'SCH001',
                    'district_name' => 'Lahore',
                    'union_council_name' => 'UC Lahore 1',
                    'school_address' => '123 Main Street, Lahore',
                    'tehsil_name' => 'Lahore City',
                ],
                [
                    'school_code' => 'SCH002',
                    'district_name' => 'Faisalabad',
                    'union_council_name' => 'UC Faisalabad 5',
                    'school_address' => '45 Millat Town, Faisalabad',
                    'tehsil_name' => 'Faisalabad Saddar',
                ],
                [
                    'school_code' => 'SCH003',
                    'district_name' => 'Multan',
                    'union_council_name' => 'UC Multan 3',
                    'school_address' => '78 Gulgasht Colony, Multan',
                    'tehsil_name' => 'Multan City',
                ],
                [
                    'school_code' => 'SCH004',
                    'district_name' => 'Rawalpindi',
                    'union_council_name' => 'UC Rawalpindi 7',
                    'school_address' => '22 Satellite Town, Rawalpindi',
                    'tehsil_name' => 'Rawalpindi City',
                ],
                [
                    'school_code' => 'SCH005',
                    'district_name' => 'Gujranwala',
                    'union_council_name' => 'UC Gujranwala 2',
                    'school_address' => '11 Civil Lines, Gujranwala',
                    'tehsil_name' => 'Gujranwala City',
                ],
                [
                    'school_code' => 'SCH006',
                    'district_name' => 'Sialkot',
                    'union_council_name' => 'UC Sialkot 4',
                    'school_address' => '90 Paris Road, Sialkot',
                    'tehsil_name' => 'Sialkot Tehsil',
                ],
                [
                    'school_code' => 'SCH007',
                    'district_name' => 'Bahawalpur',
                    'union_council_name' => 'UC Bahawalpur 1',
                    'school_address' => '55 Model Town A, Bahawalpur',
                    'tehsil_name' => 'Bahawalpur City',
                ],
                [
                    'school_code' => 'SCH008',
                    'district_name' => 'Sargodha',
                    'union_council_name' => 'UC Sargodha 3',
                    'school_address' => '301 Satellite Town, Sargodha',
                    'tehsil_name' => 'Sargodha Tehsil',
                ],
                [
                    'school_code' => 'SCH009',
                    'district_name' => 'Rahim Yar Khan',
                    'union_council_name' => 'UC RYK 2',
                    'school_address' => '88 Gulshan-e-Iqbal, RYK',
                    'tehsil_name' => 'RYK City',
                ],
                [
                    'school_code' => 'SCH010',
                    'district_name' => 'Dera Ghazi Khan',
                    'union_council_name' => 'UC DG Khan 6',
                    'school_address' => '123 College Road, DG Khan',
                    'tehsil_name' => 'DG Khan Tehsil',
                ],
            ];




            // Return the token in the response
            return response()->json(['token' => $token,'user_id'=>$user->id,'district_id'=>$user->district_id,'targets'=>$targets,'api_data'=>$api,'data'=>['error'=>'false','message'=>'Successfully Login']]);
        }

        // If authentication fails
        return response()->json(['data'=>['error'=>'true','message'=>'Unauthorized User']]);
    }

}
