<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Pekerjaan;
use App\Pengaturan;
use App\SuratKeluar;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Auth;
class SuratController extends Controller
{
    public function index(){
        $surat_keluar = SuratKeluar::where('warga_id',Auth::guard('warga')->user()->id)->orderBy('updated_at','desc')->get();
        return view('surat.index',compact('surat_keluar'));
    }

    public function buat(){
        $pekerjaan = Pekerjaan::where('is_delete',0)->get();
        return view('surat.buat',compact('pekerjaan'));
    }
    
    public function submit(Request $request){
        $watermark = true;
        $tgl = Carbon::now();
        $data = $request;
        $profil = Pengaturan::all();
        $dataprofil = json_decode($profil[0]->profil, true);
        if($request->submit == 0){
            
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

            else if($request->surat == "Surat Rekomendasi Nikah"){
                $pdf = PDF::loadView('surat.pdf.nikah',compact('tgl','data','dataprofil','watermark'));
                return $pdf->stream();
            }

            else if($request->surat == "Surat Permohonan SKCK"){
                $pdf = PDF::loadView('surat.pdf.skck',compact('tgl','data','dataprofil','watermark'));
                return $pdf->stream();
            }

            else if($request->surat == "Surat Pengantar Perkawinan"){
                $pdf = PDF::loadView('surat.pdf.perkawinan',compact('tgl','data','dataprofil','watermark'));
                return $pdf->stream();
            }
        }
        
        /// ---- ajukan
        else{
            $json = json_encode([
                'tgl' => $tgl,
                'data' => $data->all(),
                'dataprofil' => $dataprofil,
            ]);
            SuratKeluar::create([
                'warga_id' => Auth::guard('warga')->user()->id,
                'tanggal' => $tgl,
                'perihal' => $request->surat,
                'data' => $json
            ]);

            return redirect()->route('surat')->with('success','Pengajuan berhasil. mohon tunggu sampai status Telah Diterima');
        }
        
    }
}
