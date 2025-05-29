<?php

namespace App\Http\Controllers;

use App\Models\Target;
use App\Models\User;
use Illuminate\Http\Request;

class TargetController extends Controller
{
    public function index()
    {
        $targets = Target::with('user')->latest()->paginate(10);
        return view('targets.index', compact('targets'));
    }

    public function create()
    {
        $users = User::with('office')->get();
        return view('targets.create', compact('users'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'target_assign' => 'required|integer|min:1',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'status' => 'required|in:active,inactive',
        ]);

        Target::create($validated);
        return redirect()->route('targets.index')->with('success', 'Target created successfully.');
    }

    public function edit(Target $target)
    {
        $users = User::all();
        return view('targets.edit', compact('target', 'users'));
    }

    public function update(Request $request, Target $target)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'target_assign' => 'required|integer|min:1',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'status' => 'required|in:active,inactive',
        ]);

        $target->update($validated);
        return redirect()->route('targets.index')->with('success', 'Target updated successfully.');
    }

    public function destroy(Target $target)
    {
        $target->delete();
        return redirect()->route('targets.index')->with('success', 'Target deleted.');
    }
}
