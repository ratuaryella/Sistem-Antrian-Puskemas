<?php

namespace App\Http\Controllers;

use App\Models\Antrians;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isEmpty;

class AntriansController extends Controller
{


    public function index()
    {
        $antrian =  Antrians::all();

        return response()->json([
            'message' => 'Success',
            'data' => $antrian
        ], 200);
    }

    public function store(Request $request)
    {
        $tanggal = Carbon::now();
        $reqs = session()->get('user');

        $req = $reqs->id;
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

        if ($reqs->id_role == 3)
            return redirect()->route('/');
        if ($reqs->id_role == 1)
            return redirect()->route('/print');
    }

    public function show($id)
    {
        $antrian = Antrians::findOrfail($id);

        return response()->json([
            'success' => true,
            'message' => 'Detail Antrian',
            'data' => $antrian
        ], 200);
    }

    public function edit($id)
    {
        $antrians = Antrians::find($id);
        return response()->json([
            'status' => 200,
            'antrians' => $antrians,
        ]);
    }

    public function update_antrian(Request $request)
    {
        $id = $request->input('id_antrian');
        Antrians::where('id_antrian', $id)->update(
            [
                "status" => $request->input('status')
            ]
        );

        return redirect()->route('/kelola-antrian');
    }

    public function prints()
    {
        $antrians = Antrians::orderBy('id_antrian', 'DESC')->get()->first();
        $polis = DB::table('polis')->get();
        return view('admin.print')
            ->with('antrians', $antrians)
            ->with('polis', $polis);
    }
}
