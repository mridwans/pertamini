<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\User as data;
use App\Konsumen as konsumen;
use Auth;

class AgenController extends Controller
{
    public function index()
    {
    	$data_agen = data::all()->where('role','=', 'agen');
        $counter = 1;
    	return view('agen.index',compact('data_agen','counter'));
    }

    public function tambah()
    {
    	return view('agen.create');
    }

    public function create(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|min:3|regex:/^[\pL\s\-]+$/u|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'telepon' => 'required|regex:/^[0-9]+$/|max:25|min:10',
            'alamat' => 'required|string|max:255',
        ],[
            'name.required' => 'Nama tidak boleh kosong!',
            'name.regex' => 'Nama tidak boleh angka saja!',
            'email.required' => 'Email tidak boleh kosong!',
            'email.unique' => 'Email sudah digunakan!',
            'password.required' => 'Password tidak boleh kosong!',
            'alamat.required' => 'Alamat tidak boleh kosong!',
            'telepon.required' => 'No Telepon tidak boleh kosong!',
            'telepon.min' => 'No Telepon minimal 10 angka!',

        ]);

    	if(Auth::check()){
    	$new_agen = data::create([
    		'name' => $request->name,
    		'id_maker' => Auth::id(),
    		'email' => $request->email,
    		'password' => bcrypt($request->password),
    		'role' => "agen",
            'remember_token' => Str::random(60),
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon
    		]);
    	$new_agen->save();

    	return redirect('/agen')->with('sukses','Agen berhasil ditambahkan');
    	}
    }

    public function edit($id)
    {
        $data_agen = data::find($id);
        return view('agen/edit',['agen' => $data_agen]);
    }

    public function update(Request $request, $id)
    {
        $update_agen = data::find($id);

        $this->validate($request,[
            'name' => 'required|min:3|regex:/^[\pL\s\-]+$/u|string',
            'email' => 'required|email|unique:users,email,'.$update_agen->id.',id',
            'password' => 'required|min:6',
            'telepon' => 'required|regex:/^[0-9]+$/|max:25|min:10',
            'alamat' => 'required|string|max:255',
        ],[
            'name.required' => 'Nama tidak boleh kosong!',
            'name.regex' => 'Nama tidak boleh angka saja!',
            'email.required' => 'Email tidak boleh kosong!',
            'email.unique' => 'Email sudah digunakan!',
            'password.required' => 'Password tidak boleh kosong!',
            'alamat.required' => 'Alamat tidak boleh kosong!',
            'telepon.required' => 'No Telepon tidak boleh kosong!',
            'telepon.min' => 'No Telepon minimal 10 angka!',

        ]);

        $update_agen->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon
        ]);
        $update_agen->save();
        return redirect('/agen')->with('sukses','Data agen berhasil diubah');
    }

    public function delete($id)
    {
        $delete_agen = data::find($id);
        $delete_agen->delete();
        return redirect('/agen')->with('sukses','Agen berhasil dihapus');
    }

}
