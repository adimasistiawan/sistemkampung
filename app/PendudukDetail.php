<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PendudukDetail extends Model
{
    protected $table = 'penduduk_detail';
    protected $fillable = ['nama',
    'status_keluarga',
    'nik',
    'jenis_kelamin',
    'tempat_lahir',
    'tanggal_lahir',
    'agama',
    'status_perkawinan',
    'kewarganegaraan',
    'no_paspor',
    'no_kitap',
    'ayah',
    'ibu',
    'penduduk_id',
    'pekerjaan_id',
    'pendidikan'];

    public function penduduk()
    {
        return $this->belongsTo('App\Penduduk','penduduk_id','id');    
    }
}
