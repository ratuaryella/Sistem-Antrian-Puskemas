<?php

namespace App\Http\Controllers;

use App\Models\Antrians;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AntriansController extends Controller
{

    // private $connection;

    // public function __construct(Connection $connection)
    // {
    //     $this->connection = $connection;
    // }
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
    public function store(Request $request)
    {
        $tanggal = Carbon::now();
        $req = session()->get('user');
        $req = $req->id;


        $id_terakhir = DB::table('antrians')
            ->select(DB::raw('MAX(id_antrian) as id_antrian'), 'no_antrian', 'id_poli', 'tanggal')
            ->groupBy('id_poli')
            ->having('id_poli', $request->id_poli)
            ->get();

        $no_terakhir = 1;

        if ($id_terakhir[0]->tanggal != $tanggal) {
            $no_terakhir = $id_terakhir[0]->id_antrian + 1;
            $no_terakhir = strval($request->id_poli) .  strval($no_terakhir);
        } else {
            $no_terakhir = strval($request->id_poli) .  strval($no_terakhir);
        }

        $antrian  = new Antrians();
        $antrian->id_user = $req;
        $antrian->no_antrian = $no_terakhir;
        $antrian->id_poli = $request->id_poli;
        $antrian->tanggal = $tanggal;
        $antrian->status = 0;
        $antrian->save();

        return redirect()->route('/');
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

    public function show_antrian(){

        $antrian = DB::table('antrians')->whereDate('tanggal',Carbon::today()->get());

        return view('admin', $antrian);
    }
}
