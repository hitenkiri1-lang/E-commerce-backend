<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\ResetRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ResetController extends Controller
{
    public function ResetPassword(ResetRequest $request)
    {
        $email = $request->email;
        $token = $request->token;

        $record = DB::table('password_reset_tokens')->where('email', $email)->first();

        if (!$record) {
            return response()->json(['message' => 'Email Not Found'], 401);
        }

        if ((string) $record->token !== (string) $token) {
            return response()->json(['message' => 'Pin Code Invalid'], 401);
        }

        DB::table('users')->where('email', $email)->update([
            'password' => Hash::make($request->password),
        ]);

        DB::table('password_reset_tokens')->where('email', $email)->delete();

        return response()->json(['message' => 'Password Change Successfully'], 200);
    }
}