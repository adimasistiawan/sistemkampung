@extends('template')
@section('title')
    Surat | Kampung Notoharjo
@endsection
@section('css')
  <link rel="stylesheet" href="{{asset('time.css')}}">
  <link rel="stylesheet" href="{{asset('admin_asset/plugins/timepicker/bootstrap-timepicker.min.css')}}">
  
 <style>
     .form-control {
         height: 10px !important;
     }
     #slide-wrap {
    margin:0 auto;
    overflow: auto;
}
#inner-wrap {
    float:left;
    margin-right:-30000px;    
    width: auto;
}
div.horizontal-fields .btn{
  padding: 6px;
}
div.horizontal-fields input,
div.horizontal-fields textarea,
div.horizontal-fields label {
    width: auto;
    height: 10px !important;
    border: 1px solid #e6e7e8;
    padding: 0.875rem 1.375rem;
    font-size: 0.875rem;
    font-weight: 400;
    line-height: 1;
    color: #495057;
    background-color: #ffffff;
    background-clip: padding-box;
    border-radius: 2px;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}

/* Horizontal fields is the class which is not re-sizing it's with correctly */
.horizontal-fields {
    display: block;
}

.service-additional-fields {
    display:inline-block;
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
                <li><a href="{{route('gantipassword.warga')}}">Ganti Password</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-lg-9 stretch-card grid-margin">
          <div class="card">
            <div class="card-header">
              <div class="card-title">
                <h4>Buat Surat</h4>
              </div>
            </div>
            <div class="card-body">
              
              <div class="row">
                <div class="col-sm-12  grid-margin">
                    
                    <form class="form" action="{{route('surat.submit')}}" method="POST">
                        @csrf
                        <div class="col-md-8">
                        <div class="form-group">
                            <label  >Pilih Surat</label>
                            <br>
                            <select name="surat" class="surat" required>
                                <option value="">--Pilih Surat--</option>
                                <option value="Surat Keterangan Pindah">Surat Keterangan Pindah</option>
                                <option value="Surat Keterangan Kurang Mampu">Surat Keterangan Kurang Mampu</option>
                                <option value="Surat Keterangan Kematian">Surat Keterangan Kematian</option>
                                <option value="Surat Keterangan Usaha">Surat Keterangan Usaha</option>
                                <option value="Surat Keterangan Ahli Waris">Surat Keterangan Ahli Waris</option>
                                <option value="Surat Keterangan Tanah">Surat Keterangan Tanah</option>
                                <option value="Surat Keterangan Jual Beli">Surat Keterangan Jual Beli</option>
                                <option value="Surat Keterangan Kuasa">Surat Keterangan Kuasa</option>
                                <option value="Surat Pernyataan Hiburan">Surat Pernyataan Hiburan</option>
                                <option value="Surat Rekomendasi Nikah">Surat Rekomendasi Nikah</option>
                                <option value="Surat Permohonan SKCK">Surat Permohonan SKCK</option>
                                <option value="Surat Keterangan Mengurus Orang Tua">Surat Keterangan Mengurus Orang Tua</option>
                                <option value="Surat Keterangan Kehilangan">Surat Keterangan Kehilangan</option>
                                <option value="Surat Keterangan Jalan">Surat Keterangan Jalan</option>
                            </select>
                        </div>
                      </div>
                        
                        <div class="input-tambahan">
                          
                        </div>
                        <br>
                        <br>
                        <br>
                        <button type="submit" class="btn btn-warning text-white" onclick="this.form.target='_blank';return true;" name="submit" value="0">Lihat Surat</button>
                        
                        <p>Mohon cek isi surat terlebih dahulu sebelum diajukan</p>
                    
                </div>
              </div>
            </div>
            <div class="card-footer">
              <button type="submit" name="submit" value="1" onclick="this.form.target='_self';return confirm('Apakah kamu yakin ingin mengajukan surat')" class="btn btn-primary">Ajukan Surat</button>
            </div>
          </form>
          </div>
        </div>
      </div>
      
    </div>
  </div>
  
@endsection

@section('js')
  <script src="{{asset('time.js')}}"></script>
  <script src="{{asset('admin_asset/plugins/timepicker/bootstrap-timepicker.min.js')}}"></script>
  @include('surat.js')
@endsection