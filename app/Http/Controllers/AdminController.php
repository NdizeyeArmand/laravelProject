<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('profile.admin', compact('users'));
    }

    public function updateStatus(Request $request)
    {
        $user = User::findOrFail($request->user_id);
        $user->is_admin = $request->is_admin;
        $user->save();

        return redirect()->route('admin.dashboard')->with('success', 'User status updated successfully.');
    }
}
