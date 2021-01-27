<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SuratMasuk;
class SuratMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = SuratMasuk::orderBy('created_at','desc')->get();
        return view('admin.suratmasuk.index',compact('data'));
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
            SuratMasuk::create([
                'nomor_surat' => $request->nomor_surat,
                'perihal' => $request->perihal,
                'tanggal' => $request->tanggal,
                'pengirim' => $request->pengirim,
                'penerima' => $request->penerima,
            ]);
            
        }else{
            SuratMasuk::find($request->id)->update([
                'nomor_surat' => $request->nomor_surat,
                'perihal' => $request->perihal,
                'tanggal' => $request->tanggal,
                'pengirim' => $request->pengirim,
                'penerima' => $request->penerima,
            ]);
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
        $data = SuratMasuk::find($id);
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
        SuratMasuk::find($id)->delete();
        return redirect()->back()->with('success', 'Success');
    }
}
