<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SuratKeluar;
use App\KodeSurat;
use App\Pengaturan;
use App\Warga;
use Carbon\Carbon;
use PDF;
class SuratKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $telahditerima = SuratKeluar::where('status','Telah Diterima')->orderBy('tanggal','desc')->get();
        $belumditerima = SuratKeluar::where('status','Belum Diterima')->orderBy('updated_at','desc')->get();
        return view('admin.suratkeluar.index',compact('telahditerima','belumditerima'));
    }

    public function pdf($perihal,$id,$mark)
    {
        
        $watermark = $mark == 1? true:false;
        $surat = SuratKeluar::find($id);
        $tgl = $surat->created_at;
        $json = json_decode($surat->data, true);
        $data = $json['data'];
        $profil = Pengaturan::all();
        $dataprofil = json_decode($profil[0]->profil, true);
        $warga = Warga::where('id',$surat->warga_id)->with('pekerjaan')->first();
        $nomor = $surat->nomor_surat;
        if($perihal == "Surat Keterangan Kurang Mampu"){
            $pdf = PDF::loadView('admin.suratkeluar.pdf.kurangmampu',compact('warga','tgl','data','dataprofil','watermark','nomor'));
            return $pdf->stream();
        }
        else if($perihal == "Surat Keterangan Usaha"){
            $pdf = PDF::loadView('admin.suratkeluar.pdf.usaha',compact('warga','tgl','data','dataprofil','watermark','nomor'));
            return $pdf->stream();
        }
        else if($perihal == "Surat Keterangan Tanah"){
            $pdf = PDF::loadView('admin.suratkeluar.pdf.tanah',compact('warga','tgl','data','dataprofil','watermark','nomor'));
            return $pdf->stream();
        }
        else if($perihal == "Surat Keterangan Ahli Waris"){
            $pdf = PDF::loadView('admin.suratkeluar.pdf.ahliwaris',compact('warga','tgl','data','dataprofil','watermark','nomor'));
            return $pdf->stream();
        }
        else if($perihal == "Surat Keterangan Kematian"){
            $pdf = PDF::loadView('admin.suratkeluar.pdf.kematian',compact('warga','tgl','data','dataprofil','watermark','nomor'));
            return $pdf->stream();
        }
        else if($perihal == "Surat Keterangan Kuasa"){
            $pdf = PDF::loadView('admin.suratkeluar.pdf.kuasa',compact('warga','tgl','data','dataprofil','watermark','nomor'));
            return $pdf->stream();
        }
        else if($perihal == "Surat Keterangan Jual Beli"){
            $pdf = PDF::loadView('admin.suratkeluar.pdf.jualbeli',compact('warga','tgl','data','dataprofil','watermark','nomor'));
            return $pdf->stream();
        }

        else if($perihal == "Surat Pernyataan Hiburan"){
            $pdf = PDF::loadView('admin.suratkeluar.pdf.hiburan',compact('warga','tgl','data','dataprofil','watermark','nomor'));
            return $pdf->stream();
        }

        else if($perihal == "Surat Keterangan Mengurus Orang Tua"){
            $pdf = PDF::loadView('admin.suratkeluar.pdf.orangtua',compact('warga','tgl','dataprofil','watermark','nomor'));
            return $pdf->stream();
        }

        else if($perihal == "Surat Keterangan Kehilangan"){
            $pdf = PDF::loadView('admin.suratkeluar.pdf.kehilangan',compact('warga','tgl','data','dataprofil','watermark','nomor'));
            return $pdf->stream();
        }

        else if($perihal == "Surat Keterangan Pindah"){
            $pdf = PDF::loadView('admin.suratkeluar.pdf.pindah',compact('warga','tgl','data','dataprofil','watermark','nomor'));
            return $pdf->stream();
        }

        else if($perihal == "Surat Keterangan Jalan"){
            $pdf = PDF::loadView('admin.suratkeluar.pdf.jalan',compact('warga','tgl','data','dataprofil','watermark','nomor'));
            return $pdf->stream();
        }

        else if($perihal == "Surat Rekomendasi Nikah"){
            $pdf = PDF::loadView('admin.suratkeluar.pdf.nikah',compact('warga','tgl','data','dataprofil','watermark','nomor'));
            return $pdf->stream();
        }
        else if($perihal == "Surat Permohonan SKCK"){
            $pdf = PDF::loadView('admin.suratkeluar.pdf.skck',compact('warga','tgl','data','dataprofil','watermark','nomor'));
            return $pdf->stream();
        }

        else if($perihal == "Surat Pengantar Perkawinan"){
            $pdf = PDF::loadView('admin.suratkeluar.pdf.perkawinan',compact('warga','tgl','data','dataprofil','watermark','nomor'));
            return $pdf->stream();
        }

        else if($perihal == "Surat Keterangan Kematian SuamiIstri"){
            $pdf = PDF::loadView('admin.suratkeluar.pdf.kemsuamiistri',compact('warga','tgl','data','dataprofil','watermark','nomor'));
            return $pdf->stream();
        }
    }

    public function verifikasi(Request $request,$id){
        $surat = SuratKeluar::find($id);
        if($request->kode == 1){
            $surat->update([
                'status' => "Ditolak",
                'keterangan' => $request->keterangan
            ]);
        }else{
            $kodesurat = KodeSurat::where('nama',$surat->perihal)->first();
            $kode = $kodesurat->kode;
            $bulan = month(Carbon::now()->month);
            $tahun = Carbon::now()->year;
            $check = SuratKeluar::where('urutan','!=',null)->whereMonth('tanggal',Carbon::now()->month)->orderBy('urutan','desc');
            
            if(count($check->get()) == 0){
                $urutan = 1;
                $nomorsurat = $kode." / "."001"." / "."K.9"." / ".$bulan." / ".$tahun;
            }
            else{
                $sk = $check->first();
                $urutan = $sk->urutan+1;
                $u = str_pad(($sk->urutan+1), 3, '0', STR_PAD_LEFT);
                $nomorsurat = $kode." / ".$u." / "."K.9"." / ".$bulan." / ".$tahun;
            }
            
            $surat->update([
                'nomor_surat' => $nomorsurat,
                'tanggal' => Carbon::now(),
                'urutan' => $urutan,
                'status' => "Telah Diterima",
                'keterangan' => $request->keterangan,
            ]);
        }
        return 1;
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
        if($request->id == null){
            if($request->surat != "Lainnya"){
                $kodesurat = KodeSurat::where('nama',$request->surat)->first();
                $kode = $kodesurat->kode;
                $bulan = month(Carbon::now()->month);
                $tahun = Carbon::now()->year;
                $check = SuratKeluar::where('urutan','!=',null)->whereMonth('tanggal',Carbon::now()->month)->orderBy('urutan','desc');
                
                if(count($check->get()) == 0){
                    $urutan = 1;
                    $nomorsurat = $kode." / "."001"." / "."K.9"." / ".$bulan." / ".$tahun;
                }
                else{
                    $sk = $check->first();
                    $urutan = $sk->urutan+1;
                    $u = str_pad(($sk->urutan+1), 3, '0', STR_PAD_LEFT);
                    $nomorsurat = $kode." / ".$u." / "."K.9"." / ".$bulan." / ".$tahun;
                }
                
                SuratKeluar::create([
                    'pemohon' => $request->pemohon,
                    'perihal' => $request->surat,
                    'tanggal' => Carbon::now(),
                    'nomor_surat' => $nomorsurat,
                    'urutan' => $urutan,
                    'status' => "Telah Diterima",
                    'keterangan' => $request->keterangan,
                ]);
            }
            
            else{
                
                $kode = $request->kode_surat;
                $bulan = month(Carbon::now()->month);
                $tahun = Carbon::now()->year;
                $check = SuratKeluar::where('urutan','!=',null)->whereMonth('tanggal',Carbon::now()->month)->orderBy('urutan','desc');
                
                if(count($check->get()) == 0){
                    $urutan = 1;
                    $nomorsurat = $kode." / "."001"." / "."K.9"." / ".$bulan." / ".$tahun;
                }
                else{
                    $sk = $check->first();
                    $urutan = $sk->urutan+1;
                    $u = str_pad(($sk->urutan+1), 3, '0', STR_PAD_LEFT);
                    $nomorsurat = $kode." / ".$u." / "."K.9"." / ".$bulan." / ".$tahun;
                }
                
                SuratKeluar::create([
                    'pemohon' => $request->pemohon,
                    'perihal' => $request->nama_surat,
                    'tanggal' => Carbon::now(),
                    'nomor_surat' => $nomorsurat,
                    'urutan' => $urutan,
                    'status' => "Telah Diterima",
                    'keterangan' => $request->keterangan,
                ]);
            }
        }

        else{
            SuratKeluar::find($request->id)->update([
                'pemohon' => $request->pemohon,
                'keterangan' => $request->keterangan,
            ]);
        }
        

        return redirect()->back()->with('success', 'Success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = SuratKeluar::find($id);
        return view('admin.suratkeluar.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $data = SuratKeluar::find($id);

       return $data;
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
