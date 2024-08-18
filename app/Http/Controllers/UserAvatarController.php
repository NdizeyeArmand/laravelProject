<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserAvatarController extends Controller
{
    public function update(Request $request)
    {
        $user = auth()->user();

        if ($request->has('reset_default')) {
            if ($user->avatar) {
                Storage::delete($user->avatar);
            }
            $user->avatar = null;
            $user->save();
            return back()->with('status', 'Avatar reset to default successfully');
        }

        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($user->avatar) {
            Storage::delete($user->avatar);
        }

        $path = $request->file('avatar')->store('avatars', 'public');

        $user->avatar = $path;
        $user->save();

        return back()->with('status', 'Avatar updated successfully');
    }
}
