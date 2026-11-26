<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Http\Requests\RegisterRequest;
use Exception;

class AuthController extends Controller
{
    public function Login(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'Invalid Email Or Password'], 401);
        }

        return response()->json([
            'message' => 'Successfully Login',
            'token'   => $user->createToken('app')->accessToken,
            'user'    => $user,
        ], 200);
    }

    public function Register(RegisterRequest $request)
    {
        try {
            $user = User::create([
                'name'     => $request->name,
                'email'    => $request->email,
                'password' => $request->password, // User model hashes it automatically
            ]);

            return response()->json([
                'message' => 'Registration Successful',
                'token'   => $user->createToken('app')->accessToken,
                'user'    => $user,
            ], 201);
        } catch (Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], 400);
        }
    }
}