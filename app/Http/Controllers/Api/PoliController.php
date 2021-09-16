<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;




class PoliController extends Controller
{
    public function getAllPoli()
    {
        $allPoli = DB::table('poli')->get();
        return response()->json([
            'allPoli' => $allPoli,
        ]);
    }
}
