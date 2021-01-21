<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Pekerjaan;
use App\Pengaturan;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
class SuratController extends Controller
{
    public function index(){
        $pekerjaan = Pekerjaan::where('is_delete',0)->get();
        return view('surat.index',compact('pekerjaan'));
    }
    
    public function submit(Request $request){
        if($request->submit == 0){
            $watermark = true;
            $tgl = Carbon::now();
            $data = $request;
            $profil = Pengaturan::all();
            $dataprofil = json_decode($profil[0]->profil, true);
            if($request->surat == "Surat Keterangan Kurang Mampu"){
                $pdf = PDF::loadView('surat.pdf.kurangmampu',compact('tgl','data','dataprofil','watermark'));
                return $pdf->stream();
            }
            else if($request->surat == "Surat Keterangan Usaha"){
                $pdf = PDF::loadView('surat.pdf.usaha',compact('tgl','data','dataprofil','watermark'));
                return $pdf->stream();
            }
            else if($request->surat == "Surat Keterangan Tanah"){
                $pdf = PDF::loadView('surat.pdf.tanah',compact('tgl','data','dataprofil','watermark'));
                return $pdf->stream();
            }
            else if($request->surat == "Surat Keterangan Ahli Waris"){
                $pdf = PDF::loadView('surat.pdf.ahliwaris',compact('tgl','data','dataprofil','watermark'));
                return $pdf->stream();
            }
            else if($request->surat == "Surat Keterangan Kematian"){
                $pdf = PDF::loadView('surat.pdf.kematian',compact('tgl','data','dataprofil','watermark'));
                return $pdf->stream();
            }
            else if($request->surat == "Surat Keterangan Kuasa"){
                $pdf = PDF::loadView('surat.pdf.kuasa',compact('tgl','data','dataprofil','watermark'));
                return $pdf->stream();
            }
            else if($request->surat == "Surat Keterangan Jual Beli"){
                $pdf = PDF::loadView('surat.pdf.jualbeli',compact('tgl','data','dataprofil','watermark'));
                return $pdf->stream();
            }

            else if($request->surat == "Surat Pernyataan Hiburan"){
                $pdf = PDF::loadView('surat.pdf.hiburan',compact('tgl','data','dataprofil','watermark'));
                return $pdf->stream();
            }

            else if($request->surat == "Surat Keterangan Mengurus Orang Tua"){
                $pdf = PDF::loadView('surat.pdf.orangtua',compact('tgl','dataprofil','watermark'));
                return $pdf->stream();
            }

            else if($request->surat == "Surat Keterangan Kehilangan"){
                $pdf = PDF::loadView('surat.pdf.kehilangan',compact('tgl','data','dataprofil','watermark'));
                return $pdf->stream();
            }

            else if($request->surat == "Surat Keterangan Pindah"){
                $pdf = PDF::loadView('surat.pdf.pindah',compact('tgl','data','dataprofil','watermark'));
                return $pdf->stream();
            }

            else if($request->surat == "Surat Keterangan Jalan"){
                $pdf = PDF::loadView('surat.pdf.jalan',compact('tgl','data','dataprofil','watermark'));
                return $pdf->stream();
            }
        }
        
        /// ---- ajukan
        else{

        }
        
    }
}
