<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Warga;
class AuthWargaController extends Controller
{
    public function daftar(Request $request){
        $request->validate([
            'email' => 'unique:warga',
            'nik' => 'unique:warga'
        ]);

        Warga::create([
            'nama' => $request->nama,
            'nik' => $request->nik,
            'no_kk' => $request->no_kk,
            'no_hp' => $request->no_hp,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'status' => 'Belum Diverifikasi',
        ]);

        return redirect()->route('verifikasi');
    }
}
