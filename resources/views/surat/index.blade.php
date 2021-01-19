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
                <h4>Surat</h4>
              </div>
            </div>
            <div class="card-body">
              
              <div class="row">
                <div class="col-sm-8  grid-margin">
                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{session('error')}}
                        </div>
                    @elseif(session('success'))
                        <div class="alert alert-success">
                            {{session('success')}}
                        </div>
                    @endif
                    <form action="{{route('surat.submit')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label  >Pilih Surat</label>
                            <br>
                            <select name="surat" class="surat" required>
                                <option value="">--Pilih Surat--</option>
                                <option value="Surat Keterangan Pengantar">Surat Keterangan Pengantar</option>
                                <option value="Surat Keterangan Pindah">Surat Keterangan Pindah</option>
                                <option value="Surat Keterangan Kurang Mampu">Surat Keterangan Kurang Mampu</option>
                                <option value="Surat Keterangan Kelahiran">Surat Keterangan Kelahiran</option>
                                <option value="Surat Keterangan Kematian">Surat Keterangan Kematian</option>
                                <option value="Surat Keterangan Usaha">Surat Keterangan Usaha</option>
                                <option value="Surat Keterangan Ahli Waris">Surat Keterangan Ahli Waris</option>
                                <option value="Surat Keterangan Tanah">Surat Keterangan Tanah</option>
                                <option value="Surat Keterangan Nikah">Surat Keterangan Nikah</option>
                                <option value="Surat Keterangan Hibah/Wakaf">Surat Keterangan Hibah/Wakaf</option>
                                <option value="Surat Keterangan Jual Beli">Surat Keterangan Jual Beli</option>
                                <option value="Surat Keterangan KK">Surat Keterangan KK</option>
                                <option value="Surat Keterangan SKCK">Surat Keterangan SKCK</option>
                                <option value="Surat Keterangan Kuasa">Surat Keterangan Kuasa</option>
                                <option value="Surat Keterangan Izin Penelitian">Surat Keterangan Izin Penelitian</option>
                                <option value="Surat Pernyataan Hiburan">Surat Pernyataan Hiburan</option>
                                <option value="Surat Keterangan Mengurus Orang Tua">Surat Keterangan Mengurus Orang Tua</option>
                            </select>
                        </div>
                        <div class="input-tambahan">
                          
                        </div>
                        <button type="submit" class="btn btn-warning" name="submit" value="0">Lihat Surat</button>
                        
                        <p>Mohon cek isi surat terlebih dahulu sebelum diajukan</p>
                    
                </div>
              </div>
            </div>
            <div class="card-footer">
              <button type="submit" name="submit" value="1" onclick="return confirm('Apakah kamu yakin ingin mengajukan surat')" class="btn btn-primary">Ajukan Surat</button>
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
    <script>
      $(document).ready(function(){
        $('.surat').click(function(){
          if($(this).val() == "Surat Keterangan Kurang Mampu"){
            $('.input-tambahan').empty();
            $('.input-tambahan').append(`
            <div class="form-group untuk">
                            <label  >Digunakan Untuk</label>
                            <input type="text" class="form-control" required name="untuk">
              </div>
            `)
          }
          else if($(this).val() == "Surat Keterangan Ahli Waris"){
            $('.input-tambahan').empty();
            $('.input-tambahan').append(`
            <div class="form-group">
                          <label for="">Ahli Waris Dari</label>
                          <br>
                          <div class="row">
                            <div class="col-md-2" style="padding-top: 2px">
                              <select name="orang" id="">
                                <option value="Bapak">Bapak</option>
                                <option value="Ibu">Ibu</option>
                              </select>
                            </div>
                            <div class="col-md-6">
                              <input type="text" class="form-control" placeholder="Nama" required name="nama">
  
                            </div>
                          </div>
              </div>
              <div class="form-group untuk">
                              <label  >Digunakan Untuk</label>
                              <input type="text" class="form-control" required name="untuk">
                </div>
            `)
          }
          else if($(this).val() == "Surat Keterangan Usaha"){
            $('.input-tambahan').empty();
            $('.input-tambahan').append(`
            <div class="form-group untuk">
                            <label  >Nama Usaha</label>
                            <input type="text" class="form-control" required name="nama_usaha">
              </div>
              <div class="form-group untuk">
                            <label  >Alamat</label>
                            <input type="text" class="form-control" required name="alamat">
              </div>
            `)
          }
          else if($(this).val() == "Surat Keterangan Kematian"){
            $('.input-tambahan').empty();
            $('.input-tambahan').append(`

            <div class="form-group">
                <label  >Nama Lengkap</label>
                <input type="text" class="form-control" required name="nama">
            </div>
            <div class="form-group">
                            <label  >Meninggal Pada Tanggal</label>
                            <input type="date" class="form-control" required name="tanggal">
              </div>

              <div class="form-group">
                            <label  >Pukul</label>
                            <input type="text" class="form-control timepicker" placeholder="WIB" value="" id="time" required name="pukul">
                            <div class="input-group-addon">
                              <i class="fa fa-clock-o"></i>
                            </div>
              </div>
              <div class="form-group">
                            <label  >Bertempat di</label>
                            <input type="text" class="form-control" required name="bertempat">
              </div>
              <div class="form-group">
                            <label  >Dikarenakan</label>
                            <input type="text" class="form-control" required name="dikarenakan">
              </div>
              <div class="form-group">
                            <label  >Dimakamkan di</label>
                            <input type="text" class="form-control" required name="dimakamkan">
              </div>
            <div class="form-group">
                <label  >NIK</label>
                <input type="text" maxlength="16" onkeypress="return validate(event)" class="form-control" required name="nik">
            </div>
            <div class="form-group">
                <label  >Alamat</label>
                <input type="text" class="form-control" required name="alamat">
            </div>
            <div class="form-group">
                            <label  >Tanggal Lahir</label>
                            <input type="date" class="form-control" required name="tanggal_lahir">
              </div>
            <div class="form-group">
                <label  >Tempat Lahir</label>
                <input type="text" class="form-control" required name="tempat_lahir">
            </div>
            
            
            <div class="form-group">
                <label  >Pilih Pekerjaan</label>
                <br>
                <select name="pekerjaan" class="" required>
                    <option value="">--Pilih Pekerjaan--</option>
                    @foreach ($pekerjaan as $item)
                    <option value="{{$item->nama}}">{{$item->nama}}</option>
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
            
            `)
            $('.timepicker').timepicker({
              showMeridian: false,
              timeFormat: 'HH:mm:ss'
            })
            $('.timepicker').val("")
          }
          else if($(this).val() == "Surat Keterangan Kuasa"){
            $('.input-tambahan').empty();
            $('.input-tambahan').append(`
            <b>Memberikan kuasa kepada :</b>
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
                <label  >Alamat</label>
                <input type="text" class="form-control" required name="alamat">
            </div>
            <div class="form-group">
                            <label  >Tanggal Lahir</label>
                            <input type="date" class="form-control" required name="tanggal_lahir">
              </div>
            <div class="form-group">
                <label  >Tempat Lahir</label>
                <input type="text" class="form-control" required name="tempat_lahir">
            </div>
            
            
            <div class="form-group">
                <label  >Pilih Pekerjaan</label>
                <br>
                <select name="pekerjaan" class="" required>
                    <option value="">--Pilih Pekerjaan--</option>
                    @foreach ($pekerjaan as $item)
                    <option value="{{$item->nama}}">{{$item->nama}}</option>
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
            <div class="form-group untuk">
                              <label  >Digunakan Untuk</label>
                              <input type="text" class="form-control" required name="untuk">
                </div>
            `)
          }
          else if($(this).val() == "Surat Keterangan Tanah"){
            $('.input-tambahan').empty();
            $('.input-tambahan').append(`
            <div class="form-group untuk">
                            <label  >Luas Tanah (m2)</label>
                            <input type="text" class="form-control" required name="luas_tanah">
              </div>
              <div class="form-group untuk">
                            <label  >Alamat</label>
                            <input type="text" class="form-control" required name="alamat">
              </div>
            `)
          }
          else if($(this).val() == "Surat Keterangan Jual Beli"){
            $('.input-tambahan').empty();
            $('.input-tambahan').append(`
            <b>Menjual kepada :</b>
            <br>
            <br>
            <div class="form-group">
                <label  >Nama Lengkap</label>
                <input type="text" class="form-control" required name="nama">
            </div>
            
            <div class="form-group">
                            <label  >Tanggal Lahir</label>
                            <input type="date" class="form-control" required name="tanggal_lahir">
              </div>
            <div class="form-group">
                <label  >Tempat Lahir</label>
                <input type="text" class="form-control" required name="tempat_lahir">
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
                <label  >Alamat</label>
                <input type="text" class="form-control" required name="alamat">
            </div>
            <div class="form-group">
                <label  >Menjual</label>
                <input type="text" class="form-control" required name="menjual">
            </div>
            <div class="form-group">
                <label  >Harga</label>
                <input type="text" class="form-control" required name="harga">
            </div>
            <div class="form-group">
                <label  >Saksi 1</label>
                <input type="text" class="form-control" name="saksi">
            </div>
            <div class="form-group">
                <label  >Saksi 2</label>
                <input type="text" class="form-control" name="saksi2">
            </div>
            <div class="form-group">
                <label  >Saksi 3</label>
                <input type="text" class="form-control" name="saksi3">
            </div>
            `)
          }

          else if($(this).val() == "Surat Pernyataan Hiburan"){
            $('.input-tambahan').empty();
            $('.input-tambahan').append(`
            
            <div class="form-group">
                <label  >Nama Acara</label>
                <input type="text" class="form-control" required name="nama_acara">
            </div>
            <div class="form-group">
                <label  >Hari</label>
                <br>
                <select name="hari" class="" required>
                    <option value="Senin">Senin</option>
                    <option value="Selasa">Selasa</option>
                    <option value="Rabu">Rabu</option>
                    <option value="Kamis">Kamis</option>
                    <option value="Jum'at">Jum'at</option>
                    <option value="Sabtu">Sabtu</option>
                    <option value="Minggu">Minggu</option>
                </select>
            </div>
            <div class="form-group">
                            <label  >Tanggal</label>
                            <input type="date" class="form-control" required name="tanggal">
              </div>
              <div class="form-group">
                            <label  >Pukul (WIB)</label>
                            <div class="row">
                            
                            <div class="col-md-6">
                              <input type="text" class="form-control timepicker" placeholder="Dari" value="" id="time" required name="dari">
                            </div>
                            <div class="col-md-6">
                              <input type="text" class="form-control timepicker" placeholder="Sampai" value="" id="time" required name="sampai">
                            </div>
                            </div>
              </div>
            <div class="form-group">
                <label  >Tempat</label>
                <input type="text" class="form-control" required name="tempat">
            </div>
            
            <div class="form-group">
                <label  >Alamat</label>
                <input type="text" class="form-control" required name="alamat">
            </div>
            <div class="form-group">
                <label  >Hiburan</label>
                <input type="text" class="form-control" required name="hiburan">
            </div>
            
            `)
            $('.timepicker').timepicker({
              showMeridian: false,
              timeFormat: 'HH:mm:ss'
            })
            $('.timepicker').val("")
          }
        })
      })
    </script>
@endsection