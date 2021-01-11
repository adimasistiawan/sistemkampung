@extends('template')
@section('title')
    Daftar | Kampung Notoharjo
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
                    <div class="col-md-8">
                        <h1 class="text-center">Form Pendaftaran</h1>
                        <p class="text-center">Daftar untuk mendapatkan layanan</p>
                        <br>
                        @if(count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @if($errors->has('nik'))
                                    <li>
                                       NIK sudah pernah terdaftar sebelumnya
                                    </li>
                                    @endif
                                    @if($errors->has('email'))
                                    <li>
                                       Email sudah pernah terdaftar sebelumnya
                                    </li>
                                    @endif
                                </ul>
                            </div>
                        @endif
                        <form action="{{route('daftar.submit')}}" method="post">
                            @csrf
                            <b>Mohon input data sesuai KTP</b>
                            <br>
                            <br>
                            <div class="form-group">
                                <label  >Nama Lengkap</label>
                                <input type="text" class="form-control" required name="nama">
                            </div>
                            <div class="form-group">
                                <label  >NIK</label>
                                <input type="text" maxlength="16" onkeypress="return validate(event)" class="form-control" required name="nik">
                            </div>
                            <div class="form-group">
                                <label  >No. KK</label>
                                <input type="text" maxlength="16" onkeypress="return validate(event)" class="form-control" required name="no_kk">
                            </div>
                            <div class="form-group">
                                <label  >No. HP</label>
                                <input type="text" class="form-control" onkeypress="return validate(event)" maxlength="13" required name="no_hp">
                            </div>
                            <div class="form-group">
                                <label  >Alamat</label>
                                <input type="text" class="form-control" required name="alamat">
                            </div>
                            <div class="form-group">
                                <label  >Tempat Lahir</label>
                                <input type="text" class="form-control" required name="tempat_lahir">
                            </div>
                            <div class="form-group">
                                <label  >Tanggal Lahir</label>
                                <input type="date" class="form-control" required name="tanggal_lahir">
                            </div>
                            <div class="form-group">
                                <label  >Status Kawin</label>
                                <br>
                                <select name="status_kawin" class="" required>
                                    <option value="Belum Kawin">Belum Kawin</option>
                                    <option value="Kawin">Kawin</option>
                                    
                                </select>
                            </div>
                            <div class="form-group">
                                <label  >Pilih Pekerjaan</label>
                                <br>
                                <select name="pekerjaan" class="" required>
                                    <option value="">--Pilih Pekerjaan--</option>
                                    @foreach ($pekerjaan as $item)
                                    <option value="{{$item->id}}">{{$item->nama}}</option>
                                    @endforeach
                                    
                                </select>
                            </div>
                            <div class="form-group">
                                <label  >Agama</label>
                                <br>
                                <select name="agama" class="" required>
                                    <option value="">--Pilih Agama--</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Kristen">Kristen</option>
                                    <option value="Katolik">Katolik</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Budha">Budha</option>
                                    <option value="Konghucu">Konghucu</option>
                                    
                                </select>
                            </div>
                            <div class="form-group">
                                <label  >Jenis Kelamin</label>
                                <br>
                                <select name="jenis_kelamin" class="" required>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                    
                                </select>
                            </div>
                            <div class="form-group">
                                <label  >Email</label>
                                <input type="email" class="form-control" required name="email">
                            </div>
                            <div class="form-group">
                                <label  >Password</label>
                                <input type="password" class="form-control" required name="password">
                            </div>
                            <button type="submit" style="width:100%" class="btn btn-primary">DAFTAR</button>
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