<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

use function PHPUnit\Framework\isEmpty;

class UserController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $req = session()->get('user');

            $allPoli = DB::table('polis')->get();

            $user = session()->get('user');
            $user = $user->id;

            $antrian = DB::table('antrians')
                ->where('id_user', '=', $user)
                ->where('status', '=', 0)
                ->get();

            // $no_antrian = $no_antrian[0];

            return view('user/dashboard', [
                'allPoli' => $allPoli,
                'antrian' => $antrian,
            ]);
            // return var_dump($no_antrian);
        }
        return redirect()->route('login');
    }
}
