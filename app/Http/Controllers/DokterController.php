<?php


namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

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

        $currect = DB::table('antrians')
            ->where('id_poli', $req->id_poli)
            ->where('status', 1)
            ->orderBy('status')
            ->get();

        return view('dokter/index', [
            'current' => $currect,
            'allAntrian' => $allAntrian
        ]);

        // return var_dump($currect);
    }

    public function updateStatus(Request $request)
    {
        DB::table('antrians')->where('id_antrian', $request->id_antrian)->update([
            'status' => 2
        ]);

        $req = session()->get('user');


        return redirect()->route('/dokter');
    }
}
