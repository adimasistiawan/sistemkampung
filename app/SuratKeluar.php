<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SuratKeluar extends Model
{
    protected $table = 'surat_keluar';
    protected $fillable = ['warga_id','nomor_surat','perihal','tanggal','penanggung_jawab','keterangan','data','urutan'];
}
