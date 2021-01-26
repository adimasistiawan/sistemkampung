<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Formulir;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
class FormulirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Formulir::orderBy('updated_at','desc')->get();
        return view('admin.formulir.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->id == null){
            $check = Formulir::where('nama',$request->nama)->get();
            if(count($check) > 0){
                return redirect()->back()->with('error', 'Gagal. Nama Formulir sudah pernah digunakan');
            }
            
            $resorce       = $request->file('file');
            $name   = Str::random().$resorce->getClientOriginalName();
            $resorce->move(\base_path() ."/public/formulir", $name);
            Formulir::create([
                'nama' => $request->nama,
                'file' => $name,
            ]);
            
        }else{
            $form = Formulir::find($request->id);
            $check = Formulir::where('nama',$request->nama)->where('nama','!=',$form->nama)->get();
            if(count($check) > 0){
                return redirect()->back()->with('error', 'Gagal. Nama Formulir sudah pernah digunakan');
            }
            if($request->hasFile('file')){
                $image_path = "formulir/".$form->file;
                if(File::exists($image_path)) {
                    File::delete($image_path);
                }

                $resorce       = $request->file('file');
                $name   = Str::random().$resorce->getClientOriginalName();
                $resorce->move(\base_path() ."/public/formulir", $name);
                $form->update([
                    'nama' => $request->nama,
                    'file' => $name,
                ]);
            }else{
                $form->update([
                    'nama' => $request->nama,
                ]);
            }
        }
        return redirect()->back()->with('success', 'Success');
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
        $data = Formulir::find($id);
        return $data;
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
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $form = Formulir::find($id);
        $image_path = "formulir/".$form->file;
        if(File::exists($image_path)) {
            File::delete($image_path);
        }
        $form->delete();
        return redirect()->back()->with('success', 'Success');
    }
}
