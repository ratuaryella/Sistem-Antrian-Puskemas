<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Antrians;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AntrianController extends Controller
{

    //Mengambil list antrian sesuai dengan id poli yang diberikan dengan status 0 dan 1
    public function getAllAntrianByPoli(Request $request)
    {
        $allAntrian = DB::table('antrians')
            ->where('id_poli', $request->id_poli)
            ->whereIn('status', [1, 0])
            ->orderBy('status')
            ->get();

        return response()->json([
            'antrian' => $allAntrian
        ]);
    }

    //Memperbaharui status dari suatu antrian
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

    //Mengambil list antrian sesuai dengan id user yang diberikan
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

    public function riwayat(Request $request)
    {
        $riwayat = DB::table('antrians')
            ->join('users', 'users.id', '=', 'antrians.id_user')
            ->join('polis', 'polis.id_poli', '=', 'antrians.id_poli')
            ->select(DB::raw('antrians.tanggal,antrians.no_antrian,polis.nama, (SELECT users.name FROM users WHERE BINARY antrians.id_poli = BINARY users.id_poli) AS dokter, antrians.status'))
            ->where('antrians.id_user', '=', $request->id_user)
            ->orderBy('antrians.status')
            ->get();

        return response()->json([
            'riwayat' => $riwayat
        ]);
    }
}
