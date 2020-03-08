<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User as data;
use Validator;

class KonsumenController extends Controller
{
    public function create (Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|min:3|regex:/^[\pL\s\-]+$/u|string',
            'email' => 'required|email|unique:users',
            'telepon' => 'required|regex:/^[0-9]+$/|max:25|min:10',
            'alamat' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
                return response()->json(['error'=>$validator->errors()], 401);
            }


        if(Auth::check()){
        $new_konsumen = data::create([
            'name' => $request->name,
            'id_maker' => Auth::id(),
            'email' => $request->email,
            'password' => bcrypt("rahasia"),
            'role' => "konsumen",
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon
            ]);
        $new_konsumen->save();

        //return redirect('/konsumen')->with('sukses','Konsumen berhasil ditambahkan');
        return response()->json([
	        'status'=>'success',
	        'result'=>$new_konsumen
    		]);
        }
    }
}
