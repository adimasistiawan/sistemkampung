<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Surat</title>
  
  <!-- Select2 -->
  {{-- <script src="{{asset('dashboard/plugins/jquery/jquery.min.js')}}"></script> --}}
    <style>

    @font-face {
      font-family: 'CustomFont';
      src: url('{{asset("Arial.ttf")}}')  format('truetype')
    }
    @font-face {
      font-family: 'CustomFontBold';
      src: url('{{asset("Arial.ttf")}}')  format('truetype')
    }

    *{
      font-size:12px;
    }
    
        .tr-lokasi{
            background-color: #3c8dbc;
            color:white;
            font-size: 15px;
            text-align: center;
        }
        .tr-kategori{
            background-color: #fdcb6e;
            color:black;
            font-size: 15px;
            text-align: center;
        }

        .thead-dark{
            background-color: #b2bec3;
            color: black;
        }
        .table {
        border-collapse: collapse;
        }

        .table, .th, .td {
        border: 1px solid black;
        }
        .tr{
          border:1px solid #000000;
        }
        table td, table td * {
            vertical-align: top;
        }

        
    </style>
</head>
<body>
  @if ($watermark)
  <div style="background-size: cover; background-repeat: no-repeat; background-image: url({{asset('belum_diterima.png')}});">
@else
  <div>
@endif
        <table width="100%" >
            <tr>
                <td width="150px">
                </td>
                <td width="220px" style="font-family: 'CustomFont';">
                    LAMPIRAN I <br>
                    KEPUTUSAN DIREKTUR JENDERAL BIMBINGAN MASYARAKAT ISLAM <br>
                    NOMOR 713 TAHUN 2018 <br>
                    TENTANG <br>
                    PENETAPAN FORMULIR DAN LAPORAN PENCATATAN PERKAWINAN ATAU RUJUK
                </td>
            </tr>
            <tr>
                <td>
                </td>
                <td style="text-align: right">
                    <b>Model N 1</b>
                </td>
            </tr>
           
        </table> 
        <table width="100%" >
            <tr>
              <td width="150px">
                KANTOR DESA/KELURAHAN
              </td>
              <td width="5px">
                :
              </td>
              <td width="220px">
                NOTOHARJO
              </td>
            </tr>
            <tr>
                <td>
                    KECAMATAN
                </td>
                <td>
                    :
                </td>
                <td>
                    TRIMURJO
                </td>
              </tr>
              <tr>
                <td>
                 KABUPATEN/ KOTA
                </td>
                <td>
                    :
                </td>
                <td>
                    LAMPUNG TENGAH
                </td>
              </tr>
          </table>
          <br>
      <div style="text-align: center; ">
          <u><span style=" font-size:14px;">SURAT PENGANTAR PERKAWINAN</span></u><br>
          {{-- <span >Nomor : 474 / 391 / K.9 / X / 2015</span><br> --}}
          @if(!$watermark)
          <span>Nomor : {{$nomor}}</span>
          @endif
      </div>
      <br>
      <div style="padding-right: 30px">
        Yang bertanda tangan dibawah ini menjelaskan dengan sesungguhnya bahwa :
        <div>
            <table>
              <tr>
                <td>1.</td>
                <td width="200px">Nama</td>
                <td>:</td>
                <td width="395px">{{$warga->nama}}</td>
              </tr>
              <tr>
                <td>2.</td>
                <td>Nomor Induk Kependudukan (NIK)</td>
                <td>:</td>
                <td>{{$warga->nik}}</td>
              </tr>
              <tr>
                <td>3.</td>
                <td>Jenis Kelamin</td>
                <td>:</td>
                <td>{{$warga->jenis_kelamin}}</td>
              </tr>
              <tr>
                <td>4.</td>
                <td>Tempat dan tanggal lahir</td>
                <td>:</td>
                <td>{{$warga->tempat_lahir}}, {{date('d-m-Y',strtotime($warga->tanggal_lahir))}}</td>
              </tr>
              <tr>
                <td>5.</td>
                <td>Kewarganegaraan</td>
                <td>:</td>
                <td>Indonesia</td>
              </tr>
              <tr>
                <td>6.</td>
                <td>Agama</td>
                <td>:</td>
                <td>{{$warga->agama}}</td>
              </tr>
              <tr>
                <td>7.</td>
                <td>Pekerjaan</td>
                <td>:</td>
                <td>{{$warga->pekerjaan->nama}}</td>
              </tr>
              <tr>
                <td>8.</td>
                <td>Alamat</td>
                <td>:</td>
                <td>{{$warga->alamat}}</td>
              </tr>
            </table>
            <br>
            <table>
                <tr>
                  <td>9.</td>
                  <td width="190px">Status Perkawinan</td>
                  <td>:</td>
                  <td width="395px"></td>
                </tr>
                <tr>
                  <td></td>
                  <td>a. Laki-laki : Jejaka, Duda, <br>&nbsp; &nbsp;atau beristri ke........</td>
                  <td>:</td>
                  <td>{{$data['laki']}}</td>
                </tr>
                <tr>
                    <td></td>
                    <td>b. Perempuan : Perawan, Janda</td>
                    <td>:</td>
                    <td>{{$data['perempuan']}}</td>
                </tr>
                <tr>
                    <td>10.</td>
                    <td width="200px">Nama Istri/suami terdahulu</td>
                    <td>:</td>
                    <td width="395px"></td>
                </tr>
            </table>
          </div>
          <br>
          <div>
             Adalah benar anak dari perkawinan seorang Pria :
            <table>
              <tr>
                <td width="200px">Nama lengkap dan alias</td>
                <td>:</td>
                <td width="395px">{{$data['nama']}}</td>
              </tr>
              <tr>
                <td>Nomor Induk Kependudukan (NIK)</td>
                <td>:</td>
                <td>{{$data['nik']}}</td>
              </tr>
              <tr>
                <td>Tempat dan tanggal lahir</td>
                <td>:</td>
                <td>{{$data['tempat_lahir']}}, {{date('d-m-Y',strtotime($data['tanggal_lahir']))}}</td>
              </tr>
              <tr>
                <td>Kewarganegaraan</td>
                <td>:</td>
                <td>Indonesia</td>
              </tr>
              <tr>
                <td>Agama</td>
                <td>:</td>
                <td>{{$data['agama']}}</td>
              </tr>
              <tr>
                <td>Pekerjaan</td>
                <td>:</td>
                <td>{{$data['pekerjaan']}}</td>
              </tr>
              <tr>
                <td>Alamat</td>
                <td>:</td>
                <td>{{$data['alamat']}}</td>
              </tr>
            </table>
          </div>
          <br>
          <div>
             dengan seorang wanita :
            <table>
              <tr>
                <td width="200px">Nama lengkap dan alias</td>
                <td>:</td>
                <td width="395px">{{$data['nama2']}}</td>
              </tr>
              <tr>
                <td>Nomor Induk Kependudukan (NIK)</td>
                <td>:</td>
                <td>{{$data['nik2']}}</td>
              </tr>
              <tr>
                <td>Tempat dan tanggal lahir</td>
                <td>:</td>
                <td>{{$data['tempat_lahir2']}}, {{date('d-m-Y',strtotime($data['tanggal_lahir2']))}}</td>
              </tr>
              <tr>
                <td>Kewarganegaraan</td>
                <td>:</td>
                <td>Indonesia</td>
              </tr>
              <tr>
                <td>Agama</td>
                <td>:</td>
                <td>{{$data['agama2']}}</td>
              </tr>
              <tr>
                <td>Pekerjaan</td>
                <td>:</td>
                <td>{{$data['pekerjaan2']}}</td>
              </tr>
              <tr>
                <td>Alamat</td>
                <td>:</td>
                <td>{{$data['alamat2']}}</td>
              </tr>
            </table>
          </div>
        <p>Demikian, surat pengantar ini dibuat dengan mengingat sumpah jabatan dan untuk dipergunakan sebagaimana mestinya.</p>
      </div>
      <table width="100%" >
        <tr>
          <td width="200px" style="text-align: center;">
            
          </td>
          <td width="200px" style="text-align: center;">
            
          </td>
          <td width="200px" >
            <p>Notoharjo, {{date('d - m - Y',strtotime($tgl))}}</p>
            <p>Kepala Kampung Notoharjo</p>
            <br>
            <br>
            <br>
            <u>{{$dataprofil['nama_ketua_kampung']}}</u>
          </td>
        </tr>
      </table>  
  </div>
        
      


