<?php

namespace App\Http\Controllers;

use App\Models\Poli;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PoliController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $poli = new Poli;

        $poli->id_poli = $request->input('idpoli');
        $poli->nama = $request->input('nama');
        $poli->deskripsi = $request->input('deskripsi');

        $poli->save();

        return redirect()->back()->with('status','Berhasil Menambah Poli');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit($id)
    {
        $poli = Poli::where('id_poli',$id)->first();
        return response()->json([
            'status'=>200,
            'poli'=>$poli,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->input('idpoliEdit');
        Poli::where('id_poli',$id)->update([
            "id_poli"=> $request->input('idpoliEdit'),
            "nama"=>$request->input('namaEdit'),
            "deskripsi"=> $request->input('deskripsiEdit')]
        );

        return redirect()->back()->with('status', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->input('delete_id');
        Poli::where('id_poli',$id)->delete();

        return redirect()->back()->with('status', 'Data Berhasil Dihapus');
    }
}
