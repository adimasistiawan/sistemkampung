@extends('template')
@section('title')
    Data Penduduk | Kampung Notoharjo
@endsection
@section('css')
    
@endsection
@section('content')

<div class="content-wrapper">
    <div class="container">
      <div class="row" data-aos="fade-up">
        <div class="col-lg-3  grid-margin">
            <div class="card">
              <div class="card-body">
                <h2>Sub Menu</h2>
                <ul class="vertical-menu">
                  <li><a href="{{route('data.pekerjaan')}}">Pekerjaan</a></li>
                  <li><a href="{{route('data.pendidikan')}}">Pendidikan</a></li>
                  <li><a href="{{route('data.agama')}}">Agama</a></li>
                  <li><a href="{{route('data.umur')}}">Umur</a></li>
                </ul>
              </div>
            </div>
        </div>
        <div class="col-lg-9 stretch-card grid-margin">
          <div class="card">
            <div class="card-header">
                <div class="card-title">
                    <h3> Data Pendidikan</h3>
                </div>
            </div>
            <div class="card-body">
            
                <div class="row">
                    <div class="col-sm-12 grid-margin">
                        @csrf
                        <h2>Grafik</h2>
                        <br>
                            <canvas id="donutChart2" style="min-height: 250px; height: 350px; max-height: 450px; max-width: 100%;"></canvas>
                        
                        <br>
                        <h2>Tabel</h2>
                        <br>
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
        </div>

        
      </div>
  </div>
</div>
  
@endsection

@section('js')
<script src="{{asset('admin_asset/plugins/chart.js/Chart.js')}}"></script>
<script>
  $(document).ready(function(){
    
    urlsnya = '{{route('dashboard.chartdonut')}}';
    _token = $('input[name=_token]').val();

    var pendidikan = ['TIDAK / BELUM SEKOLAH','BELUM TAMAT SD/SEDERAJAT','TAMAT SD / SEDERAJAT','SLTP/SEDERAJAT','SLTA / SEDERAJAT','DIPLOMA I / II','AKADEMI/ DIPLOMA III/S. MUDA','DIPLOMA IV/ STRATA I','STRATA II','STRATA III'];
    var qty2 = [];
    $.ajax({
      type: 'GET',
      dataType: 'json',
      data: {_token:_token},
      url: urlsnya,
    })
    .done(function(response) {

        $.each(response['pendidikan'],function(k,val){
          qty2.push(val['qty']);
      });
      $.each(pendidikan,function(k,value){
          if(qty2[k] == undefined){
            qty2.push(0);
          }
      });

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

    })
  })
</script>
@endsection