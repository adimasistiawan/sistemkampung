@extends('template')
@section('title')
    Data Pekerjaan | Kampung Notoharjo
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
                    <h3> Data Pekerjaan</h3>
                </div>
            </div>
            <div class="card-body">
            
                <div class="row">
                    <div class="col-sm-12 grid-margin">
                        @csrf
                        <h2>Grafik</h2>
                        <br>
                        
                            <canvas id="donutChart" style="min-height: 250px; height: 350px; max-height: 450px; max-width: 100%;"></canvas>
                        

                        <br>
                        <h2>Tabel</h2>
                        <br>
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

    var pekerjaan = [];
    var qty = [];
    var warna = [];
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

    })
  })
</script>
@endsection