{{-- <script src="{{asset('dashboard/dist/js/adminlte.js')}}"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{asset('dashboard/plugins/jquery-mousewheel/jquery.mousewheel.js')}}"></script>
<script src="{{asset('dashboard/plugins/raphael/raphael.min.js')}}"></script>
<script src="{{asset('dashboard/plugins/jquery-mapael/jquery.mapael.min.js')}}"></script>
<script src="{{asset('dashboard/plugins/jquery-mapael/maps/usa_states.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('dashboard/plugins/chart.js/Chart.min.js')}}"></script>

<!-- FLOT CHARTS -->
<script src="{{asset('dashboard/plugins/flot/jquery.flot.js')}}"></script>
<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
<script src="{{asset('dashboard/plugins/flot/plugins/jquery.flot.resize.js')}}"></script>
<!-- FLOT PIE PLUGIN - also used to draw donut charts -->
<script src="{{asset('dashboard/plugins/flot/plugins/jquery.flot.pie.js')}}"></script>
<script type="text/javascript">
$(document).ready(function(){
    

    var donutData = [
      {
        label: 'Series2',
        data : 30,
        color: '#3c8dbc'
      },
      
    ]
    $.plot('#donut-chart', donutData, {
      series: {
        pie: {
          show       : true,
          radius     : 1,
          innerRadius: 0.5,
          label      : {
            show     : true,
            radius   : 2 / 3,
            formatter: labelFormatter,
            threshold: 0.1
          }

        }
      },
      legend: {
        show: false
      }
    })
    /*
     * END DONUT CHART
     */
     function labelFormatter(label, series) {
    return '<div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">'
      + label
      + '<br>'
      + series.percent + '</div>'
  }
});
    
</script> --}}
</body>
</html>