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
        <div class="col-lg-3 grid-margin">
          <div class="card">
            <div class="card-body">
              <h2>Menu</h2>
              <ul class="vertical-menu">
                <li><a href="{{route('profil.warga')}}">Data Akun</a></li>
                <li><a href="{{route('surat')}}">Surat</a></li>
                <li><a href="{{route('formulir')}}">Formulir</a></li>
                <li><a href="{{route('gantipassword.warga')}}">Ganti Password</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-lg-9 stretch-card grid-margin">
          <div class="card">
            <div class="card-header">
              <div class="card-title">
                <h4>Ubah Profil</h4>
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
                    <form action="{{route('ubahprofil.warga.submit')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label  >No. HP</label>
                            <input type="text" class="form-control" onkeypress="return validate(event)" maxlength="13" value="{{Auth::guard('warga')->user()->no_hp}}" required name="no_hp">
                        </div>
                        <div class="form-group">
                            <label  >Alamat</label>
                            <input type="text" class="form-control" required name="alamat" value="{{Auth::guard('warga')->user()->alamat}}">
                        </div>
                        <div class="form-group">
                            <label  >Status Kawin</label>
                            <br>
                            <select name="status_kawin" class="" required>
                                <option value="Belum Kawin" @if (Auth::guard('warga')->user()->status_kawin == "Belum Kawin") selected @endif>Belum Kawin</option>
                                <option value="Kawin" @if (Auth::guard('warga')->user()->status_kawin == "Kawin")  selected @endif>Kawin</option>
                                
                            </select>
                        </div>
                        <div class="form-group">
                            <label  >Pekerjaan</label>
                            <br>
                            <select name="pekerjaan_id" class="" required>
                                @foreach ($pekerjaan as $item)
                                <option value="{{$item->id}}" @if (Auth::guard('warga')->user()->pekerjaan_id == $item->id) selected @endif>{{$item->nama}}</option>
                                @endforeach
                                
                            </select>
                        </div>
                        <div class="form-group">
                            <label  >Agama</label>
                            <br>
                            <select name="agama" class="" required>
                                <option value="Islam" @if (Auth::guard('warga')->user()->agama == "Islam") selected @endif>Islam</option>
                                <option value="Kristen" @if (Auth::guard('warga')->user()->agama == "Kristen") selected @endif>Kristen</option>
                                <option value="Katolik" @if (Auth::guard('warga')->user()->agama == "Katolik") selected @endif>Katolik</option>
                                <option value="Hindu" @if (Auth::guard('warga')->user()->agama == "Hindu") selected @endif>Hindu</option>
                                <option value="Budha" @if (Auth::guard('warga')->user()->agama == "Budha") selected @endif>Budha</option>
                                <option value="Konghucu" @if (Auth::guard('warga')->user()->agama == "Konghucu") selected @endif>Konghucu</option>
                                
                            </select>
                        </div>
                        <div class="form-group">
                            <label  >Email</label>
                            <input type="email" class="form-control" value="{{Auth::guard('warga')->user()->email}}" required name="email">
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