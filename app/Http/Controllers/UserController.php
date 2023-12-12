<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->input('query')) {
            $query = $request->input('query');
            $allUsers = User::where('username', 'LIKE', "%$query%")->paginate(10);
        } else {
            $allUsers = User::paginate(10);
        }

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
        $validatedData = $request->validate([
            'username' => 'required|string|max:255|unique:users',
            'nickname' => 'required|string|max:255',
            'age' => 'required|integer|min:18',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string',
            'job' => "required",
            'is_admin' => 'required'
        ]);

        User::create([
            'username' => $validatedData['username'],
            'nickname' => $validatedData['nickname'],
            'age' => $validatedData['age'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'is_admin' => $validatedData['is_admin'],
            'job' => $validatedData['job'],
        ]);

        return redirect()->route('admin.user.index')->with('success', Str::ucfirst($request->username) . ' created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', ['data' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'username' => ['required', 'string', 'max:255', 'regex:/^[a-zA-Z0-9_]+$/'],
            'age' => ['required', 'integer', 'min:18'],
            'job' => ['required', 'string'],
            'nickname' => ['required', 'string', 'max:255'],
            'email' => ['nullable', 'string', 'email', 'max:255'],
            'oldPass' => ['required_with:newPassword', 'string', 'min:8'],
            'newPassword' => ['nullable', 'string', 'min:8', 'different:oldPass'],
        ]);

        if ($request->filled('newPassword')) {
            $password = Hash::make($validatedData['newPassword']);
        } else {
            $password = $user->password;
        }

        $user->update([
            'username' => $validatedData['username'],
            'age' => $validatedData['age'],
            'job' => $validatedData['job'],
            'nickname' => $validatedData['nickname'],
            'email' => $validatedData['email'],
            'password' => $password,
        ]);

        return redirect()->route('admin.user.index')->with('primary', 'Akun berhasil diubah');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if ($user->image) {
            Storage::delete($user->image);
        };

        User::destroy($user->id);
        return to_route('admin.user.index')->with('delete', 'Delete Menu Success');
    }
}
