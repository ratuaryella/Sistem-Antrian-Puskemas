<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Antrians;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PoliController extends Controller
{
    public function getAllPoli()
    {
        $allPoli = DB::table('poli')->get();
        return response()->json([
            'poli' => $allPoli
        ]);
    }

    public function getAllStatus()
    {
        $allStatus = DB::table('status')->get();
        return response()->json([
            'status' => $allStatus
        ]);
    }

    public function getAllAntrian(Request $request)
    {
        $allAntrian = DB::table('antrians')
            ->where('id_poli', $request->id_poli)
            ->whereIn('status', [1, 0])
            ->get();

        return response()->json([
            'antrian' => $allAntrian
        ]);
    }

    public function updateStatus(Request $request)
    {
        DB::table('antrians')->where('id_antrian', $request->id_antrian)->update([
            'status' => $request->status
        ]);


        return response()->json(
            [
                'message' => 'Berhasil diubah.'
            ]
        );
    }

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

    public function showAntrianById(Request $request)
    {
        $antrian = DB::table('antrians')
            ->where('id_user', '=', $request->id_user)
            ->where('status', '=', 0)
            ->get();

        return response()->json([
            'antrian' => $antrian
        ]);
    }
}
