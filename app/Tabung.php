<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tabung extends Model
{
    protected $table = 'tabung';
    protected $fillable = ['jenis'];

    public function transaksi()
    {
    	return $this->hasMany('App\Transaksi','tabung_id','id');
    }

    /*public function user()
    {
        return $this->belongsToMany(User::class)->withPivot(['jumlah']);
    }

    /*public function tabus()
    {
    	return $this->hasMany('App\Tabus','tabung_id','id');
    }*/
}
