<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pekerjaan;
class PekerjaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Pekerjaan::where('is_delete',0)->orderBy('created_at','desc')->get();
        return view('admin.pekerjaan.index',compact('data'));
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
        $check = Pekerjaan::where('nama', $request->nama)->get();
        if(count($check) > 0){
            return redirect()->route('pekerjaan.index')->with('error', 'Gagal. Nama sudah pernah digunakan ');
        }
        Pekerjaan::create([
            'nama' => $request->nama,
            'is_delete' => 0
        ]);

        return redirect()->route('pekerjaan.index')->with('success', 'Success');
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
        $pekerjaan = Pekerjaan::find($id);
        $check = Pekerjaan::where('nama', $request->nama)->where('nama','!=',$pekerjaan->nama)->get();
        if(count($check) > 0){
            return redirect()->route('akun-user.index')->with('error', 'Gagal. Nama sudah pernah digunakan ');;
        }
        $pekerjaan->update([
            'nama' => $request->nama,
        ]);

        return redirect()->route('pekerjaan.index')->with('success', 'Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pekerjaan = Pekerjaan::find($id);
        $pekerjaan->update([
            'is_delete' => 1,
        ]);

        return redirect()->route('pekerjaan.index')->with('success', 'Success');
    }
}
