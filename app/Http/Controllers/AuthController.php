<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Password;



class AuthController extends Controller
{

    public function showFormRegister()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'confirmed'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'poli' =>  $request->poli,
            'nomor_induk' => $request->nomor_induk,
        ]);

        event(new Registered($user));

        $token = $user->createToken('authtoken');

        return redirect()->route('login');
    }

    public function showFormLogin()
    {
        if (Auth::check()) { // true sekalian session field di users nanti bisa dipanggil via Auth
            //Login Success
            return redirect()->route('/');
        }
        return view('login');
    }

    public function login(LoginRequest $request)
    {


        $request->authenticate();

        $token = $request->user()->createToken('authtoken');


        $result = response()->json([
            'message' => 'Logged in',
            'data' => [
                'user' => $request->user(),
                'token' => $token->plainTextToken
            ]
        ]);



        if (!$result->isEmpty()) {
            session(['user' => $request->user()]);
            return redirect()->route('/');
        } else {

            return redirect()->route('login');
        }
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        Auth::logout();

        return redirect()->route('login');
    }

    public function showFormForgotPass()
    {
        return view('login');
    }

    // public function login(LoginRequest $request)
    // {


    //     $request->authenticate();

    //     $token = $request->user()->createToken('authtoken');


    //     $result = response()->json([
    //         'message' => 'Logged in',
    //         'data' => [
    //             'user' => $request->user(),
    //             'token' => $token->plainTextToken
    //         ]
    //     ]);



    //     if (!$result->isEmpty()) {
    //         session(['user' => $request->user()]);
    //         return redirect()->route('/');
    //     } else {

    //         return redirect()->route('login');
    //     }
    // }
}
