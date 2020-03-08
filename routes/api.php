<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->group(function () {
    Route::post('/konsumen/create','API\KonsumenController@create');
	Route::get('/konsumen/list','API\TransaksiController@list_konsumen');
	Route::get('/tabung/list','API\TransaksiController@list_tabung');
	Route::get('/sales/riwayat_penjualan/{id}','API\TransaksiController@riwayat_penjualan');
	Route::get('/sales/pembelian_konsumen/{id}','API\TransaksiController@pembelian_konsumen');
	Route::post('/transaksi/create','TransaksiController@create');
});

Route::post('login', 'API\UserController@login');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    //return $request->user();
    //Route::get('user', 'UserController@details');

});
