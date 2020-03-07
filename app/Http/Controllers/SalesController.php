<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\User as data;
use Auth;

class SalesController extends Controller
{
    public function index()
    {

        if (auth()->user()->role == 'admin') {
            $data_sales = data::all()->where('role','=','sales');
            $counter = 1;
            return view('sales.index',compact('data_sales','counter'));

        } elseif (auth()->user()->role == 'agen') {
            //$data_sales = data::all()->where(['id_maker','=','Auth::id'], ['role','=','sales']);

            $data_sales = data::all()->where('id_maker','=', Auth::id())->where('role','=','sales');
            $counter = 1;
            return view('sales.index',compact('data_sales','counter'));
        } {
            $data_sales = data::all()->where('id_maker','=', Auth::id());
            $counter = 1;
            return view('sales.index',compact('data_sales','counter'));
        }

        //$data_agen = data::all()->where('role','=', 'agen');
        #return view('agen.index',['data_agen' => $data_agen]);
    }

    public function tambah()
    {
    	return view('sales.create');
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
    	$new_sales = data::create([
    		'name' => $request->name,
            'id_maker' => Auth::id(),
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => "sales",
            'remember_token' => Str::random(60),
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon
            ]);
    	$new_sales->save();
    	return redirect('/sales')->with('sukses','Sales berhasil ditambahkan');
    	}
    }

    public function edit ($id)
    {
        $data_sales = data::find($id);
        return view('sales/edit',['sales' => $data_sales]);
    }

    public function update (Request $request, $id)
    {
        $update_sales = data::find($id);
        $this->validate($request,[
            'name' => 'required|min:3|regex:/^[\pL\s\-]+$/u|string',
            'email' => 'required|email|unique:users,email,'.$update_sales->id.',id',
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

        
        $update_sales->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon
        ]);
        $update_sales->save();
        return redirect('sales')->with('sukses','Data sales berhasil diubah');
    }

    public function delete($id)
    {
        $delete_sales = data::find($id);
        $delete_sales->delete();
        return redirect('/sales')->with('sukses','Data sales berhasil dihapus');
    }
}
