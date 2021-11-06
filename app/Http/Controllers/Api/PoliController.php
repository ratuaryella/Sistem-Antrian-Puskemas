<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Antrians;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PoliController extends Controller
{
    //Mengambil list semua poli
    public function getAllPoli()
    {
        $allPoli = DB::table('poli')->get();
        return response()->json([
            'poli' => $allPoli
        ]);
    }

    //Menambah antrian
    public function addAntrian(Request $request)
    {
        $tanggal = Carbon::now();
        // $req = session()->get('user');

        $id = $request->id;
        $id_terakhir_poliBased = DB::table('antrians')
            ->where('id_poli', $request->id_poli)
            ->max('id_antrian');

        $id_terakhir = DB::table('antrians')
            ->where('id_antrian', $id_terakhir_poliBased)
            ->get();

        $no_terakhir = 1;

        if ($id_terakhir->isEmpty()) {
            $no_terakhir = $request->id_poli  . "-" . strval($no_terakhir);
        } elseif ($id_terakhir[0]->tanggal != $tanggal) {
            $value = ltrim($id_terakhir[0]->no_antrian, $request->id_poli);
            $value = ltrim($value, "-");
            $value = intval($value);
            $no_terakhir =  $value + 1;
            $no_terakhir = $request->id_poli . "-" . strval($no_terakhir);
        } else {
            $value = ltrim($id_terakhir[0]->no_antrian, $request->id_poli . "-");
            $no_terakhir = $request->id_poli . strval($no_terakhir);
        }
        $antrian = Antrians::create([
            'id_user' => $request->id_user,
            'no_antrian' => $no_terakhir,
            'id_poli' => $request->id_poli,
            'tanggal' => $tanggal,
            'status' => 0,
        ]);

        return  $res = response()->json([
            'message' => 'Data disimpan'
        ]);
    }
}
