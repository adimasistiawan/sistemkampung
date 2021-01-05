<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Warga;
use Auth;
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

    public function login(Request $request){
        
        if(Auth::guard('warga')->attempt(['email' => $request->email, 'password' => $request->password])){
            if(Auth::guard('warga')->user()->status == "Belum Diverifikasi"){
                return redirect()->back()->with('message','Akun anda belum diverifikasi');
            }
            else{
                return redirect()->route('index');
            }
        }
        else{
            return redirect()->back()->with('message','Email atau Password salah');
        }
    }

    public function logout() {
        Auth::guard('warga')->logout();
        return redirect()->route('index');
    }
}
