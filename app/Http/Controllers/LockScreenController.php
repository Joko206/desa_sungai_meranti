<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LockScreenController extends Controller
{
    public function unlock(Request $request)
    {
        $request->validate([
            'password' => 'required|string',
        ]);
        $user = Auth::user();
        if (!$user) {
            return response()->json(['success' => false, 'message' => 'Session expired. Silakan login ulang.'], 401);
        }
        if (Hash::check($request->password, $user->password)) {
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false, 'message' => 'Password salah!'], 403);
    }
}
