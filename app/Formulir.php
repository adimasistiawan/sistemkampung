<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Formulir extends Model
{
    protected $table = 'formulir';
    protected $fillable = ['nama','file'];
}
