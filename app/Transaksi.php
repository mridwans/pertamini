<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';
    protected $fillable = ['kons_id','user_id','tabung_id','jumlah','longitude','latitude','lokasi','created_at'];

    public function tabung()
    {
    	return $this->belongsTo('App\Tabung', 'tabung_id', 'id');
    }

    public function user()
    {
    	return $this->belongsTo('App\User','user_id','id');
    }

    public function konsumen()
    {
    	return $this->belongsTo('App\Konsumen','kons_id','id');
    }
}
