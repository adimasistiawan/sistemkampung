<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $table = 'Berita';
    protected $fillable = ['judul','video','dibuat_oleh','tanggal','foto','isi'];
}
