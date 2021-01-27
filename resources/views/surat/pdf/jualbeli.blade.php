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
  <div style="background-size: cover; background-repeat: no-repeat; background-image: url({{asset('belum.png')}});">
@else
  <div>
@endif
      <div style="text-align: center; ">
        

        <u><span style=" font-size:19px;">SURAT KETERANGAN JUAL BELI</span></u><br>
        {{-- <span >Nomor : 478 / 506 / K.9 / XII / 2020</span><br> --}}
      </div>
      <br>
      <div style="padding-right: 30px">
        <p>Yang bertanda tangan di bawah ini:</p>
        <div style="padding-left: 30px">
            <table>
              
              <tr>
                <td width="200px">Nama</td>
                <td>:</td>
                <td width="395px">{{Auth::guard('warga')->user()->nama}}.</td>
              </tr>
              <tr>
                <td>Tempat Tgl. Lahir</td>
                <td>:</td>
                <td>{{Auth::guard('warga')->user()->tempat_lahir}}, {{date('d-m-Y',strtotime(Auth::guard('warga')->user()->tanggal_lahir))}}</td>
              </tr>
              <tr>
                <td>Jenis Kelamin</td>
                <td>:</td>
                <td>{{Auth::guard('warga')->user()->jenis_kelamin}}</td>
              </tr>
              <tr>
                <td>Alamat</td>
                <td>:</td>
                <td>{{Auth::guard('warga')->user()->alamat}}</td>
              </tr>
              <tr>
                <td></td>
                <td></td>
                <td>Disebut pihak pertama (ke I)</td>
              </tr>
            </table>
          </div>
          <br>
        <br>
          <div style="padding-left: 30px">
            <table>
              
              <tr>
                <td width="200px">Nama</td>
                <td>:</td>
                <td width="395px">{{$data->nama}}.</td>
              </tr>
              <tr>
                <td>Tempat Tgl. Lahir</td>
                <td>:</td>
                <td>{{$data->tempat_lahir}}, {{date('d-m-Y',strtotime($data->tanggal_lahir))}}</td>
              </tr>
              <tr>
                <td>Jenis Kelamin</td>
                <td>:</td>
                <td>{{$data->jenis_kelamin}}</td>
              </tr>

              <tr>
                <td>Alamat</td>
                <td>:</td>
                <td>{{$data->alamat}}</td>
              </tr>
              <tr>
                <td></td>
                <td></td>
                <td>Disebut pihak pertama (ke II)</td>
              </tr>
            </table>
        </div>
        <p>Benar bahwa pihak ke I telah menjual kepada pihak ke II <b>{{$data->menjual}}</b> dengan harga <b>Rp. {{rupiah($data->harga)}}</b></p>
        <p>Demikian  surat keterangan jual beli ini dibuat dengan sebenarnya tanpa ada paksaan dari pihak manapun, dan apabila dikemudian hari terdapat permasalahan kami siap menyelesaikan secara kekeluargaan atau hukum yang berlaku. </p>
        <p>SAKSI :</p>
        <ol>
            @foreach ($data->saksi as $item)
            <li>{{$item == null? " ":$item}}</li>
            @endforeach
        </ol>
      </div>
      <table width="100%" >
        <tr>
          <td width="200px" style="text-align: center;">
            <br>
            <br>
            <p>PIHAK 1</p>
            <br>
            <br>
            <br>
            <u>{{Auth::guard('warga')->user()->nama}}</u>
          </td>
          <td width="200px" style="text-align: center;">
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <p>Mengetahui,</p>
            <p>Kepala Kampung Notoharjo</p>
            <br>
            <br>
            <br>
            <u>{{$dataprofil['nama_ketua_kampung']}}</u>
          </td>
          <td width="200px" style="text-align: center;">
            <p>Notoharjo, {{date('d M Y',strtotime($tgl))}}</p>
            <p>PIHAK 2</p>
            <br>
            <br>
            <br>
            <u>{{$data->nama}}</u>
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