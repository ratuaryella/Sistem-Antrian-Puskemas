<?php

namespace App\Http\Controllers;

use App\Models\Poli;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PoliController extends Controller
{


    public function store(Request $request)
    {
        $poli = new Poli;

        $poli->id_poli = $request->input('idpoli');
        $poli->nama = $request->input('nama');
        $poli->deskripsi = $request->input('deskripsi');

        $poli->save();

        return redirect()->back()->with('status', 'Berhasil Menambah Poli');
    }


    public function edit($id)
    {
        $poli = Poli::where('id_poli', $id)->first();
        return response()->json([
            'status' => 200,
            'poli' => $poli,
        ]);
    }

    public function update(Request $request)
    {
        $id = $request->input('idpoliEdit');
        Poli::where('id_poli', $id)->update(
            [
                "id_poli" => $request->input('idpoliEdit'),
                "nama" => $request->input('namaEdit'),
                "deskripsi" => $request->input('deskripsiEdit')
            ]
        );

        return redirect()->back()->with('status', 'Data Berhasil Diubah');
    }


    public function destroy(Request $request)
    {
        $id = $request->input('delete_id');
        Poli::where('id_poli', $id)->delete();

        return redirect()->back()->with('status', 'Data Berhasil Dihapus');
    }
}
