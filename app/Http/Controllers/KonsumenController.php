<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\User as data;
use Auth;

class KonsumenController extends Controller
{
    public function index()
    {
        $data_konsumen = data::all()->where('role','=', 'konsumen');
        $counter = 1;
        return view('konsumen.index',compact('data_konsumen','counter'));
    }

    public function tambah()
    {
        return view('konsumen.create');
    }

    public function create (Request $request)
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
        $new_konsumen = data::create([
            'name' => $request->name,
            'id_maker' => Auth::id(),
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => "konsumen",
            'remember_token' => Str::random(60),
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon
            ]);
        $new_konsumen->save();

        return redirect('/konsumen')->with('sukses','Konsumen berhasil ditambahkan');
        }
    }

    public function edit ($id)
    {
        $konsumen = data::find($id);
        return view('konsumen/edit',['konsumen' => $konsumen]);
    }

    public function update(Request $request, $id)
    {
        $update_konsumen = data::find($id);

        $this->validate($request,[
            'name' => 'required|min:3|regex:/^[\pL\s\-]+$/u|string',
            'email' => 'required|email|unique:users,email,'.$update_konsumen->id.',id',
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

        $update_konsumen->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon
        ]);
        $update_konsumen->save();
        return redirect('/konsumen')->with('sukses','Data konsumen berhasil diubah');
    }

    public function delete($id)
    {
        $delete_agen = data::find($id);
        $delete_agen->delete();
        return redirect('/konsumen')->with('sukses','Konsumen berhasil dihapus');
    }
}
