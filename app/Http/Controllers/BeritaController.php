<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Berita;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Auth;
class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Berita::orderBy('updated_at','desc')->get();
        return view('admin.berita.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.berita.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $resorce       = $request->file('foto');
        $name   = Str::random().$resorce->getClientOriginalName();
        $resorce->move(\base_path() ."/public/image_berita", $name);

        if($request->video != null){
            $resorce       = $request->file('video');
            $video   = Str::random().$resorce->getClientOriginalName();
            $resorce->move(\base_path() ."/public/video_berita", $video);
        }
        else{
            $video = null;
        }
        

        Berita::create([
            'foto' => $name,
            'video' => $video,
            'dibuat_oleh' => Auth::guard('admin')->user()->nama,
            'judul' => $request->judul,
            'tanggal' => $request->tanggal,
            'isi' => $request->isi,
        ]);
        
        return redirect()->route('berita.index')->with('success', 'Success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $berita = Berita::find($id);
        return view('admin.berita.edit',compact('berita'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($request->hasFile('foto')){
            $berita = Berita::find($id);
            $resorce       = $request->file('foto');
            $name   = Str::random().$resorce->getClientOriginalName();
            $resorce->move(\base_path() ."/public/image_berita", $name);

            $image_path = "image_berita/".$berita->foto;
            if(File::exists($image_path)) {
                File::delete($image_path);
            }
            $berita->foto = $name;
            $berita->judul = $request->judul;
            $berita->tanggal = $request->tanggal;
            $berita->isi = $request->isi;
            if($request->video != null){
                $resorce       = $request->file('video');
                $video   = Str::random().$resorce->getClientOriginalName();
                $resorce->move(\base_path() ."/public/video_berita", $video);

                $image_path = "video_berita/".$berita->video;
                if(File::exists($image_path)) {
                    File::delete($image_path);
                }
                $berita->video = $video;
            }
            $berita->update();
        }else{
            $berita = Berita::find($id);
            $berita->judul = $request->judul;
            $berita->tanggal = $request->tanggal;
            $berita->isi = $request->isi;
            if($request->video != null){
                $resorce       = $request->file('video');
                $video   = Str::random().$resorce->getClientOriginalName();
                $resorce->move(\base_path() ."/public/video_berita", $video);

                $image_path = "video_berita/".$berita->video;
                if(File::exists($image_path)) {
                    File::delete($image_path);
                }
                $berita->video = $video;
            }
            $berita->update();
        }
        return redirect()->route('berita.index')->with('success', 'Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $berita = Berita::find($id);
        $image_path = "image_berita/".$berita->foto;
        if(File::exists($image_path)) {
            File::delete($image_path);
        }

        $image_path = "video_berita/".$berita->video;
        if(File::exists($image_path)) {
            File::delete($image_path);
        }
        $berita->delete();
        return redirect()->route('berita.index')->with('success', 'Success');
    }

    public function deletevideo($id){
        $berita = Berita::find($id);
         
        $image_path = "video_berita/".$berita->video;
        if(File::exists($image_path)) {
            File::delete($image_path);
        }

        $berita->video = null;
        $berita->update();

        return redirect()->back();
    }
}
