<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
// all users
    // public function index()
    // {
    //     $users = User::all();
    //     return view('user', compact('users'));
    // }

// Get user
    public function show($id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }
        return response()->json(['user' => $user], 200);
    }


// Delete user
    public function destroy($id)
    {
        $user = User::find($id);

        $user->delete();
        return response()->json(['success' => 'User deleted successfully'], 200);
    }
}
