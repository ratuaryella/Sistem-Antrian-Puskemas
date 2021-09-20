<?php

namespace App\Http\Controllers;

use App\Models\Antrians;
use Carbon\Carbon;
use Illuminate\Http\Request;


class AntriansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $antrian =  Antrians::all();

        return response()->json([
            'message' => 'Success',
            'data' => $antrian
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $tanggal = Carbon::now()->toDateString();
        $antrian_terakhir = Antrians::all()->last();
        $tanggal_terakhir = $antrian_terakhir->get('tanggal');

        if ($tanggal_terakhir == $tanggal) {
            $no_terakhir = $antrian_terakhir->get('no_antrian') + 1;
            return $no_terakhir;
        } else {
            $no_terakhir = $antrian_terakhir->get('no_antrian');
            return $no_terakhir;
        }

        // $req = session()->get('user');
        // $req = $req->id_user;




        // $antrian  = new Antrians();
        // $antrian->id_antrian = $request->id_antrian;
        // $antrian->id_user = $req->id_user;
        // $antrian->no_antrian = $request->no_antrian;
        // $antrian->id_poli = $request->id_poli;
        // $antrian->tanggal = $tanggal;
        // $antrian->status = $request->status;
        // $antrian->save();

        // 

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $antrian = Antrians::findOrfail($id);

        return response()->json([
            'success' => true,
            'message' => 'Detail Antrian',
            'data' => $antrian
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
