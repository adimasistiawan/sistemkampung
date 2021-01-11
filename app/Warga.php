<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Warga extends Authenticatable
{
    protected $table = 'warga';
    protected $fillable = ['nama','nik','no_kk','no_hp','pekerjaan_id','status_kawin','agama','tempat_lahir','tanggal_lahir','alamat','jenis_kelamin','email','password','status'];
    public function pekerjaan()
    {
        return $this->belongsTo('App\Pekerjaan','pekerjaan_id','id');    
    }
}
