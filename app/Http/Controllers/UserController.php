<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App;


class UserController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $req = session()->get('user');

            if ($req->id_role != 3) {
                App::abort(403);
            }

            $allPoli = DB::table('polis')->get();

            $user = session()->get('user');
            $user = $user->id;

            $antrian = DB::table('antrians')
                ->where('id_user', '=', $user)
                ->where('status', '=', 0)
                ->get();



            return view('user/dashboard', [
                'allPoli' => $allPoli,
                'antrian' => $antrian,
            ]);
        }
        return redirect()->route('login');
    }
}
