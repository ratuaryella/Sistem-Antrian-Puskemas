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
}
