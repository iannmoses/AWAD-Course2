<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::with('roles')
            ->when($request->q, fn ($query, $search) => $query->where(function ($where) use ($search) {
                $where->where('name', 'like', "%{$search}%")->orWhere('email', 'like', "%{$search}%");
            }))
            ->when($request->role, fn ($query, $role) => $query->role($role))
            ->orderBy('name')
            ->paginate(10)
            ->withQueryString();

        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    // admins add lecturers and other admins; students are added on the Students page
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'role' => ['required', Rule::in(['admin', 'lecturer'])],
            'password' => ['required', Password::min(8)],
        ]);

        User::create(['name' => $data['name'], 'email' => $data['email'], 'password' => $data['password']])
            ->assignRole($data['role']);

        return redirect()->route('admin.users.index')->with('success', 'User saved successfully.');
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', ['user' => $user->load('roles')]);
    }

    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')->ignore($user->id)],
            'role' => ['required', Rule::in(['admin', 'lecturer', 'student'])],
            'password' => ['nullable', Password::min(8)],
        ]);

        if ($user->is($request->user()) && $data['role'] !== 'admin') {
            return back()->with('error', 'You cannot remove your own admin role.');
        }

        $user->update(['name' => $data['name'], 'email' => $data['email']]);

        if ($request->filled('password')) {
            $user->update(['password' => $data['password']]);
        }

        $user->syncRoles([$data['role']]);

        return redirect()->route('admin.users.index')->with('success', 'User updated successfully.');
    }

    public function destroy(Request $request, User $user)
    {
        if ($user->is($request->user())) {
            return back()->with('error', 'You cannot delete your own account.');
        }

        if ($user->courses()->exists()) {
            return back()->with('error', 'This lecturer still has courses. Assign the courses to someone else first.');
        }

        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'User deleted.');
    }
}
