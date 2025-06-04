<?php

namespace App\Http\Controllers;

use App\Models\Office;
use App\Models\Tehsil;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class OfficeController extends Controller
{
    public function getTehsils($officeId): JsonResponse
    {
        $office = Office::findOrFail($officeId);

        // Assuming Office belongsTo District, and Tehsil has district_id
        $tehsils = Tehsil::where('district_id', $office->district_id)->get(['id', 'name', 'ucs', 'union_councils']);

        return response()->json($tehsils);
    }

    public function getOfficesByDistrict(Request $request): JsonResponse
    {
        $offices = Office::where('district_id', $request->district_id)->get(['id', 'name']);
        return response()->json($offices);
    }
}
