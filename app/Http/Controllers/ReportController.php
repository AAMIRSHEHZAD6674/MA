<?php

namespace App\Http\Controllers;

use App\Models\Inspection;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function showForm()
    {
        return view('school');
    }

    public function fetchInspections(Request $request)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date'   => 'required|date|after_or_equal:start_date',
        ]);

        $inspections = Inspection::whereBetween('created_at', [$request->start_date, $request->end_date])
            ->get(['id', 'school_code', 'created_at', 'school_status']);

        return response()->json(['inspections' => $inspections]);
    }
}
