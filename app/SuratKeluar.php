<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SuratKeluar extends Model
{
    protected $table = 'surat_keluar';
    protected $fillable = ['warga_id','pemohon','nomor_surat','perihal','tanggal','penanggung_jawab','keterangan','data','urutan','status'];
    public function warga()
    {
        return $this->belongsTo('App\Warga','warga_id','id');    
    }
}
