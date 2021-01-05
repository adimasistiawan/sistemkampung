<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Berita;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Berita::all();
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

        Berita::create([
            'foto' => $name,
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
            $berita->update([
                'foto' => $name,
                'judul' => $request->judul,
                'tanggal' => $request->tanggal,
                'isi' => $request->isi,
            ]);
        }else{
            Berita::find($id)->update([
                'judul' => $request->judul,
                'tanggal' => $request->tanggal,
                'isi' => $request->isi,
            ]);
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
        $berita->delete();
        return redirect()->route('berita.index')->with('success', 'Success');
    }
}
