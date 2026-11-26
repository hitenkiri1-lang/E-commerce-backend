<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\ForgetRequest;
use App\Mail\ForgetMail;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ForgetController extends Controller
{
    public function ForgetPassword(ForgetRequest $request)
    {
        $email = $request->email;

        if (User::where('email', $email)->doesntExist()) {
            return response()->json(['message' => 'Email Invalid'], 401);
        }

        $token = random_int(100000, 999999);

        try {
            DB::table('password_reset_tokens')->updateOrInsert(
                ['email' => $email],
                ['token' => $token, 'created_at' => now()]
            );

            Mail::to($email)->send(new ForgetMail($token));

            return response()->json(['message' => 'Reset Password Mail send on your email'], 200);
        } catch (Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], 400);
        }
    }
}