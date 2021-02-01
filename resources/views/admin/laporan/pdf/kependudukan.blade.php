
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Penduduk</title>
    <style>

    

        *{
          font-size:14px;
          
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
            font-size:13px;
            }
            .tr{
              border:1px solid #000000;
            }
    
            body {
                
            }
        </style>
</head>
<body>
    <u><h2 style="text-align: center; font-size:15px;">DATA PENDUDUK</h2></u>
    <table>
        <tr>
            <td width="100px"><b>DUSUN</b></td>
            <td width="15px">:</td>
            <td>1 - 6</td>
        </tr>
        <tr>
            <td><b>RT/RW</b></td>
            <td>:</td>
            <td>{{$rt_rw}}</td>
        </tr>
        <tr>
            <td><b>KAMPUNG</b></td>
            <td>:</td>
            <td>NOTOHARJO</td>
        </tr>
    </table>
    <table class="table" style="width: 100%; border:1px solid #000000;">
        <thead>
            <tr class="tr">
                <th width="15px" rowspan="2">NO</th>
                <th class="th" width="150px" style="text-align: center; " rowspan="2">NAMA</th>
                <th class="th" width="100px" style="text-align: center; " rowspan="2">NIK</th>
                <th class="th"  style="text-align: center; " colspan="2">JENIS KELAMIN</th>
                <th class="th" width="80px" style="text-align: center; " rowspan="2">HDK</th>
                <th class="th" width="100px" style="text-align: center; " rowspan="2">TEMPAT TGL LAHIR</th>
                <th class="th" width="100px" style="text-align: center; " rowspan="2">NO KK</th>
                <th class="th" width="50px" style="text-align: center; " rowspan="2">AGAMA</th>
            </tr>
            <tr>
                
                <th class="th" style="text-align: center; " width="50px">L</th>
                <th class="th" style="text-align: center; " width="50px">P</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
            @foreach ($data as $item)
            <tr class="tr" style=border:1px solid #000000;">
                <td class="td">{{$no}}</td>
                <td class="td">{{$item->nama}}</td>
                <td class="td">{{$item->nik}}</td>
                <td class="td" style="text-align: center;">
                    {{$item->jenis_kelamin=="Laki-laki"? "L":""}}
                </td>
                <td class="td" style="text-align: center;">
                    {{$item->jenis_kelamin=="Perempuan"? "P":""}}
                </td>
                <td class="td">{{$item->status_keluarga}}</td>
                <td class="td">{{$item->tempat_lahir}} / {{date('d-m-Y',strtotime($item->tanggal_lahir))}}</td>
                <td class="td">{{$item->no_kk}}</td>
                <td class="td">{{$item->agama}}</td>
                
            </tr>
            @php
                $no++;
            @endphp
            @endforeach

        </tbody>
    </table>
</body>
</html>