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

    

    *{
      font-size:16px;
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
        <table width="100%" >
            <tr>
              <td width="200px" style="text-align: center;">
              </td>
              <td width="180px" style="text-align: center;">
              </td>
              <td width="220px">
                <p>Notoharjo, {{date('d M Y',strtotime($tgl))}}</p>
                Kepada
                <p>Yth. Bpk Kepala Kampung Notoharjo</p>
                <p>Di tempat.</p>
              </td>
            </tr>
          </table> 
        {{-- <span >Nomor : 478 / 506 / K.9 / XII / 2020</span><br> --}}
      </div>
      <br>
      <div style="padding-left: 40px; padding-right: 30px">
        <p>Dengan hormat,</p>
        <p>Dengan ini saya memohon untuk diberikan izin keramaian atas nama :</p>
        <div style="padding-left: 30px">
            <table>
              
              <tr>
                <td width="200px">Nama</td>
                <td>:</td>
                <td width="395px">{{$warga->nama}}.</td>
              </tr>
              <tr>
                <td>Umur</td>
                <td>:</td>
                <td>{{\Carbon\Carbon::parse($warga->tanggal_lahir)->age}} tahun</td>
              </tr>
              <tr>
                <td>Pekerjaan</td>
                <td>:</td>
                <td>{{$warga->jenis_kelamin}}</td>
              </tr>
              <tr>
                <td>Agama</td>
                <td>:</td>
                <td>{{$warga->agama}}</td>
              </tr>
              <tr>
                <td>Alamat</td>
                <td>:</td>
                <td>{{$warga->alamat}}</td>
              </tr>
            </table>
          </div>
          <br>
          <p>Adapun Izin Keramaian tersebut untuk kegiatan Acara <b>{{$data['nama_acara']}}</b> pada :</p>
          <div style="padding-left: 30px">
            <table>
              
              <tr>
                <td width="200px">Hari/Tanggal</td>
                <td>:</td>
                <td width="395px">{{$data['hari']}}/{{date('d M Y',strtotime($data['tanggal']))}}.</td>
              </tr>
              <tr>
                <td>Pukul</td>
                <td>:</td>
                <td>{{$data['dari']}} s/d {{$data['sampai']}}</td>
              </tr>
              <tr>
                <td>Tempat</td>
                <td>:</td>
                <td>{{$data['tempat']}}</td>
              </tr>

              <tr>
                <td>Alamat</td>
                <td>:</td>
                <td>{{$data['alamat']}}</td>
              </tr>
              <tr>
                <td>Hiburan</td>
                <td>:</td>
                <td>{{$data['hiburan']}}</td>
              </tr>
            </table>
        </div>
        <p>Demikian permohonan ini atas terkabulnya saya ucapkan banyak terima kasih</p>
      </div>
      <br>
      <br>
      <br>
      <table width="100%" >
        <tr>
          <td width="200px" style="text-align: center;">
            
          </td>
          <td width="200px" style="text-align: center;">
            
          </td>
          <td width="200px" style="text-align: center;">
            <p>PEMOHON</p>
            <br>
            <br>
            <br>
            <u>{{$warga->nama}}</u>
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