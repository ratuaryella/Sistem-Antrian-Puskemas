<?php

namespace App\Http\Controllers;

use App\Models\Antrians;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isEmpty;

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

        // if (isEmpty($req)) {
        //     return redirect()->route('login');
        // }

        $req = $req->id;
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

    public function show_antrian()
    {
        $date = Carbon::now();
    }
}
