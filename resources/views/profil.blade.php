@extends('template')
@section('title')
    Akun | Kampung Notoharjo
@endsection
@section('css')
    <style>
      .link{
        
      }
    </style>
@endsection
@section('content')

<div class="content-wrapper">
    <div class="container">
      
      <div class="row" data-aos="fade-up">
        <div class="col-lg-3 stretch-card grid-margin">
          <div class="card">
            <div class="card-body">
              <h2>Menu</h2>
              <ul class="vertical-menu">
                <li><a href="#">Data Akun</a></li>
                <li><a href="#">Surat</a></li>
                <li><a href="{{route('gantipassword.warga')}}">Ganti Password</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-lg-9 stretch-card grid-margin">
          <div class="card">
            <div class="card-header">
              <div class="card-title">
                <h4>Data Akun</h4>
              </div>
            </div>
            <div class="card-body">
              
              <div class="row">
                <div class="col-sm-12  grid-margin">
                  <table>
                    <tr height="40px">
                        <th width="200px">Nama Lengkap</th>
                        <td>:</td>
                        <td>{{Auth::guard('warga')->user()->nama}}</td>
                    </tr>
                      <tr height="40px">
                          <th>NIK</th>
                          <td>:</td>
                          <td>{{Auth::guard('warga')->user()->nik}}</td>
                      </tr>
                      <tr height="40px">
                        <th>No. KK</th>
                        <td>:</td>
                        <td>{{Auth::guard('warga')->user()->no_kk}}</td>
                      </tr>
                      <tr height="40px">
                          <th>No. HP</th>
                          <td>:</td>
                          <td>{{Auth::guard('warga')->user()->no_hp}}</td>
                      </tr>
                      <tr height="40px">
                          <th>Email</th>
                          <td>:</td>
                          <td>{{Auth::guard('warga')->user()->email}}</td>
                      </tr>
                      
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