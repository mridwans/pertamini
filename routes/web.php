<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/login','AuthController@login')->name('login');
Route::post('/postlogin','AuthController@postlogin');
Route::get('/logout','AuthController@logout');

///   SEMUA BISAA
Route::group(['middleware'=>['auth','checkRole:admin,agen,sales']],function(){
	Route::get('/dashboard','DashboardController@index');

	Route::get('/transaksi','TransaksiController@index');
	Route::post('/transaksi/create','TransaksiController@create');
	Route::get('/transaksi/{id}/list','TransaksiController@list');
	Route::get('/transaksi/{id}/list2','TransaksiController@list2');
	Route::get('/transaksi/transagen','TransaksiController@transagen');
	Route::get('/transaksi/transsales','TransaksiController@transsales');
	Route::get('/transaksi/transkons','TransaksiController@transkons');

	Route::get('/konsumen','KonsumenController@index');
	Route::get('/konsumen/{id}/edit','KonsumenController@edit');
	Route::post('/konsumen/{id}/update','KonsumenController@update');
	Route::get('/konsumen/{id}/delete','KonsumenController@delete');

});

/// ADMIN & AGEN YG BISA
Route::group(['middleware'=>['auth','checkRole:admin,agen']],function()
{	
	Route::get('/sales','SalesController@index');

});

/// AGEN & SALES YG BISA
Route::group(['middleware'=>['auth','checkRole:agen,sales']],function()
{
	Route::get('/konsumen/tambah','KonsumenController@tambah');
	Route::post('/konsumen/create','KonsumenController@create');
});


/// ADMIN YG BISA
Route::group(['middleware'=>['auth','checkRole:admin']],function()
{	
	Route::get('/agen','AgenController@index');
	Route::get('/agen/tambah','AgenController@tambah');
	Route::post('/agen/create','AgenController@create');
	Route::get('/agen/{id}/edit','AgenController@edit');
	Route::post('/agen/{id}/update','AgenController@update');
	Route::get('/agen/{id}/delete','AgenController@delete');

});

/// AGEN YG BISA
Route::group(['middleware'=>['auth','checkRole:agen']],function()
{	
	Route::get('/sales/tambah','SalesController@tambah');
	Route::post('/sales/create','SalesController@create');
	Route::get('/sales/{id}/edit','SalesController@edit');
	Route::post('/sales/{id}/update','SalesController@update');
	Route::get('/sales/{id}/delete','SalesController@delete');
});

