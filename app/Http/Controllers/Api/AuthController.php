<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $this->validate(request(), [
            'email' => 'required',
            'password' => 'required'
        ]);

        $user = User::whereRaw('LOWER(email) = ?', strtolower(request()->email))->first();

        if (!$user) {
            return response()->json([
                'message' => 'Email / Password doesn\'t match our record'
            ], 401);
        }

        $authenticated = Auth::attempt([
            'email' => $user->email,
            'password' => request()->password
        ]);

        if ($authenticated) {
            $user->tokens()->delete();
            $user = Auth::user();
            $user->token = $user->createToken('auth_token')->plainTextToken;;

            return $user;
        } else {
            return response()->json([
                'message' => 'Email / Password doesn\'t match our record'
            ], 401);
        }
    }

    public function profile()
    {
        $user_id = Auth::user()->id;
        $profile = User::with('cutis')->findOrFail($user_id);
        return $profile;
    }
}
