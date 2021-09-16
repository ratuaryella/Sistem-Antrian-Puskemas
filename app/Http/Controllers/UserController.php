<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{
    public function index()
    {
        // $responses = Http::get('http://127.0.0.1:8000/api/all-poli')->json();

        return view('user/dashboard');
    }
}
