<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $allPoli = DB::table('poli')->get();

            return view('user/dashboard', [
                'allPoli' => $allPoli,
            ]);
        }
        return redirect()->route('login');
    }
}
