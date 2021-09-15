<?php

namespace App\Http\Controllers;

use App\Models\Antrian;
use Illuminate\Http\Request;

class AntrianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $antrian =  Antrian::all();

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
    public function store(Request $request)
    {
        $antrian  = new Antrian();
        $antrian->id_antrian = $request->id_antrian;
        $antrian->id_user = $request->id_user;
        $antrian->no_antrian = $request->no_antrian;
        $antrian->id_poli = $request->id_poli;
        $antrian->tanggal = $request->tanggal;
        $antrian->status = $request->status;
        $antrian->save();

        return response()->json([
            'message' => 'Success'
        ], 201);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $antrian = Antrian::findOrfail($id);

        return response()->json([
            'success'=>true,
            'message'=> 'Detail Antrian',
            'data'=> $antrian
        ],200);
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
