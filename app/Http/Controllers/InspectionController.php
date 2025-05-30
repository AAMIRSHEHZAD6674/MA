<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Inspection;
use App\Models\Tehsil;
use App\Models\UnionCouncil;
use App\Models\User;
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
            'school_code' => 'required|string|max:50',
            'office_id' => 'required|exists:offices,id',
            'user_id' => 'required|exists:users,id',
            'school_status' => 'required|in:open,close',
            'students_cleanliness' => 'required|boolean',
            'school_cleanliness' => 'required|boolean',
            'head_management_assessment' => 'nullable|string',
            'teaching_learning_assessment' => 'nullable|string',
            'attachments' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5120',
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
        //$validated['user_id'] = auth()->id();
        DB::beginTransaction();

        try {
            // uploads attachments
//            $uploadedImagePaths = [];
//                if ($request->hasFile('attachments')) {
//                foreach ($request->file('attachments') as $image) {
//                    $filename = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
//                    $path = $image->storeAs('public/uploads', $filename);
//                    $uploadedImagePaths[] = $path;
//                }
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
            // step 03:  now create template from the data
//            $api = json_decode($api_response, true);
//            $schools = collect($api['resultDesc'])->map(function ($item) {
//                return [
//                    'School_name' => $item['School_name'],
//                    'EMIS_CODE' => $item['EMIS_CODE'],
//                ];
//            });
            $templateResponse = $this->template_for_app();

            // step 04: return template including data


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
                'office' => $user->office_id, 'resultDesc' => $api_data,
                'targets' => $targets, 'template' => $templateResponse,
                'data' => ['error' => 'false', 'message' => 'Successfully Login']]);
        }

        // If authentication fails
        return response()->json(['data' => ['error' => 'true', 'message' => 'Unauthorized User']]);
    }

    public function template_for_app()
    {

        $template = [
            "formId" => "school_inspection_form",
            "formName" => "School Inspection Form",
            "pages" => [
                [
                    "title" => "School Info",
                    "fields" => [
                        [
                            "key" => "school_code",
                            "type" => "dropdown",
                            "label" => "School Code",
                            "validation" => ["required" => true],
                        ],
                        [
                            "key" => "district_id",
                            "type" => "dropdown",
                            "label" => "District",
                            "validation" => ["required" => true],
                            "dataSource" => "districts"
                        ],
                        [
                            "key" => "user_id",
                            "type" => "dropdown",
                            "label" => "Inspector",
                            "validation" => ["required" => true],
                            "dataSource" => "users"
                        ],
                        [
                            "key" => "school_status",
                            "type" => "radio",
                            "label" => "School Status",
                            "options" => [
                                ["display" => "Open", "value" => "open"],
                                ["display" => "Close", "value" => "close"]
                            ],
                            "validation" => ["required" => true]
                        ],
                        [
                            "key" => "students_cleanliness",
                            "type" => "radio",
                            "label" => "Students Cleanliness",
                            "options" => [
                                ["display" => "Yes", "value" => true],
                                ["display" => "No", "value" => false]
                            ],
                            "validation" => ["required" => true]
                        ],
                        [
                            "key" => "school_cleanliness",
                            "type" => "radio",
                            "label" => "School Cleanliness",
                            "options" => [
                                ["display" => "Yes", "value" => true],
                                ["display" => "No", "value" => false]
                            ],
                            "validation" => ["required" => true]
                        ],
                        [
                            "key" => "head_management_assessment",
                            "type" => "text",
                            "label" => "Head Management Assessment",
                            "validation" => ["required" => false]
                        ],
                        [
                            "key" => "teaching_learning_assessment",
                            "type" => "text",
                            "label" => "Teaching & Learning Assessment",
                            "validation" => ["required" => false]
                        ],
                        [
                            "key" => "attachments",
                            "type" => "photo",
                            "label" => "Attachments",
                            "validation" => [
                                "required" => false,
                                "maxSizeInMB" => 5.0,
                                "maxSizeMessage" => "File cannot exceed 5MB",
                                "minCount" => 0,
                                "maxCount" => 5,
                                "allowedExtensions" => ["jpg", "jpeg", "png", "pdf"],
                                "allowedExtensionsMessage" => "Only JPG, JPEG, PNG, PDF files are allowed"
                            ]
                        ],
                        [
                            "key" => "latitude",
                            "type" => "text",
                            "label" => "Latitude",
                            "validation" => [
                                "required" => false,
                                "pattern" => "^-?([1-8]?\\d(\\.\\d+)?|90(\\.0+)?)\$",
                                "inputType" => "number",
                                "patternMessage" => "Enter a valid latitude (-90 to 90)"
                            ]
                        ],
                        [
                            "key" => "longitude",
                            "type" => "text",
                            "label" => "Longitude",
                            "validation" => [
                                "required" => false,
                                "pattern" => "^-?(180(\\.0+)?|((1[0-7]\\d)|([1-9]?\\d))(\\.\\d+)?)\$",
                                "inputType" => "number",
                                "patternMessage" => "Enter a valid longitude (-180 to 180)"
                            ]
                        ]
                    ]
                ],
                [
                    "title" => "Staff Attendance",
                    "fields" => [
                        [
                            "key" => "staff_attendances",
                            "type" => "repeater",
                            "label" => "Staff Attendances",
                            "children" => [
                                [
                                    "key" => "name",
                                    "type" => "text",
                                    "label" => "Name",
                                    "validation" => ["required" => true]
                                ],
                                [
                                    "key" => "personal_number",
                                    "type" => "text",
                                    "label" => "Personal No.",
                                    "validation" => ["required" => true]
                                ],
                                [
                                    "key" => "cnic",
                                    "type" => "text",
                                    "label" => "CNIC",
                                    "validation" => ["required" => true]
                                ],
                                [
                                    "key" => "designation",
                                    "type" => "text",
                                    "label" => "Designation",
                                    "validation" => ["required" => true]
                                ],
                                [
                                    "key" => "status",
                                    "type" => "radio",
                                    "label" => "Status",
                                    "options" => [
                                        ["display" => "Present", "value" => "present"],
                                        ["display" => "Absent", "value" => "absent"]
                                    ],
                                    "validation" => ["required" => true]
                                ]
                            ]
                        ]
                    ]
                ],
                [
                    "title" => "Student Attendance",
                    "fields" => [
                        [
                            "key" => "student_attendances",
                            "type" => "repeater",
                            "label" => "Student Attendances",
                            "children" => [
                                [
                                    "key" => "class",
                                    "type" => "text",
                                    "label" => "Class",
                                    "validation" => ["required" => true]
                                ],
                                [
                                    "key" => "enrollment",
                                    "type" => "text",
                                    "label" => "Enrollment",
                                    "validation" => ["required" => true, "inputType" => "number"]
                                ],
                                [
                                    "key" => "absent",
                                    "type" => "text",
                                    "label" => "Absent",
                                    "validation" => ["required" => true, "inputType" => "number"]
                                ]
                            ]
                        ]
                    ]
                ]
            ]
        ];

        return response()->json($template);
    }


}


