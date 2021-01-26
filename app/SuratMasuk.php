<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SuratMasuk extends Model
{
    protected $table = 'surat_masuk';
    protected $fillable = ['nomor_surat','perihal','tanggal','pengirim','penerima'];
}
