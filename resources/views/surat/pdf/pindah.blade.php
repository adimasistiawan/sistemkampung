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

        body {
            font-family: 'CustomFont';
        }
    </style>
</head>
<body>
  @if ($watermark)
  <div style="background-size: cover; background-repeat: no-repeat; background-image: url({{asset('belum.png')}});">
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
        
        <hr style="border: 2px solid #000;"><br>

        <u><span style=" font-size:19px; font-family: 'CustomFontBold';">SURAT KETERANGAN PINDAH</span></u><br>
        <span >Nomor : 474 / 500 / K.9 / XI / 2020</span><br>
      </div>
      <br>
      <div style="padding-right: 30px">
        <p>Yang bertanda tangan di bawah ini Kepala Kampung Notoharjo Kecamatan Trimurjo Kabupaten Lampung Tengah menerangkan dengan sesungguhnya bahwa:</p>
      
        <div style="padding-left: 30px">
          <table>
            
            <tr>
              <td width="200px">Nama</td>
              <td>:</td>
              <td width="395px">{{Auth::guard('warga')->user()->nama}}.</td>
            </tr>
            <tr>
                <td width="200px">Jenis Kelamin</td>
                <td>:</td>
                <td width="395px">{{Auth::guard('warga')->user()->jenis_kelamin}}.</td>
            </tr>
            <tr>
              <td>Tempat Tgl. Lahir</td>
              <td>:</td>
              <td>{{Auth::guard('warga')->user()->tempat_lahir}}, {{date('d-m-Y',strtotime(Auth::guard('warga')->user()->tanggal_lahir))}}</td>
            </tr>
            <tr>
              <td>Bangsa/Agama</td>
              <td>:</td>
              <td>Indonesia/{{Auth::guard('warga')->user()->agama}}</td>
            </tr>
            
            <tr>
              <td>Pekerjaan</td>
              <td>:</td>
              <td>{{Auth::guard('warga')->user()->pekerjaan->nama}}</td>
            </tr>
            <tr>
              <td>Alamat Asal</td>
              <td>:</td>
              <td>{{Auth::guard('warga')->user()->alamat}}</td>
            </tr>
            
          </table>
        </div>
        <br>
        Pindah ke :
        <div style="padding-left: 30px">
            <table>
              
              <tr>
                <td width="200px">Alamat Tujuan</td>
                <td>:</td>
                <td width="395px">{{$data->alamat_tujuan}}</td>
              </tr>
              <tr>
                  <td width="200px">Desa / Kelurahan</td>
                  <td>:</td>
                  <td width="395px">{{$data->kelurahan}}</td>
              </tr>
              <tr>
                <td width="200px">Kecamatan</td>
                <td>:</td>
                <td width="395px">{{$data->kecamatan}}</td>
            </tr>
            <tr>
                <td width="200px">Kabupaten / Kota</td>
                <td>:</td>
                <td width="395px">{{$data->kabupaten}}</td>
            </tr>
            <tr>
                <td width="200px">Provinsi</td>
                <td>:</td>
                <td width="395px">{{$data->provinsi}}</td>
            </tr>
            <tr>
                <td width="200px">Alasan Pindah</td>
                <td>:</td>
                <td width="395px">{{$data->alasan_pindah}}</td>
            </tr>
              
            </table>
            
          </div>
          <br>
          Pengikut :
          <table  class="table"style="width: 80%; border:1px solid #000000;">
            <tr class="tr">
              <td class="th" width="50px" style="text-align: center; font-family: 'CustomFontBold';">No</td>
              <td class="th" width="200px" style="text-align: center; font-family: 'CustomFontBold';">Nama</td>
              <td class="th" width="200px" style="text-align: center; font-family: 'CustomFontBold';">Jenis Kelamin</td>
              <td class="th" width="50px" style="text-align: center; font-family: 'CustomFontBold';">Umur</td>
              <td class="th" style="text-align: center; font-family: 'CustomFontBold';" width="200px">Hubungan Keluarga</td>
            </tr>
              <?php $no = 1?>
              
                @for ($i = 0; $i < count($data->nama); $i++)
                  <tr class="tr" style=border:1px solid #000000;">
                      <td class="td" style="text-align: center;">
                          {{$no}}
                      </td>
                      <td class="td">
                          {{$data->nama[$i]}}
                      </td>
                      <td class="td" style="text-align: center;">
                        {{$data->jenis_kelamin[$i]}}
                      </td>
                      <td class="td" style="text-align: center;">
                        {{$data->umur[$i]}}
                      </td>
                      <td class="td" style="text-align: center;">
                        {{$data->hubungan_keluarga[$i]}}
                      </td>
                  </tr>
                  <?php $no++?>
              @endfor
          </table>
        <p>Demikian surat ini kami buat dengan sebenarnya untuk dapat dipergunakan sebagaimana mestinya</p>
      </div>
      
      <table width="100%" >
        <tr>
          <td width="200px">
            &nbsp;
          </td>
          <td width="200px">
            &nbsp;
          </td>
          <td width="300px" style="text-align: center;">
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