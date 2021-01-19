<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Warga;
use App\Pekerjaan;
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
    public function ubahprofil(){
        $pekerjaan = Pekerjaan::where('is_delete',0)->get();
        return view('ubahprofil',compact('pekerjaan'));
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

    public function submitubahprofil(Request $request){
        
        Warga::find(Auth::guard('warga')->user()->id)->update([
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'status_kawin' => $request->status_kawin,
            'pekerjaan_id' => $request->pekerjaan_id,
            'agama' => $request->agama,
            'email' => $request->email,
        ]);
        return redirect()->route('profil.warga')->with('success','Berhasil mengubah profil');
    }
}
