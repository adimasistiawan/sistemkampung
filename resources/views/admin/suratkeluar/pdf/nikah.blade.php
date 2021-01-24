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
      src: url('{{asset("Calibri Regular.ttf")}}')  format('truetype')
    }
    @font-face {
      font-family: 'CustomFontBold';
      src: url('{{asset("Calibri Bold.ttf")}}')  format('truetype')
    }

    *{
      font-size:16px;
      font-family: 'CustomFont';
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

        body {
            font-family: 'CustomFont';
        }
    </style>
</head>
<body>
  @if ($watermark)
  <div style="background-size: cover; background-repeat: no-repeat; background-image: url({{asset('belum_diterima.png')}});">
@else
  <div>
@endif
      <div style="text-align: center; ">
        
        <table>
            <tr>
              <td width="150px" align="center">
                <img src="{{asset('logo.png')}}" alt="" width="80px" height="100px">
              </td>
              <td width="300px" align="center" style="font-size: 24px">
                <span style="font-family: 'CustomFontBold'; font-size: 18px">PEMERINTAH KABUPATEN LAMPUNG TENGAH</span><br>
                <span style="font-size: 18px">KECAMATAN TRIMURJO</span><br>
                <span style="font-size: 18px">KAMPUNG NOTOHARJO</span><br>
                <table>
                  <tr>
                    <td align="right"> <i> Alamat: Jl. Irisigasi Punggur Utara</i></td>
                    <td width="150px" align="right"> <i>Kode Pos: 34172</i> </td>
                  </tr>
                </table>
              </td>
            </tr>
          </table>
          
          <hr style="border: 2px solid #000;">
        <table width="100%" >
            <tr>
              <td width="250px" style="text-align: center;">
                <table>
                    <tr>
                        <td>Nomor</td>
                        <td>:</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Lamp</td>
                        <td>:</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td>Perihal</td>
                        <td>:</td>
                        <td><b>Permohonan Rekomendasi
                            Nikah</b></td>
                    </tr>
                </table>
              </td>
              <td width="130px" style="text-align: center;">
              </td>
              <td width="220px">
                Notoharjo, {{date('d M Y',strtotime($tgl))}}
                <br>
                Kepada
                <br>
                Bapak Kepala Kantor Urusan Agama
                <p>Di <b>Simbarwaringin</b></p>
              </td>
            </tr>
          </table> 
        {{-- <span >Nomor : 478 / 506 / K.9 / XII / 2020</span><br> --}}
      </div>
      <div style="padding-left: 40px; padding-right: 30px">
        Dengan hormat,
        <p>Yang bertanda tangan dibawah ini Kepala Kampung Notoharjo Kecamatan Trimurjo Kabupaten Lampung Tengah, memohonkan pada:</p>
        <div style="padding-left: 30px">
            <table>
              @if($warga->jenis_kelamin == "Perempuan")
              <tr>
                <td width="200px">Nama</td>
                <td>:</td>
                <td width="395px">{{$data['nama']}}</td>
              </tr>
              <tr>
                <td width="200px">Bin</td>
                <td>:</td>
                <td width="395px">{{$data['orgtua2']}}</td>
              </tr>
              <tr>
                <td>NIK</td>
                <td>:</td>
                <td>{{$data['nik']}}</td>
              </tr>
              <tr>
                <td>Tempat Tgl. Lahir</td>
                <td>:</td>
                <td>{{$data['tempat_lahir']}}, {{date('d-m-Y',strtotime($data['tanggal_lahir']))}}</td>
              </tr>
              <tr>
                <td>Jenis Kelamin</td>
                <td>:</td>
                <td>Laki-laki</td>
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
              @else
              <tr>
                <td width="200px">Nama</td>
                <td>:</td>
                <td width="395px">{{$warga->nama}}</td>
              </tr>
              <tr>
                <td width="200px">Bin</td>
                <td>:</td>
                <td width="395px">{{$data['orgtua']}}</td>
              </tr>
              <tr>
                <td>NIK</td>
                <td>:</td>
                <td>{{$warga->nik}}</td>
              </tr>
              <tr>
                <td>Tempat Tgl. Lahir</td>
                <td>:</td>
                <td>{{$warga->tempat_lahir}}, {{date('d-m-Y',strtotime($warga->tanggal_lahir))}}</td>
              </tr>
              <tr>
                <td>Jenis Kelamin</td>
                <td>:</td>
                <td>{{$warga->jenis_kelamin}}</td>
              </tr>
              <tr>
                <td>Agama</td>
                <td>:</td>
                <td>{{$warga->agama}}</td>
              </tr>
              <tr>
                <td>Pekerjaan</td>
                <td>:</td>
                <td>{{$warga->pekerjaan->nama}}</td>
              </tr>
              <tr>
                <td>Alamat</td>
                <td>:</td>
                <td>{{$warga->alamat}}</td>
              </tr>
              @endif
              
            </table>
          </div>
          <p>Orang tersebut diatas akan menikah dengan seorang Wanita :</p>
          <div style="padding-left: 30px">
            <table>
                @if($warga->jenis_kelamin != "Perempuan")
                <tr>
                  <td width="200px">Nama</td>
                  <td>:</td>
                  <td width="395px">{{$data['nama']}}</td>
                </tr>
                <tr>
                  <td width="200px">Bin</td>
                  <td>:</td>
                  <td width="395px">{{$data['orgtua2']}}</td>
                </tr>
                <tr>
                  <td>NIK</td>
                  <td>:</td>
                  <td>{{$data['nik']}}</td>
                </tr>
                <tr>
                  <td>Tempat Tgl. Lahir</td>
                  <td>:</td>
                  <td>{{$data['tempat_lahir']}}, {{date('d-m-Y',strtotime($data['tanggal_lahir']))}}</td>
                </tr>
                <tr>
                  <td>Jenis Kelamin</td>
                  <td>:</td>
                  <td>Perempuan</td>
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
                @else
                <tr>
                  <td width="200px">Nama</td>
                  <td>:</td>
                  <td width="395px">{{$warga->nama}}</td>
                </tr>
                <tr>
                  <td width="200px">Bin</td>
                  <td>:</td>
                  <td width="395px">{{$data['orgtua']}}</td>
                </tr>
                <tr>
                  <td>NIK</td>
                  <td>:</td>
                  <td>{{$warga->nik}}</td>
                </tr>
                <tr>
                  <td>Tempat Tgl. Lahir</td>
                  <td>:</td>
                  <td>{{$warga->tempat_lahir}}, {{date('d-m-Y',strtotime($warga->tanggal_lahir))}}</td>
                </tr>
                <tr>
                  <td>Jenis Kelamin</td>
                  <td>:</td>
                  <td>{{$warga->jenis_kelamin}}</td>
                </tr>
                <tr>
                  <td>Agama</td>
                  <td>:</td>
                  <td>{{$warga->agama}}</td>
                </tr>
                <tr>
                  <td>Pekerjaan</td>
                  <td>:</td>
                  <td>{{$warga->pekerjaan->nama}}</td>
                </tr>
                <tr>
                  <td>Alamat</td>
                  <td>:</td>
                  <td>{{$warga->alamat}}</td>
                </tr>
                @endif
            </table>
        </div>
        <p>Demikian permohonan ini atas terkabulnya saya ucapkan banyak terima kasih</p>
      </div>
      <table width="100%" >
        <tr>
          <td width="200px" style="text-align: center;">
            
          </td>
          <td width="200px" style="text-align: center;">
            
          </td>
          <td width="200px" style="text-align: center;">
            <p>Notoharjo, {{date('d M Y',strtotime($tgl))}}</p>
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