<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Konsumen extends Model
{
    protected $table = 'konsumen';
    protected $fillable = ['user_id'];

    public function user()
    {
    	return $this->belongsTo('App\User','user_id','id');
    }

    public function transaksi()
    {
    	return $this->hasMany('App\Transaksi','kons_id','id');
    }
}
