<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profil;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profil = Profil::all();
        $data = json_decode($profil[0]->data, true);
        $id = $profil[0]->id;
        
        return view('admin.profil.index',compact('data','id'));
        // return view('admin.profil.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        

        if($request->hasFile('struktur_organisasi')){
            $profil = Profil::find($request->id);
            $img = json_decode($profil->data, true);
            $image_path = "struktur/".$img['struktur_organisasi'];
            if(File::exists($image_path)) {
                File::delete($image_path);
            }
            $resorce       = $request->file('struktur_organisasi');
            $name   = Str::random().$resorce->getClientOriginalName();
            $resorce->move(\base_path() ."/public/struktur", $name);

            
            
            $data = json_encode([
                'sejarah' => $request->sejarah,
                'visi' => $request->visi,
                'misi' => $request->misi,
                'struktur_organisasi' => $name,
            ]);
            $profil->update([
                'data' => $data
            ]);
        }else{
            $profil = Profil::find($request->id);
            $img = json_decode($profil->data, true);
            $data = json_encode([
                'sejarah' => $request->sejarah,
                'visi' => $request->visi,
                'misi' => $request->misi,
                'struktur_organisasi' => $img['struktur_organisasi'],
            ]);
            $profil->update([
                'data' => $data
            ]);
        }
        return redirect()->route('profil.index')->with('success', 'Success');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
