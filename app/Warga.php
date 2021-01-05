<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Warga extends Authenticatable
{
    protected $table = 'warga';
    protected $fillable = ['nama','nik','no_kk','no_hp','email','password','status'];
}
