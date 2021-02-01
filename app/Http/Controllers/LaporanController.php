<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PendudukDetail;
use PDF;
use DB;
class LaporanController extends Controller
{
    public function laporan_kependudukan(){
        return view('admin.laporan.kependudukan');
    }

    public function laporan_kependudukan_submit(Request $request){
        $data = DB::table('penduduk_detail')->join('penduduk','penduduk.id','penduduk_detail.penduduk_id')
                                    ->where('penduduk.rt',$request->arr['rt'])
                                    ->where('penduduk.rw',$request->arr['rw'])
                                    ->select('penduduk_detail.*','penduduk.no_kk')->orderBy('penduduk_detail.id','asc')->get();
        $rt_rw = $request->arr['rt']."/".$request->arr['rw'];
        return ['data' => $data, 'rt_rw' => $rt_rw];
    }

    public function laporan_kependudukan_pdf($rt,$rw)
    {
        $data = DB::table('penduduk_detail')->join('penduduk','penduduk.id','penduduk_detail.penduduk_id')
                                    ->where('penduduk.rt',$rt)
                                    ->where('penduduk.rw',$rw)
                                    ->select('penduduk_detail.*','penduduk.no_kk')->orderBy('penduduk_detail.id','asc')->get();
        $rt_rw = $rt."/".$rw;
        $pdf = PDF::loadView('admin.laporan.pdf.kependudukan',compact('data','rt_rw'))->setPaper('a4', 'landscape');
        
        return $pdf->stream();

    }

    public function laporan_suratkeluar(){
        return view('admin.laporan.suratkeluar');
    }

    public function laporan_suratkeluar_submit(Request $request){
        $data = DB::table('surat_keluar')->leftJoin('warga','surat_keluar.warga_id','warga.id')
                                        ->whereDate('surat_keluar.tanggal','>=',$request->arr['dari'])
                                        ->whereDate('surat_keluar.tanggal','<=',$request->arr['sampai'])
                                        ->where('surat_keluar.status','Telah Diterima')
                                        ->select('surat_keluar.*','warga.nama as warga')
                                        ->orderBy('surat_keluar.tanggal','asc')->get();
        return ['data' => $data];
    }

    public function laporan_suratkeluar_pdf($dari,$sampai)
    {
        $data = DB::table('surat_keluar')->leftJoin('warga','surat_keluar.warga_id','warga.id')
        ->whereDate('surat_keluar.tanggal','>=',$dari)
        ->whereDate('surat_keluar.tanggal','<=',$sampai)
        ->where('surat_keluar.status','Telah Diterima')
        ->select('surat_keluar.*','warga.nama as warga')
        ->orderBy('surat_keluar.tanggal','asc')->get();

        $pdf = PDF::loadView('admin.laporan.pdf.suratkeluar',compact('data'))->setPaper('a4', 'landscape');
        
        return $pdf->stream();

    }

    public function laporan_suratmasuk(){
        return view('admin.laporan.suratmasuk');
    }

    public function laporan_suratmasuk_submit(Request $request){
        $data = DB::table('surat_masuk')
                                        ->whereDate('surat_masuk.tanggal','>=',$request->arr['dari'])
                                        ->whereDate('surat_masuk.tanggal','<=',$request->arr['sampai'])
                                        ->orderBy('surat_masuk.tanggal','asc')->get();
        return ['data' => $data];
    }

    public function laporan_suratmasuk_pdf($dari,$sampai)
    {
        $data = DB::table('surat_masuk')
                                        ->whereDate('surat_masuk.tanggal','>=',$dari)
                                        ->whereDate('surat_masuk.tanggal','<=',$sampai)
                                        ->orderBy('surat_masuk.tanggal','asc')->get();

        $pdf = PDF::loadView('admin.laporan.pdf.suratmasuk',compact('data'))->setPaper('a4', 'landscape');
        
        return $pdf->stream();

    }
}
