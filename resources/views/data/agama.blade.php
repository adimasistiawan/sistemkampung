@extends('template')
@section('title')
    Data Agama | Kampung Notoharjo
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
                    <h3> Data Agama</h3>
                </div>
            </div>
            <div class="card-body">
            
                <div class="row">
                    <div class="col-sm-12 grid-margin">
                        @csrf
                        <h2>Grafik</h2>
                        <br>
                            <canvas id="donutChart3" style="min-height: 250px; height: 350px; max-height: 450px; max-width: 100%;"></canvas>
                        
                        <br>
                        <h2>Tabel</h2>
                        <br>
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

    var agama = ['Islam','Kristen','Katolik','Hindu','Budha','Konghucu'];
    var qty3 = [];
    $.ajax({
      type: 'GET',
      dataType: 'json',
      data: {_token:_token},
      url: urlsnya,
    })
    .done(function(response) {

      $.each(response['agama'],function(k,val){
          qty3.push(val['qty']);
      });
      $.each(agama,function(k,value){
          if(qty3[k] == undefined){
            qty3.push(0);
          }
      });

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

    })
  })
</script>
@endsection