<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Warga;
use Mail;
class WargaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Warga::orderBy('created_at','desc')->get();
        return view('admin.warga.index',compact('data'));
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
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $warga = Warga::find($id);
        return view('admin.warga.show',compact('warga'));
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
        $warga = Warga::find($id);
        $check = Warga::where('email', $request->email)->where('email','!=',$warga->email)->get();
        $check2 = Warga::where('nik', $request->nik)->where('nik','!=',$warga->nik)->get();
        if(count($check) > 0){
            return redirect()->route('warga.index')->with('error', 'Gagal. Email sudah pernah terdaftar ');;
        }
        if(count($check2) > 0){
            return redirect()->route('warga.index')->with('error', 'Gagal. NIK sudah pernah terdaftar ');;
        }
        if($request->password == null){
            Warga::find($id)->update([
                'nama' => $request->nama,
                'nik' => $request->nik,
                'no_kk' => $request->no_kk,
                'no_hp' => $request->no_hp,
                'email' => $request->email,
            ]);
        }else{
            Warga::find($id)->update([
                'nama' => $request->nama,
                'nik' => $request->nik,
                'no_kk' => $request->no_kk,
                'no_hp' => $request->no_hp,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
        }
        

        return redirect()->route('warga.index')->with('success', 'Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Warga::find($id)->delete();
        return redirect()->route('warga.index')->with('success', 'Success');
    }

    public function verifikasi(Request $request, $id){
        $warga = Warga::find($id);
        if($request->status == "Diverifikasi"){
            Mail::send('email_terima', ['nama' => $warga->nama, 'catatan' => "Pendaftaran sudah diterima, anda sudah bisa menggunakan akun anda"], function ($message) use ($warga)
            {
                $message->subject("Pendaftaran Diterima");
                $message->from('notoharjomail@gmail.com', 'Kampung Notoharjo');
                $message->to($warga->email);
            });

            $warga->update([
                'status' => "Telah Diverifikasi"
            ]);
            return 1;
        }else{
            Mail::send('email_tolak', ['nama' => $warga->nama, 'catatan' => $request->catatan], function ($message) use ($warga)
            {
                $message->subject("Pendaftaran Ditolak");
                $message->from('notoharjomail@gmail.com', 'Kampung Notoharjo');
                $message->to($warga->email);
            });

            $warga->delete();
            return 1;
        }
    }
}
