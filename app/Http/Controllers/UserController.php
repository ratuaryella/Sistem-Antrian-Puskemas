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

    public function riwayat()
    {
        $user = session()->get('user');
        $user = $user->id;

        $riwayat = DB::table('antrians')
            ->join('users', 'users.id', '=', 'antrians.id_user')
            ->join('polis', 'polis.id_poli', '=', 'antrians.id_poli')
            ->select(DB::raw('antrians.tanggal,antrians.no_antrian,polis.nama, (SELECT users.name FROM users WHERE BINARY antrians.id_poli = BINARY users.id_poli) AS dokter, antrians.status'))
            ->where('antrians.id_user', '=', $user)
            ->orderBy('antrians.status')
            ->get();

        return view('user/riwayat', [
            'riwayat' => $riwayat
        ]);
    }
}
