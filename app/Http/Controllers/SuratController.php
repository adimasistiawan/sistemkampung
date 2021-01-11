<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Pekerjaan;
use App\Pengaturan;
use Carbon\Carbon;
class SuratController extends Controller
{
    public function index(){
        $pekerjaan = Pekerjaan::where('is_delete',0)->get();
        return view('surat.index',compact('pekerjaan'));
    }
    public function submit(Request $request){
        if($request->surat == "Surat Keterangan Kurang Mampu"){
            $tgl = Carbon::now();
            $untuk = $request->untuk;
            $profil = Pengaturan::all();
            $dataprofil = json_decode($profil[0]->profil, true);
            $pdf = PDF::loadView('surat.pdf.kurangmampu',compact('tgl','untuk','dataprofil'));
            return $pdf->stream();
        }
        else if($request->surat == "Surat Keterangan Usaha"){
            $tgl = Carbon::now();
            $nama_usaha = $request->nama_usaha;
            $alamat = $request->alamat;
            $profil = Pengaturan::all();
            $dataprofil = json_decode($profil[0]->profil, true);
            $pdf = PDF::loadView('surat.pdf.usaha',compact('tgl','alamat','nama_usaha','dataprofil'));
            return $pdf->stream();
        }
        else if($request->surat == "Surat Keterangan Ahli Waris"){
            $tgl = Carbon::now();
            $untuk = $request->untuk;
            $orang = $request->orang;
            $nama = $request->nama;
            $profil = Pengaturan::all();
            $dataprofil = json_decode($profil[0]->profil, true);
            $pdf = PDF::loadView('surat.pdf.ahliwaris',compact('tgl','untuk','orang','nama','dataprofil'));
            return $pdf->stream();
        }
        else if($request->surat == "Surat Keterangan Kematian"){
            $tgl = Carbon::now();
            $data = $request;
            $profil = Pengaturan::all();
            $dataprofil = json_decode($profil[0]->profil, true);
            $pdf = PDF::loadView('surat.pdf.kematian',compact('tgl','data','dataprofil'));
            return $pdf->stream();
        }
    }
}
