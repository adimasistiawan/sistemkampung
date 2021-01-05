@extends('template')
@section('title')
    Akun | Kampung Notoharjo
@endsection
@section('css')
 <style>
     .form-control {
         height: 10px !important;
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
                <h4>Ganti Password</h4>
              </div>
            </div>
            <div class="card-body">
              
              <div class="row">
                <div class="col-sm-6  grid-margin">
                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{session('error')}}
                        </div>
                    @elseif(session('success'))
                        <div class="alert alert-success">
                            {{session('success')}}
                        </div>
                    @endif
                    <form action="{{route('gantipassword.warga.submit')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label  >Password</label>
                            <input type="password" class="form-control" required name="password">
                        </div>
                        <div class="form-group">
                            <label  >Password Baru</label>
                            <input type="password" class="form-control" required name="password_baru">
                        </div>
                        <div class="form-group">
                            <label  >Konfirmasi Password</label>
                            <input type="password" class="form-control" required name="konfirmasi_password">
                        </div>
                        <button type="submit" class="btn btn-primary">UBAH</button>
                    </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
    </div>
  </div>
  
@endsection