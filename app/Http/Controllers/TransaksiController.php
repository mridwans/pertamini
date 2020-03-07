<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaksi as data_trans;
use App\Tabung as data_tab;
use App\User as data_user;
use App\Konsumen as data_kons;

use Auth;

class TransaksiController extends Controller
{
    public function index()
    {
        if(auth()->user()->role == 'admin'){
            //$data_user = data_user::all();
            $data_transaksi = data_trans::all()->where('user_id','=', Auth::id())->sortByDesc('created_at');
            $counter = 1;
            return view('transaksi.index',compact('data_transaksi','counter'));
        }elseif (auth()->user()->role == 'agen' || auth()->user()->role == 'sales') {
            $data_transaksi = data_trans::all()->where('user_id','=', Auth::id())->sortByDesc('created_at');
            $data_beli = data_trans::all()->where('kons_id','=', Auth::id())->sortByDesc('created_at');
            $counter = 1;
            $counter2 = 1;
            return view('transaksi.index',compact('data_transaksi','counter','counter2','data_beli'));
        }else{
            $data_transaksi = data_trans::all()->where('user_id','=', Auth::id())->sortByDesc('created_at');
            $data_beli = data_trans::all()->where('kons_id','=', Auth::id())->sortByDesc('created_at');
            $counter = 1;
            $counter2 = 1;
            return view('transaksi.index',compact('data_transaksi','counter','counter2','data_beli'));
        };
         	
        //dd($data_transaksi);
    }

    public function transagen()
    {
        $list_user = data_user::all()->sortBy('name')->where('role','=', 'agen');
        $list_tab = data_tab::all()->sortBy('id');
        return view('transaksi.create',compact('list_user','list_tab'));

        /*
        if(auth()->user()->role == 'admin' or auth()->user()->role == 'agen'){
            $list_user = data_user::all()->sortBy('name')->where('user_id','=', Auth::id());
            return view('transaksi.create',['list_user'=> $list_user]);
        }else{
            $list_kons = data_kons::all()->sortBy('nama');
            return view('transaksi.create',['list_kons'=> $list_kons]);
        };
        */
    }

    public function transsales()
    {
        $list_user = data_user::all()->sortBy('name')->where('id_maker','=', Auth::id())->where('role','=','sales');
        $list_tab = data_tab::all()->sortBy('id');
        return view('transaksi.create',compact('list_user','list_tab'));
    }

    public function transkons()
    {
        $list_user = data_user::all()->sortBy('name')->where('role','=', 'konsumen');
        $list_tab = data_tab::all()->sortBy('id');
        return view('transaksi.create',compact('list_user','list_tab'));
    }



    public function create(Request $request)
    {
        if (Auth::check()) {
        $new_trans = data_trans::create([
            'jumlah' => $request->jumlah,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'user_id' => Auth::id(),
            'kons_id' => $request->kons_id,
            'tabung_id' => $request->tabung_id,
            'lokasi' => $request->lokasi
            ]);
        $new_trans->save();

        return redirect('/transaksi')->with('sukses','Transaksi berhasil ditambahkan');
        }
    }

    public function list($id)
    {
        $data_transaksi = data_trans::all()->where('user_id','=', $id);
        $data_beli = data_trans::all()->where('kons_id','=', $id);
        $counter = 1;
        $counter2 = 1;
        return view('transaksi.list',compact('data_transaksi','counter','counter2','data_beli'));
    }

    public function list2($id)
    {
        $data_beli = data_trans::all()->where('kons_id','=', $id);
        $counter2 = 1;
        return view('transaksi.list2',compact('counter2','data_beli'));
    }
}

