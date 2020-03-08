<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use Notifiable;
    use HasApiTokens;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'id_maker','email', 'password', 'role',  'jenis_kelamin','alamat','telepon'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function konsumen()
    {
        return $this->hasOne('App\Konsumen','user_id','id');
    }

    public function transaksi()
    {
        return $this->hasMany('App\Transaksi','user_id','id');
    }

    /*public function tabung()
    {
        return $this->belongsToMany(Tabung::class)->withPivot(['jumlah']);
    }

    /*public function tabus()
    {
        return $this->hasMany('App\Tabus','user_id','id');
    }*/
}


