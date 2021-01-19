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
        if($request->submit == 0){
            $watermark = true;
            if($request->surat == "Surat Keterangan Kurang Mampu"){
                $tgl = Carbon::now();
                $untuk = $request->untuk;
                $profil = Pengaturan::all();
                $dataprofil = json_decode($profil[0]->profil, true);
                $pdf = PDF::loadView('surat.pdf.kurangmampu',compact('tgl','untuk','dataprofil','watermark'));
                return $pdf->stream();
            }
            else if($request->surat == "Surat Keterangan Usaha"){
                $tgl = Carbon::now();
                $nama_usaha = $request->nama_usaha;
                $alamat = $request->alamat;
                $profil = Pengaturan::all();
                $dataprofil = json_decode($profil[0]->profil, true);
                $pdf = PDF::loadView('surat.pdf.usaha',compact('tgl','alamat','nama_usaha','dataprofil','watermark'));
                return $pdf->stream();
            }
            else if($request->surat == "Surat Keterangan Tanah"){
                $tgl = Carbon::now();
                $luas_tanah = $request->luas_tanah;
                $alamat = $request->alamat;
                $profil = Pengaturan::all();
                $dataprofil = json_decode($profil[0]->profil, true);
                $pdf = PDF::loadView('surat.pdf.tanah',compact('tgl','alamat','luas_tanah','dataprofil','watermark'));
                return $pdf->stream();
            }
            else if($request->surat == "Surat Keterangan Ahli Waris"){
                $tgl = Carbon::now();
                $untuk = $request->untuk;
                $orang = $request->orang;
                $nama = $request->nama;
                $profil = Pengaturan::all();
                $dataprofil = json_decode($profil[0]->profil, true);
                $pdf = PDF::loadView('surat.pdf.ahliwaris',compact('tgl','untuk','orang','nama','dataprofil','watermark'));
                return $pdf->stream();
            }
            else if($request->surat == "Surat Keterangan Kematian"){
                $tgl = Carbon::now();
                $data = $request;
                $profil = Pengaturan::all();
                $dataprofil = json_decode($profil[0]->profil, true);
                $pdf = PDF::loadView('surat.pdf.kematian',compact('tgl','data','dataprofil','watermark'));
                return $pdf->stream();
            }
            else if($request->surat == "Surat Keterangan Kuasa"){
                $tgl = Carbon::now();
                $data = $request;
                $profil = Pengaturan::all();
                $dataprofil = json_decode($profil[0]->profil, true);
                $pdf = PDF::loadView('surat.pdf.kuasa',compact('tgl','data','dataprofil','watermark'));
                return $pdf->stream();
            }
            else if($request->surat == "Surat Keterangan Jual Beli"){
                $tgl = Carbon::now();
                $data = $request;
                $profil = Pengaturan::all();
                $dataprofil = json_decode($profil[0]->profil, true);
                $pdf = PDF::loadView('surat.pdf.jualbeli',compact('tgl','data','dataprofil','watermark'));
                return $pdf->stream();
            }

            else if($request->surat == "Surat Pernyataan Hiburan"){
                $tgl = Carbon::now();
                $data = $request;
                $profil = Pengaturan::all();
                $dataprofil = json_decode($profil[0]->profil, true);
                $pdf = PDF::loadView('surat.pdf.hiburan',compact('tgl','data','dataprofil','watermark'));
                return $pdf->stream();
            }

            else if($request->surat == "Surat Keterangan Mengurus Orang Tua"){
                $tgl = Carbon::now();
                $profil = Pengaturan::all();
                $dataprofil = json_decode($profil[0]->profil, true);
                $pdf = PDF::loadView('surat.pdf.orangtua',compact('tgl','dataprofil','watermark'));
                return $pdf->stream();
            }
        }
        
        /// ---- ajukan
        else{

        }
        
    }
}
