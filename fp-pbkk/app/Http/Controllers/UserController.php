<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Pagination - 10 users per page, ordered by creation date
        $users = User::orderBy('created_at', 'desc')->paginate(10);

        return response()->json($users);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name_client' => 'required|string|max:255',
            'email_client' => 'required|string|email|max:255|unique:users,email_client',
            'phone_client' => 'required|string|max:13',
            'points' => 'required|integer',
        ]);

        $user = User::create($validated);

        return response()->json([
            'message' => 'User created successfully!',
            'user' => $user
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name_client' => 'sometimes|string|max:255',
            'email_client' => 'sometimes|string|email|max:255',
            'phone_client' => 'sometimes|string|max:13',
            'points' => 'sometimes|integer',
        ]);

        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $user->update($validated);

        return response()->json([
            'message' => 'User updated successfully!',
            'user' => $user
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $user->delete();

        return response()->json(['message' => 'User deleted successfully']);
    }
}
