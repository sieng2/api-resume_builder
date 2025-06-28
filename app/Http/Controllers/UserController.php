<?php


namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // List all users
    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }

    // Show single user
    public function show(User $user)
    {
        return response()->json($user);
    }

    // Create user
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:user,email',
            'password' => 'required|string|min:6',
            'is_ban' => 'sometimes|boolean',
        ]);

        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);

        return response()->json($user, 201);
    }

    // Update user
    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name' => 'sometimes|string|max:255',
            'email' => [
                'sometimes','email',
                Rule::unique('user','email')->ignore($user->user_id, 'user_id'),
            ],
            'password' => 'sometimes|string|min:6',
            'is_ban' => 'sometimes|boolean',
        ]);

        if (isset($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }

        $user->update($data);
        return response()->json($user);
    }

    // Delete user
    public function destroy(User $user)
    {
        $user->delete();
        return response()->json(['message' => 'User deleted']);
    }

    // Ban or Unban user
    public function ban(Request $request, User $user)
    {
        // Toggle ban status, or set explicitly
        if ($request->has('is_ban')) {
            $user->is_ban = (bool)$request->input('is_ban');
        } else {
            $user->is_ban = ! $user->is_ban;
        }
        $user->save();

        return response()->json(['user_id' => $user->user_id, 'is_ban' => $user->is_ban]);
    }
}
