@extends('template')
@section('title')
    Data Umur | Kampung Notoharjo
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
                  <li><a href="{{route('data.penduduk')}}">Penduduk</a></li>
                  <li><a href="{{route('data.kepalakeluarga')}}">Kepala Keluarga</a></li>
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
                    <h3> Data Umur</h3>
                </div>
            </div>
            <div class="card-body">
            
                <div class="row">
                    <div class="col-sm-12 grid-margin">
                        @csrf
                        <h2>Grafik</h2>
                        <br>
                            <canvas id="donutChart4" style="min-height: 250px; height: 350px; max-height: 450px; max-width: 100%;"></canvas>
                        
                        <br>
                        <h2>Tabel</h2>
                        <br>
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
  </div>
</div>
  
@endsection

@section('js')
<script src="{{asset('admin_asset/plugins/chart.js/Chart.js')}}"></script>
<script>
  $(document).ready(function(){
    
    urlsnya = '{{route('dashboard.chartdonut')}}';
    _token = $('input[name=_token]').val();

    var umur = [];
    var qty4 = [];
    $.ajax({
      type: 'GET',
      dataType: 'json',
      data: {_token:_token},
      url: urlsnya,
    })
    .done(function(response) {

    $.each(response['umur'],function(k,val){
        umur.push(k);
        qty4.push(val);
      });

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