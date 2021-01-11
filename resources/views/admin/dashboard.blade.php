@extends('admin.template')
@section('title')
    Dashboard | Kampung Notoharjo
@endsection

@section('css')
    
@endsection

@section('content')
<div class="content-wrapper">
    <section class="content-header">
      <h1>
        Dashboard
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            {{-- <div class="box-header with-border">
              <h3 class="box-title"></h3>
            </div> --}}
            <!-- /.box-header -->
            <div class="box-body">
              <h1>Selamat Datang</h1>
              
            </div>
            @csrf
          </div>

          <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">Grafik Pekerjaan Penduduk</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="chart-responsive">

                    <canvas id="donutChart" style="min-height: 250px; height: 350px; max-height: 450px; max-width: 100%;"></canvas>
                  
                  </div>
                  <!-- ./chart-responsive -->
                </div>
                <!-- /.col -->
                <div class="col-md-6">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Pekerjaan Penduduk</th>
                        <th>N</th>
                        <th>%</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php
                          $no = 1;
                      @endphp
                      @foreach($pekerjaan as $value)
                      <tr>
                        <td>{{$no}}</td>
                        <td>{{$value->pekerjaan}}</td>
                        <td>{{$value->qty}}</td>
                        <td>{{number_format((($value->qty / $jmlpenduduk) * 100),2)}}</td>
                      </tr>
                      @php
                          $no++;
                      @endphp
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            
          </div>

          <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">Grafik Pendidikan Penduduk</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="chart-responsive">

                    <canvas id="donutChart2" style="min-height: 250px; height: 350px; max-height: 450px; max-width: 100%;"></canvas>
                  
                  </div>
                  <!-- ./chart-responsive -->
                </div>
                <!-- /.col -->
                <div class="col-md-6">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Pendidikan Penduduk</th>
                        <th>N</th>
                        <th>%</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php
                          $no = 1;
                      @endphp
                      
                          <tr>
                            <td>{{$no}}</td>
                            <td>TIDAK / BELUM SEKOLAH</td>
                            <td>
                              @php
                                  $jml = 0;
                              @endphp
                              @foreach($pendidikan as $value)
                                @if($value->pendidikan == "TIDAK / BELUM SEKOLAH" )
                                  {{$value->qty}}

                                  @php
                                  $jml = 1;
                                  @endphp
                                @endif
                              @endforeach
                              @if ($jml == 0)
                                  0
                                  
                              @endif
                              @php
                                    $no++;
                              @endphp
                            </td>
                            <td>
                              @php
                                  $jml = 0;
                              @endphp
                              @foreach($pendidikan as $value)
                                @if($value->pendidikan == "TIDAK / BELUM SEKOLAH" )
                                  {{number_format((($value->qty / $jmlpenduduk) * 100),2)}}
                                  @php
                                  $jml = 1;
                                  @endphp
                                @endif
                              @endforeach
                              @if ($jml == 0)
                                  0
                              @endif
                            </td>
                          </tr>

                          <tr>
                            <td>{{$no}}</td>
                            <td>BELUM TAMAT SD/SEDERAJAT</td>
                            <td>
                              @php
                                  $jml = 0;
                              @endphp
                              @foreach($pendidikan as $value)
                                @if($value->pendidikan == "BELUM TAMAT SD/SEDERAJAT" )
                                  {{$value->qty}}

                                  @php
                                  $jml = 1;
                                  @endphp
                                @endif
                              @endforeach
                              @if ($jml == 0)
                                  0
                              @endif
                              @php
                                   $no++;
                              @endphp
                            </td>
                            <td>
                              @php
                                  $jml = 0;
                              @endphp
                              @foreach($pendidikan as $value)
                                @if($value->pendidikan == "BELUM TAMAT SD/SEDERAJAT" )
                                  {{number_format((($value->qty / $jmlpenduduk) * 100),2)}}
                                  @php
                                  $jml = 1;
                                  @endphp
                                @endif
                              @endforeach
                              @if ($jml == 0)
                                  0
                              @endif
                            </td>
                          </tr>

                          <tr>
                            <td>{{$no}}</td>
                            <td>TAMAT SD / SEDERAJAT</td>
                            <td>
                              @php
                                  $jml = 0;
                              @endphp
                              @foreach($pendidikan as $value)
                                @if($value->pendidikan == "TAMAT SD / SEDERAJAT" )
                                  {{$value->qty}}

                                  @php
                                  $jml = 1;
                                  @endphp
                                @endif
                              @endforeach
                              @if ($jml == 0)
                                  0
                              @endif
                              @php
                                   $no++;
                              @endphp
                            </td>
                            <td>
                              @php
                                  $jml = 0;
                              @endphp
                              @foreach($pendidikan as $value)
                                @if($value->pendidikan == "TAMAT SD / SEDERAJAT" )
                                  {{number_format((($value->qty / $jmlpenduduk) * 100),2)}}
                                  @php
                                  $jml = 1;
                                  @endphp
                                @endif
                              @endforeach
                              @if ($jml == 0)
                                  0
                              @endif
                            </td>
                          </tr>

                          <tr>
                            <td>{{$no}}</td>
                            <td>SLTP/SEDERAJAT</td>
                            <td>
                              @php
                                  $jml = 0;
                              @endphp
                              @foreach($pendidikan as $value)
                                @if($value->pendidikan == "SLTP/SEDERAJAT" )
                                  {{$value->qty}}

                                  @php
                                  $jml = 1;
                                  @endphp
                                @endif
                              @endforeach
                              @if ($jml == 0)
                                  0
                              @endif
                              @php
                                   $no++;
                              @endphp
                            </td>
                            <td>
                              @php
                                  $jml = 0;
                              @endphp
                              @foreach($pendidikan as $value)
                                @if($value->pendidikan == "SLTP/SEDERAJAT" )
                                  {{number_format((($value->qty / $jmlpenduduk) * 100),2)}}
                                  @php
                                  $jml = 1;
                                  @endphp
                                @endif
                              @endforeach
                              @if ($jml == 0)
                                  0
                              @endif
                            </td>
                          </tr>

                          <tr>
                            <td>{{$no}}</td>
                            <td>SLTA / SEDERAJAT</td>
                            <td>
                              @php
                                  $jml = 0;
                              @endphp
                              @foreach($pendidikan as $value)
                                @if($value->pendidikan == "SLTA / SEDERAJAT" )
                                  {{$value->qty}}

                                  @php
                                  $jml = 1;
                                  @endphp
                                @endif
                              @endforeach
                              @if ($jml == 0)
                                  0
                              @endif
                              @php
                                   $no++;
                              @endphp
                            </td>
                            <td>
                              @php
                                  $jml = 0;
                              @endphp
                              @foreach($pendidikan as $value)
                                @if($value->pendidikan == "SLTA / SEDERAJAT" )
                                  {{number_format((($value->qty / $jmlpenduduk) * 100),2)}}
                                  @php
                                  $jml = 1;
                                  @endphp
                                @endif
                              @endforeach
                              @if ($jml == 0)
                                  0
                              @endif
                            </td>
                          </tr>

                          <tr>
                            <td>{{$no}}</td>
                            <td>DIPLOMA I / II</td>
                            <td>
                              @php
                                  $jml = 0;
                              @endphp
                              @foreach($pendidikan as $value)
                                @if($value->pendidikan == "DIPLOMA I / II" )
                                  {{$value->qty}}

                                  @php
                                  $jml = 1;
                                  @endphp
                                @endif
                              @endforeach
                              @if ($jml == 0)
                                  0
                              @endif
                              @php
                                   $no++;
                              @endphp
                            </td>
                            <td>
                              @php
                                  $jml = 0;
                              @endphp
                              @foreach($pendidikan as $value)
                                @if($value->pendidikan == "DIPLOMA I / II" )
                                  {{number_format((($value->qty / $jmlpenduduk) * 100),2)}}
                                  @php
                                  $jml = 1;
                                  @endphp
                                @endif
                              @endforeach
                              @if ($jml == 0)
                                  0
                              @endif
                            </td>
                          </tr>

                          <tr>
                            <td>{{$no}}</td>
                            <td>AKADEMI/ DIPLOMA III/S. MUDA</td>
                            <td>
                              @php
                                  $jml = 0;
                              @endphp
                              @foreach($pendidikan as $value)
                                @if($value->pendidikan == "AKADEMI/ DIPLOMA III/S. MUDA" )
                                  {{$value->qty}}

                                  @php
                                  $jml = 1;
                                  @endphp
                                @endif
                              @endforeach
                              @if ($jml == 0)
                                  0
                              @endif
                              @php
                                   $no++;
                              @endphp
                            </td>
                            <td>
                              @php
                                  $jml = 0;
                              @endphp
                              @foreach($pendidikan as $value)
                                @if($value->pendidikan == "AKADEMI/ DIPLOMA III/S. MUDA" )
                                  {{number_format((($value->qty / $jmlpenduduk) * 100),2)}}
                                  @php
                                  $jml = 1;
                                  @endphp
                                @endif
                              @endforeach
                              @if ($jml == 0)
                                  0
                              @endif
                            </td>
                          </tr>

                          <tr>
                            <td>{{$no}}</td>
                            <td>DIPLOMA IV/ STRATA I</td>
                            <td>
                              @php
                                  $jml = 0;
                              @endphp
                              @foreach($pendidikan as $value)
                                @if($value->pendidikan == "DIPLOMA IV/ STRATA I" )
                                  {{$value->qty}}

                                  @php
                                  $jml = 1;
                                  @endphp
                                @endif
                              @endforeach
                              @if ($jml == 0)
                                  0
                              @endif
                              @php
                                   $no++;
                              @endphp
                            </td>
                            <td>
                              @php
                                  $jml = 0;
                              @endphp
                              @foreach($pendidikan as $value)
                                @if($value->pendidikan == "DIPLOMA IV/ STRATA I" )
                                  {{number_format((($value->qty / $jmlpenduduk) * 100),2)}}
                                  @php
                                  $jml = 1;
                                  @endphp
                                @endif
                              @endforeach
                              @if ($jml == 0)
                                  0
                              @endif
                            </td>
                          </tr>

                          <tr>
                            <td>{{$no}}</td>
                            <td>STRATA II</td>
                            <td>
                              @php
                                  $jml = 0;
                              @endphp
                              @foreach($pendidikan as $value)
                                @if($value->pendidikan == "STRATA II" )
                                  {{$value->qty}}

                                  @php
                                  $jml = 1;
                                  @endphp
                                @endif
                              @endforeach
                              @if ($jml == 0)
                                  0
                              @endif
                              @php
                                   $no++;
                              @endphp
                            </td>
                            <td>
                              @php
                                  $jml = 0;
                              @endphp
                              @foreach($pendidikan as $value)
                                @if($value->pendidikan == "STRATA II" )
                                  {{number_format((($value->qty / $jmlpenduduk) * 100),2)}}
                                  @php
                                  $jml = 1;
                                  @endphp
                                @endif
                              @endforeach
                              @if ($jml == 0)
                                  0
                              @endif
                            </td>
                          </tr>

                          <tr>
                            <td>{{$no}}</td>
                            <td>STRATA III</td>
                            <td>
                              @php
                                  $jml = 0;
                              @endphp
                              @foreach($pendidikan as $value)
                                @if($value->pendidikan == "STRATA III" )
                                  {{$value->qty}}

                                  @php
                                  $jml = 1;
                                  @endphp
                                @endif
                              @endforeach
                              @if ($jml == 0)
                                  0
                              @endif
                              @php
                                   $no++;
                              @endphp
                            </td>
                            <td>
                              @php
                                  $jml = 0;
                              @endphp
                              @foreach($pendidikan as $value)
                                @if($value->pendidikan == "STRATA III" )
                                  {{number_format((($value->qty / $jmlpenduduk) * 100),2)}}
                                  @php
                                  $jml = 1;
                                  @endphp
                                @endif
                              @endforeach
                              @if ($jml == 0)
                                  0
                              @endif
                            </td>
                          </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            
          </div>


          <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">Grafik Agama Penduduk</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="chart-responsive">

                    <canvas id="donutChart3" style="min-height: 250px; height: 350px; max-height: 450px; max-width: 100%;"></canvas>
                  
                  </div>
                  <!-- ./chart-responsive -->
                </div>
                <!-- /.col -->
                <div class="col-md-6">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Agama Penduduk</th>
                        <th>N</th>
                        <th>%</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php
                          $no = 1;
                      @endphp
                          <tr>
                            <td>{{$no}}</td>
                            <td>Islam</td>
                            <td>
                              @php
                                  $jml = 0;
                              @endphp
                              @foreach($agama as $value)
                                @if($value->agama == "Islam" )
                                  {{$value->qty}}

                                  @php
                                  $jml = 1;
                                  @endphp
                                @endif
                              @endforeach
                              @if ($jml == 0)
                                  0
                              @endif
                              @php
                                   $no++;
                              @endphp
                            </td>
                            <td>
                              @php
                                  $jml = 0;
                              @endphp
                              @foreach($agama as $value)
                                @if($value->agama == "Islam" )
                                  {{number_format((($value->qty / $jmlpenduduk) * 100),2)}}
                                  @php
                                  $jml = 1;
                                  @endphp
                                @endif
                              @endforeach
                              @if ($jml == 0)
                                  0
                              @endif
                            </td>
                          </tr>

                          <tr>
                            <td>{{$no}}</td>
                            <td>Kristen</td>
                            <td>
                              @php
                                  $jml = 0;
                              @endphp
                              @foreach($agama as $value)
                                @if($value->agama == "Kristen" )
                                  {{$value->qty}}

                                  @php
                                  $jml = 1;
                                  @endphp
                                @endif
                              @endforeach
                              @if ($jml == 0)
                                  0
                              @endif
                              @php
                                   $no++;
                              @endphp
                            </td>
                            <td>
                              @php
                                  $jml = 0;
                              @endphp
                              @foreach($agama as $value)
                                @if($value->agama == "Kristen" )
                                  {{number_format((($value->qty / $jmlpenduduk) * 100),2)}}
                                  @php
                                  $jml = 1;
                                  @endphp
                                @endif
                              @endforeach
                              @if ($jml == 0)
                                  0
                              @endif
                            </td>
                          </tr>

                          <tr>
                            <td>{{$no}}</td>
                            <td>Katolik</td>
                            <td>
                              @php
                                  $jml = 0;
                              @endphp
                              @foreach($agama as $value)
                                @if($value->agama == "Katolik" )
                                  {{$value->qty}}

                                  @php
                                  $jml = 1;
                                  @endphp
                                @endif
                              @endforeach
                              @if ($jml == 0)
                                  0
                              @endif
                              @php
                                   $no++;
                              @endphp
                            </td>
                            <td>
                              @php
                                  $jml = 0;
                              @endphp
                              @foreach($agama as $value)
                                @if($value->agama == "Katolik" )
                                  {{number_format((($value->qty / $jmlpenduduk) * 100),2)}}
                                  @php
                                  $jml = 1;
                                  @endphp
                                @endif
                              @endforeach
                              @if ($jml == 0)
                                  0
                              @endif
                            </td>
                          </tr>

                          <tr>
                            <td>{{$no}}</td>
                            <td>Hindu</td>
                            <td>
                              @php
                                  $jml = 0;
                              @endphp
                              @foreach($agama as $value)
                                @if($value->agama == "Hindu" )
                                  {{$value->qty}}

                                  @php
                                  $jml = 1;
                                  @endphp
                                @endif
                              @endforeach
                              @if ($jml == 0)
                                  0
                              @endif
                              @php
                                   $no++;
                              @endphp
                            </td>
                            <td>
                              @php
                                  $jml = 0;
                              @endphp
                              @foreach($agama as $value)
                                @if($value->agama == "Hindu" )
                                  {{number_format((($value->qty / $jmlpenduduk) * 100),2)}}
                                  @php
                                  $jml = 1;
                                  @endphp
                                @endif
                              @endforeach
                              @if ($jml == 0)
                                  0
                              @endif
                            </td>
                          </tr>

                          <tr>
                            <td>{{$no}}</td>
                            <td>Budha</td>
                            <td>
                              @php
                                  $jml = 0;
                              @endphp
                              @foreach($agama as $value)
                                @if($value->agama == "Budha" )
                                  {{$value->qty}}

                                  @php
                                  $jml = 1;
                                  @endphp
                                @endif
                              @endforeach
                              @if ($jml == 0)
                                  0
                              @endif
                              @php
                                   $no++;
                              @endphp
                            </td>
                            <td>
                              @php
                                  $jml = 0;
                              @endphp
                              @foreach($agama as $value)
                                @if($value->agama == "Budha" )
                                  {{number_format((($value->qty / $jmlpenduduk) * 100),2)}}
                                  @php
                                  $jml = 1;
                                  @endphp
                                @endif
                              @endforeach
                              @if ($jml == 0)
                                  0
                              @endif
                            </td>
                          </tr>

                          <tr>
                            <td>{{$no}}</td>
                            <td>Konghucu</td>
                            <td>
                              @php
                                  $jml = 0;
                              @endphp
                              @foreach($agama as $value)
                                @if($value->agama == "Konghucu" )
                                  {{$value->qty}}

                                  @php
                                  $jml = 1;
                                  @endphp
                                @endif
                              @endforeach
                              @if ($jml == 0)
                                  0
                              @endif
                              @php
                                   $no++;
                              @endphp
                            </td>
                            <td>
                              @php
                                  $jml = 0;
                              @endphp
                              @foreach($agama as $value)
                                @if($value->agama == "Konghucu" )
                                  {{number_format((($value->qty / $jmlpenduduk) * 100),2)}}
                                  @php
                                  $jml = 1;
                                  @endphp
                                @endif
                              @endforeach
                              @if ($jml == 0)
                                  0
                              @endif
                            </td>
                          </tr>

                          
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            
          </div>

          <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">Grafik Umur Penduduk</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="chart-responsive">

                    <canvas id="donutChart4" style="min-height: 250px; height: 350px; max-height: 450px; max-width: 100%;"></canvas>
                  
                  </div>
                  <!-- ./chart-responsive -->
                </div>
                <!-- /.col -->
                <div class="col-md-6">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Umur Penduduk</th>
                        <th>N</th>
                        <th>%</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php
                          $no = 1;
                      @endphp
                      @foreach($umur as $value)
                      <tr>
                        <td>{{$no}}</td>
                        <td>{{key($umur)}}</td>
                        <td>{{$value}}</td>
                        <td>{{number_format((($value / $jmlpenduduk) * 100),2)}}</td>
                      </tr>
                      @php
                          $no++;
                          next($umur);
                      @endphp
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            
          </div>
        </div>
        
      </div>
    </section>
  </div>
