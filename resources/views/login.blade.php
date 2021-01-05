@extends('template')
@section('title')
    Masuk | Kampung Notoharjo
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
        <div class="col-sm-12 grid-margin">
          <div class="card">
            <div class="card-body">
                <div class="container d-flex justify-content-center">
                    <div class="col-md-4">
                        <h1 class="text-center">Form Login</h1>
                        <p class="text-center">Masuk untuk mendapatkan akses layanan</p>
                        <br>
                        @if(session('message'))
                            <div class="alert alert-danger">
                                {{session('message')}}
                            </div>
                        @endif
                        <form action="{{route('login.warga.submit')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label  >Email</label>
                                <input type="email" class="form-control" required name="email">
                            </div>
                            <div class="form-group">
                                <label  >Password</label>
                                <input type="password" class="form-control" required name="password">
                            </div>
                            <button type="submit" style="width:100%" class="btn btn-primary">MASUK</button>
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

@section('js')
    <script>
        function validate(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

         return true;
      }
    </script>
@endsection