<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Office;
use App\Models\Tehsil;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with(['tehsil', 'office.district'])->paginate(10);
        return view('users.index', compact('users'));
    }

    public function create()
    {
        $office = Office::all();
        $districts = District::all();
        return view('users.create', ['offices' => $office,'districts'=>$districts]);

    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'role' => 'required|string',
            'password' => 'required|string|min:6|confirmed',
            'office_id' => 'required',
            'tehsil_id' => 'required',
        ]);

        $validated['password'] = Hash::make($validated['password']);

        User::create($validated);

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $offices = Office::all();
        $districts = District::all();

        // Preload tehsils if user has office selected
        $tehsils = [];
        if ($user->office_id) {
            $tehsils = Tehsil::where('district_id', $user->office->district_id)->get();
        }

        return view('users.edit', compact('user', 'offices', 'tehsils','districts'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => "required|email|max:255|unique:users,email,$id",
            'role' => 'required|string',
            'office_id' => 'required|exists:offices,id',
            'tehsil_id' => 'nullable|exists:tehsils,id',
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->office_id = $request->office_id;
        $user->tehsil_id = $request->tehsil_id;

        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        $user->save();

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }


    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
