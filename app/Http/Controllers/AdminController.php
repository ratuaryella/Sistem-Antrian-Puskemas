<?php


namespace App\Http\Controllers;


use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController
{
    public function index(){
//        if (Auth::check()) {
            $antrian = DB::table('antrians')->whereDate('tanggal',Carbon::today())->get();

            return view('admin.index', [
                'antrians',$antrian
            ]);
//        }
//
//        return redirect()->route('login');
    }

    public function kelolaDokter(){

        $dokters = DB::table('users')->where('id_role',2)->get();
        return view('admin.dokter')->with('dokters',$dokters);
    }

    public function kelolaPoli(){

        $polis =  DB::table('polis')->get();
        return view('admin.poli')->with('polis', $polis);
    }
}
