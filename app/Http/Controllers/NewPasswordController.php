<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Validation\Rules\Password as RulesPassword;

class NewPasswordController extends Controller
{

    public function showFormForgotPass()
    {
        return view('forgotPassword');
    }

    public function token(Request $request)
    {
        $getToken = $request->token;
        session(['token' => $getToken]);
        $token = session()->get('token');
        // return var_dump($token);
        return redirect()->route('reset-password');
    }

    public function forgotPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);


        $status = Password::sendResetLink(
            $request->only('email')
        );

        if ($status == Password::RESET_LINK_SENT) {

            return redirect()->route('login');
        }

        throw ValidationException::withMessages([
            'email' => [trans($status)],
        ]);
    }


    public function showFormResetPass()
    {
        return view('setPassword');
    }

    public function reset(Request $request)
    {
        $token = session()->get('token');
        $request->request->add(['token' => $token]);

        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => ['required', 'confirmed', RulesPassword::defaults()],
        ]);

        // return var_dump($request->token);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user) use ($request) {
                $user->forceFill([
                    'password' => Hash::make($request->password),
                    'remember_token' => Str::random(60),
                ])->save();

                $user->tokens()->delete();

                event(new PasswordReset($user));
            }
        );

        if ($status == Password::PASSWORD_RESET) {
            return redirect()->route('login');
        }

        return redirect()->route('reset-password')->with(['error' => 'Email yang dimasukkan salah']);
    }
}
