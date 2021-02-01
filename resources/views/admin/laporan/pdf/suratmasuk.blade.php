
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Data Penduduk</title>
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
                font-size:16px;
                }
                .tr{
                  border:1px solid #000000;
                }
        
                body {
                    
                }
            </style>
    </head>
    <body>
        <u><h2 style="text-align: center; font-size:16px;">BUKU AGENDA SURAT MASUK</h2></u>
        <br>
        <table class="table" style="width: 100%; border:1px solid #000000;">
            <thead>
                <tr class="tr">
                    <th width="15px">No</th>
                    <th class="th" width="180px" style="text-align: center; ">Nomor dan Tanggal Surat</th>
                    <th class="th" width="160px" style="text-align: center; ">Diterima Tanggal</th>
                    <th class="th" width="150px" style="text-align: center; ">Nama Instansi Pengirim</th>
                    <th class="th" width="150px" style="text-align: center; ">Tujuan/Penerima</th>
                    <th class="th" width="150px" style="text-align: center; ">Perihal</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($data as $item)
                <tr class="tr" style=border:1px solid #000000;">
                    <td class="td"  style="text-align: center;">{{$no}}</td>
                    <td class="td" style="text-align: center;">{{$item->nomor_surat}}</td>
                    <td class="td" style="text-align: center;">{{date('d-m-Y',strtotime($item->tanggal))}}</td>
                    <td class="td">{{$item->pengirim}}</td>
                    <td class="td">{{$item->penerima}}</td>
                    <td class="td">{{$item->perihal}}</td>
                </tr>
                @php
                    $no++;
                @endphp
                @endforeach
    
            </tbody>
        </table>
    </body>
    </html>