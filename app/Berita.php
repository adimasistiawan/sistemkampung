<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $table = 'Berita';
    protected $fillable = ['judul','dibuat_oleh','tanggal','foto','isi'];
}
