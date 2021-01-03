<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Berita;
use App\Penduduk;
use App\Profil;
use DB;
class FrontendController extends Controller
{
    public function index(){
        $berita = Berita::orderBy('created_at','desc')->get();
        return view('home',compact('berita'));
    }
}
