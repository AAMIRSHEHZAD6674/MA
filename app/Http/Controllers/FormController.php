<?php

namespace App\Http\Controllers;

use App\Models\Form;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function store(Request $request)
    {
        $form = Form::create(); // just creates a blank form

        foreach ($request->fields as $field) {
            $form->fields()->create([
                'key' => $field['key'],
                'value' => $field['value'],
            ]);
        }

        return back()->with('success', 'Form saved with dynamic fields!');
    }

    public function index()
    {
     return view('test');
    }
}
