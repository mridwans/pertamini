<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

use App\User;
use App\Tabung;
use App\Konsumen;
use App\Transaksi;


class TransaksiController extends Controller
{
    public function list_konsumen()
    {
    	$konsumen = User::all()->where('role','=','konsumen');
    	return response()->json([
    		'status'=>'success',
    		'result'=>$konsumen,
    	]);
    }

    public function list_tabung()
    {
    	$tabung = Tabung::all();
    	return response()->json([
    		'status'=>'success',
    		'result'=>$tabung,
    	]);
    }

    public function riwayat_penjualan($id)
    {
    	$list = Transaksi::all()->where('user_id',$id);
    	return response()->json([
    		'status'=>'success',
    		'riwayat'=>$list,
    	]);
    }

    public function pembelian_konsumen($id)
    {
    	$list = Transaksi::all()->where('kons_id','=',$id);
    	return response()->json([
    		'status'=>'success',
    		'riwayat'=>$list,
    	]);
    }

    public function create(Request $request)
    {
    	$validator = Validator::make($request->all(),[
            'jumlah' => 'required',
        ]);

        if ($validator->fails()) {
                return response()->json(['error'=>$validator->errors()], 401);
            }

        if(Auth::check()){
        $new_trans = Transaksi::create([
            'jumlah' => $request->jumlah,
            'user_id' => Auth::id(),
            'kons_id' => $request->kons_id,
            'tabung_id' => $request->tabung_id,
            'lokasi' => $request->lokasi
            ]);
        $new_trans->save();

        return response()->json([
	        'status'=>'success',
	        'result'=>$new_trans
    		]);
        }
    }
}
