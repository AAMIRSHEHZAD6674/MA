<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class FormController extends Controller
{
    public function getSchoolAttendanceForm(): JsonResponse
    {
        $form = [
            "formId" => "school_attendance_form",
            "formName" => "School Attendance and Cleanliness Form",
            "pages" => [
                [
                    "title" => "School Info",
                    "fields" => [
                        [
                            "key" => "school_code",
                            "type" => "dropdown",
                            "label" => "EMIS Code",
                            "options" => [],
                            "validation" => ["required" => true]
                        ],
                        [
                            "key" => "uc_name",
                            "type" => "text",
                            "label" => "UC Name",
                            "readonly" => true
                        ],
                        [
                            "key" => "school_name",
                            "type" => "text",
                            "label" => "School Name",
                            "readonly" => true
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
                                ["display" => "Yes", "value" => "yes"],
                                ["display" => "No", "value" => "no"]
                            ],
                            "validation" => ["required" => true]
                        ],
                        [
                            "key" => "school_cleanliness",
                            "type" => "radio",
                            "label" => "School Cleanliness",
                            "options" => [
                                ["display" => "Yes", "value" => "yes"],
                                ["display" => "No", "value" => "no"]
                            ],
                            "validation" => ["required" => true]
                        ],
                        [
                            "key" => "head_management_assessment",
                            "type" => "text",
                            "label" => "Head Management Assessment",
                            "validation" => ["required" => false,"inputType"=> "multiline"]
                        ],
                        [
                            "key" => "teaching_learning_assessment",
                            "type" => "text",
                            "label" => "Teaching & Learning Assessment",
                            "validation" => ["required" => false,"inputType"=> "multiline"]
                        ],
                        [
                            "key" => "school_photo",
                            "type" => "photo",
                            "label" => "School Photo",
                            "validation" => [
                                "required" => false,
                                "requiredMessage" => "Please upload your passport photo",
                                "maxSizeInMB" => 3.0,
                                "maxSizeMessage" => "Passport photo cannot exceed 1MB",
                                "minCount" => 1,
                                "minCountMessage" => "Please upload at least 1 photo",
                                "maxCount" => 3,
                                "maxCountMessage" => "You can upload maximum 1 photo",
                                "allowedExtensions" => ["jpg", "jpeg", "png"],
                                "allowedExtensionsMessage" => "Only JPG, JPEG, PNG files are allowed"
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
                                "requiredMessage" => "Please enter latitude",
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
                                "requiredMessage" => "Please enter longitude",
                                "patternMessage" => "Enter a valid longitude (-180 to 180)"
                            ]
                        ],
                    ]
                ],
                [
                    "title" => "Staff Attendance",
                    "fields" => [
                        [
                            "key" => "staff_attendances",
                            "type" => "repeater",
                            "label" => "Teacher Attendance",
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
                                    "mask" => "#####-#######-#",
                                    "validation" => ["required" => true, "inputType" => "number"]
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
                            "label" => "Student Attendance",
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

        return response()->json($form);
    }
}
