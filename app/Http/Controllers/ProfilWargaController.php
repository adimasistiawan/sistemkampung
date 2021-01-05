<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Warga;
use Auth;
use Hash;
class ProfilWargaController extends Controller
{
    public function profil(){
        return view('profil');
    }
    public function gantipassword(){
        return view('gantipassword');
    }
    public function submitgantipassword(Request $request){
        
        if (!Hash::check($request->password, Auth::guard('warga')->user()->password)) {
            return redirect()->back()->with('error','Password yang anda masukan salah');
        }
        if($request->password_baru != $request->konfirmasi_password){
            return redirect()->back()->with('error','Konfirmasi Password yang anda masukan salah');
        }

        Warga::find(Auth::guard('warga')->user()->id)->update([
            'password' => bcrypt($request->password_baru)
        ]);
        return redirect()->back()->with('success','Berhasil mengganti password');
    }
}
