<?php


namespace App\Http\Controllers;

use App;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController
{
    public function index()
    {
        $req = session()->get('user');

        if ($req->id_role != 1) {

            App::abort(403);
        }

        $antrian = DB::table('antrians')->whereDate('tanggal', Carbon::today())->get();

        return view('admin.index', [
            'antrians', $antrian
        ]);
    }

    public function kelolaDokter()
    {

        $dokters = DB::table('users')->where('id_role', 2)->get();
        $polis =  DB::table('polis')->get();
        return view('admin.dokter')
            ->with('dokters', $dokters)
            ->with('polis', $polis);
    }

    public function store(Request $request)
    {

        $dokter = new User;

        $dokter->name = $request->input('nama');
        $dokter->email = $request->input('email');
        $dokter->nomor_induk = $request->input('noinduk');
        $dokter->password = Hash::make($request->input('password'));

        $dokter->id_poli = $request->input('poli');
        $dokter->id_role = 2;

        $dokter->save();

        return redirect()->back()->with('status', 'Berhasil Menambah Dokter');
    }

    public function edit($id)
    {
        $dokter = User::find($id);
        return response()->json([
            'status' => 200,
            'dokter' => $dokter,
        ]);
    }

    public function destroy(Request $request)
    {
        $id = $request->input('delete_id');
        User::where('id', $id)->delete();

        return redirect()->back()->with('status', 'Data Berhasil Dihapus');
    }

    public function kelolaPoli()
    {

        $polis =  DB::table('polis')->get();
        return view('admin.poli')->with('polis', $polis);
    }
}
