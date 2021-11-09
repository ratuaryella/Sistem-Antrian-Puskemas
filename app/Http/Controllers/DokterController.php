<?php


namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use App;

class DokterController
{
    public function index()
    {
        $req = session()->get('user');

        if ($req->id_role != 2) {
            App::abort(403);
        }

        $allAntrian = DB::table('antrians')
            ->where('id_poli', $req->id_poli)
            ->whereIn('status', [1, 0])
            ->orderBy('status')
            ->get();

        return var_dump($);
    }
}