@endsection

@section('js')
<script src="{{asset('admin_asset/plugins/chart.js/Chart.js')}}"></script>
<script>
  $(document).ready(function(){
    
    urlsnya = '{{route('dashboard.chartdonut')}}';
    _token = $('input[name=_token]').val();
    var pekerjaan = [];
    var qty = [];
    var warna = [];

    var pendidikan = ['TIDAK / BELUM SEKOLAH','BELUM TAMAT SD/SEDERAJAT','TAMAT SD / SEDERAJAT','SLTP/SEDERAJAT','SLTA / SEDERAJAT','DIPLOMA I / II','AKADEMI/ DIPLOMA III/S. MUDA','DIPLOMA IV/ STRATA I','STRATA II','STRATA III'];
    var qty2 = [];

    var agama = ['Islam','Kristen','Katolik','Hindu','Budha','Konghucu'];
    var qty3 = [];

    var umur = [];
    var qty4 = [];
    $.ajax({
      type: 'GET',
      dataType: 'json',
      data: {_token:_token},
      url: urlsnya,
    })
    .done(function(response) {
      
      $.each(response['pekerjaan'],function(k,value){
          pekerjaan.push(value['pekerjaan']);
          qty.push(value['qty']);
          warna.push(value['warna']);
      });
      $.each(response['pendidikan'],function(k,val){
          qty2.push(val['qty']);
      });
      $.each(pendidikan,function(k,value){
          if(qty2[k] == undefined){
            qty2.push(0);
          }
      });

      $.each(response['agama'],function(k,val){
          qty3.push(val['qty']);
      });
      $.each(agama,function(k,value){
          if(qty3[k] == undefined){
            qty3.push(0);
          }
      });
      $.each(response['umur'],function(k,val){
        umur.push(k);
        qty4.push(val);
      });

      var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
      var donutData        = {
        labels: pekerjaan,
        datasets: [
          {
            data: qty,
            backgroundColor :warna,
          }
        ]
      }
      var donutOptions     = {
        maintainAspectRatio : false,
        responsive : true,
      }
      var donutChart = new Chart(donutChartCanvas, {
        type: 'doughnut',
        data: donutData,
        options: donutOptions
      })
      
      var donutChartCanvas2 = $('#donutChart2').get(0).getContext('2d')
      var donutData2        = {
        labels: pendidikan,
        datasets: [
          {
            data: qty2,
            backgroundColor :['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de','#7b300d','#19552e','#92c87a','#888780'],
          }
        ]
      }
      var donutOptions2     = {
        maintainAspectRatio : false,
        responsive : true,
      }
      var donutChart2 = new Chart(donutChartCanvas2, {
        type: 'doughnut',
        data: donutData2,
        options: donutOptions2
      })
      

      var donutChartCanvas3 = $('#donutChart3').get(0).getContext('2d')
      var donutData3        = {
        labels: agama,
        datasets: [
          {
            data: qty3,
            backgroundColor :['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
          }
        ]
      }
      var donutOptions3     = {
        maintainAspectRatio : false,
        responsive : true,
      }
      var donutChart3 = new Chart(donutChartCanvas3, {
        type: 'doughnut',
        data: donutData3,
        options: donutOptions3
      })


      var donutChartCanvas4 = $('#donutChart4').get(0).getContext('2d')
      var donutData4        = {
        labels: umur,
        datasets: [
          {
            data: qty4,
            backgroundColor :['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de','#7b300d','#19552e','#92c87a','#888780','#90deec','#e12222','#e26969','#9bc583','#8d2424','#5e5599'],
          }
        ]
      }
      var donutOptions4     = {
        maintainAspectRatio : false,
        responsive : true,
      }
      var donutChart4 = new Chart(donutChartCanvas4, {
        type: 'doughnut',
        data: donutData4,
        options: donutOptions4
      })

    })
  })
</script>
@endsection