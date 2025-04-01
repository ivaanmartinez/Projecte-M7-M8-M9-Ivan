<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserManageController extends Controller
{
    /**
     * Display a listing of users.
     *
     * @return Factory|View|Application
     */
    // app/Http/Controllers/UserManageController.php
    public function index(): Factory|View|Application
    {
        $users = User::paginate(10);
        return view('users.manage.index', compact('users'));
    }

    public function create(): View|Factory|Application
    {
        return view('users.manage.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        return redirect()->route('users.manage.index')->with('success', 'User created successfully');
    }

    // app/Http/Controllers/UserManageController.php
    public function edit(User $user): Factory|View|Application
    {
        $users = User::all(); // Fetch all users to pass to the view
        return view('users.manage.edit', compact('user', 'users'));
    }

    public function update(Request $request, User $user): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? bcrypt($request->password) : $user->password,
        ]);

        return redirect()->route('users.manage.index')->with('success', 'User updated successfully');
    }

    public function destroy(User $user): RedirectResponse
    {
        $user->delete();
        return redirect()->route('users.manage.index')->with('success', 'User deleted successfully');
    }

    /**
     * Custom function for testing.
     *
     * @return JsonResponse
     */
    public function testedBy(): JsonResponse
    {
        // Lógica de prueba personalizada, ejemplo:
        $testResult = "Test passed successfully!";
        return response()->json(['message' => $testResult]);
    }
}
