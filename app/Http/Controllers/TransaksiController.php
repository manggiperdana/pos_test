<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    //Insert
    public function simpan(Request $request){

    }

    public function tambahItem(Request $request){

        $data = DB::table('master_barang')->where('id', $request->idProduk)->get();
        return response()->json($data);
    }
}
