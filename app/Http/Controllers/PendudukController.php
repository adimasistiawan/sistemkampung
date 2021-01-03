<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Penduduk;
use App\PendudukDetail;
use App\Pendidikan;
use App\Pekerjaan;
class PendudukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Penduduk::orderBy('created_at','desc')->get();
        return view('admin.penduduk.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pekerjaan = Pekerjaan::where('is_delete',0)->get();
        return view('admin.penduduk.create',compact('pekerjaan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $check = Penduduk::where('no_kk', $request->arr['no_kk'])->get();
        
        if(count($check) > 0){
            return 2;
        }

        $penduduk = Penduduk::create([
            'no_kk' => $request->arr['no_kk'],
            'rt_rw' => $request->arr['rt_rw'],
            'alamat' => $request->arr['alamat'],
            'kepala_keluarga' => $request->arr['kepala_keluarga']
        ]);
        foreach($request->item as $value){
            PendudukDetail::create([
                'penduduk_id' => $penduduk->id,
                'pendidikan' => $value['pendidikan'],
                'pekerjaan_id' => $value['pekerjaan_id'],
                'nama' => $value['nama'],
                'status_keluarga' => $value['status_keluarga'],
                'nik' => $value['nik'],
                'jenis_kelamin' => $value['jenis_kelamin'],
                'tempat_lahir' => $value['tempat_lahir'],
                'tanggal_lahir' => $value['tanggal_lahir'],
                'agama' => $value['agama'],
                'status_perkawinan' => $value['status_perkawinan'],
                'kewarganegaraan' => $value['kewarganegaraan'],
                'no_paspor' => $value['no_paspor'],
                'no_kitap' => $value['no_kitap'],
                'ayah' => $value['ayah'],
                'ibu' => $value['ibu'],
            ]);
        }
        return 1;
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
        $pekerjaan = Pekerjaan::where('is_delete',0)->get();
        $penduduk = Penduduk::find($id);
        $penduduk_detail = PendudukDetail::where('penduduk_id',$id)->get();
        return view('admin.penduduk.edit',compact('pekerjaan','penduduk','penduduk_detail'));
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
        // dd($request->all());
        $penduduk = Penduduk::findOrFail($id);
        $check = Penduduk::where('no_kk', $request->arr['no_kk'])->where('no_kk', '!=', $penduduk->no_kk)->get();
        
        if(count($check) > 0){
            return 2;
        }
        PendudukDetail::where('penduduk_id',$id)->delete();
        $penduduk->update([
            'no_kk' => $request->arr['no_kk'],
            'rt_rw' => $request->arr['rt_rw'],
            'alamat' => $request->arr['alamat'],
            'kepala_keluarga' => $request->arr['kepala_keluarga']
        ]);
        foreach($request->item as $value){
            PendudukDetail::create([
                'penduduk_id' => $penduduk->id,
                'pendidikan' => $value['pendidikan'],
                'pekerjaan_id' => $value['pekerjaan_id'],
                'nama' => $value['nama'],
                'status_keluarga' => $value['status_keluarga'],
                'nik' => $value['nik'],
                'jenis_kelamin' => $value['jenis_kelamin'],
                'tempat_lahir' => $value['tempat_lahir'],
                'tanggal_lahir' => $value['tanggal_lahir'],
                'agama' => $value['agama'],
                'status_perkawinan' => $value['status_perkawinan'],
                'kewarganegaraan' => $value['kewarganegaraan'],
                'no_paspor' => $value['no_paspor'],
                'no_kitap' => $value['no_kitap'],
                'ayah' => $value['ayah'],
                'ibu' => $value['ibu'],
            ]);
        }
        return 1;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Penduduk::findOrFail($id)->delete();
        PendudukDetail::where('penduduk_id',$id)->delete();
        return redirect()->route('penduduk.index')->with('success', 'Success');
    }
}
