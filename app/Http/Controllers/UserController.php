<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allUsers = User::all();
        return view('admin.users.index', compact('allUsers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'username' => 'required|string|max:255|unique:users',
            'nickname' => 'required|string|max:255',
            'age' => 'required|integer|min:18',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string',
            'image' => 'nullable|image',
            'job' => "required",
            'is_admin' => ['sometimes', 'boolean', function ($attribute, $value, $fail) {
                if ($value === 'on' || $value === true) {
                    request()->merge([$attribute => true]);
                } else {
                    request()->merge([$attribute => false]);
                }
            }],
        ]);

        ddd($validatedData);




        if ($request->file('image')) {
            $request->file('image')->store('uploads', 'public');
        }

        // Create the user
        User::create([
            'username' => $validatedData['username'],
            'nickname' => $validatedData['nickname'],
            'age' => $validatedData['age'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'image' => $validatedData['image'] ?? null,
            'is_admin' => $validatedData['is_admin'] ?? false,
            'employee' => $validatedData['employee'] ?? false,
        ]);

        return redirect()->route('admin.user.index')->with('success', Str::ucfirst($request->username) . ' created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
