<?php


namespace App\Http\Controllers;

use App;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
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

        $countDate = 0;
        $countMonth = 0;

        $antrians = DB::table('antrians')->whereDate('tanggal', Carbon::today())->get();
        $polis =  DB::table('polis')->get();

        return view('admin.index')
            ->with('countDate', $countDate)
            ->with('countMonth', $countMonth)
            ->with('antrians', $antrians)
            ->with('polis', $polis);
    }

    public function kelolaDokter()
    {
        if (Auth::check()) {
            $dokters = DB::table('users')->where('id_role', 2)->get();
            $polis = DB::table('polis')->get();
            return view('admin.dokter')
                ->with('dokters', $dokters)
                ->with('polis', $polis);
        }
        return redirect()->route('login');
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
        if (Auth::check()) {
            $polis = DB::table('polis')->get();
            return view('admin.poli')->with('polis', $polis);
        }
        return redirect()->route('login');
    }

    public function kelolaAntrian()
    {
        if (Auth::check()) {
            $countDate = 0;
            $countMonth = 0;
            $antrians =  DB::table('antrians')->whereIn('status', [0, 1])->orderBy('status', 'desc')->get();
            $polis =  DB::table('polis')->get();
            return view('admin.index')
                ->with('countDate', $countDate)
                ->with('countMonth', $countMonth)
                ->with('antrians', $antrians)
                ->with('polis', $polis);
        }
        return redirect()->route('login');
    }

    public function update(Request $request)
    {
        $id = $request->input('idEdit');
        User::where('id', $id)->update(
            [
                "name" => $request->input('namaEdit'),
                "email" => $request->input('emailEdit'),
                "nomor_induk" => $request->input('noindukEdit'),
                "id_poli" => $request->input('poliEdit'),
                "id_role" => 2
            ]
        );

        return redirect()->back()->with('status', 'Data Berhasil Diubah');
    }


    public function countVisitorByDate(Request $request)
    {
        if ($request->tanggal == null) {
            $countDate = 0;
            $month = substr($request->bulan, 5);
            $year = substr($request->bulan, 0, 4);

            $countMonth = DB::table('antrians')
                ->whereMonth('tanggal', $month)
                ->whereYear('tanggal', $year)
                ->count();

            $antrians = DB::table('antrians')->whereDate('tanggal', Carbon::today())->get();
            $polis =  DB::table('polis')->get();

            return view('admin.index')
                ->with('countDate', $countDate)
                ->with('countMonth', $countMonth)
                ->with('antrians', $antrians)
                ->with('polis', $polis);
        } elseif ($request->bulan ==  null) {
            $countMonth = 0;

            $countDate = DB::table('antrians')
                ->where('tanggal', $request->tanggal)
                ->count();

            $antrians = DB::table('antrians')->whereDate('tanggal', Carbon::today())->get();
            $polis =  DB::table('polis')->get();

            return view('admin.index')
                ->with('countDate', $countDate)
                ->with('countMonth', $countMonth)
                ->with('antrians', $antrians)
                ->with('polis', $polis);
        }
    }
}
