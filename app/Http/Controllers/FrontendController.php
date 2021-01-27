<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Berita;
use App\Penduduk;
use App\Pengaturan;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use DB;
class FrontendController extends Controller
{
    public function index(){
        $profil = Pengaturan::all();
        $data = json_decode($profil[0]->web, true);
        $berita = Berita::orderBy('created_at','desc')->limit(5)->get();
        $video = Berita::where('video','!=',null)->orderBy('created_at','desc')->limit(6)->get();
        return view('home',compact('berita','data','video'));
    }
    public function berita(){
        $berita = Berita::orderBy('created_at','desc')->paginate(10);
        return view('berita.index',compact('berita'));
    }
    public function detailberita($id){
        $berita = Berita::find($id);
        return view('berita.detail',compact('berita'));
    }
    public function web()
    {
        $profil = Pengaturan::all();
        $data = json_decode($profil[0]->web, true);
        $id = $profil[0]->id;
        
        return view('admin.web.index',compact('data','id'));
        // return view('admin.profil.index');
    }

    public function webstore(Request $request)
    {
        
        if($request->hasFile('foto_header')){
            $profil = Pengaturan::find($request->id);
            $img = json_decode($profil->web, true);
            $image_path = "header/".$img['foto_header'];
            if(File::exists($image_path)) {
                File::delete($image_path);
            }
            $resorce       = $request->file('foto_header');
            $name   = Str::random().$resorce->getClientOriginalName();
            $resorce->move(\base_path() ."/public/header", $name);
            $data = json_encode([
                'email' => $request->email,
                'telepon' => $request->telepon,
                'foto_header' => $name,
            ]);
            $profil->update([
                'web' => $data
            ]);
        }else{
            $profil = Pengaturan::find($request->id);
            $img = json_decode($profil->web, true);
            $data = json_encode([
                'email' => $request->email,
                'telepon' => $request->telepon,
                'foto_header' => $img['foto_header'],
            ]);
            $profil->update([
                'web' => $data
            ]);
        }
        return redirect()->route('web.index')->with('success', 'Success');
    }
}
