<script>
    $(document).ready(function(){
      $('.surat').click(function(){
        if($(this).val() == "Surat Keterangan Kurang Mampu"){
          $('.input-tambahan').empty();
          $('.input-tambahan').append(`
          <div class="col-md-8">
          <div class="form-group untuk">
                          <label  >Digunakan Untuk</label>
                          <input type="text" class="form-control" required name="untuk">
            </div>
        </div>
          `)
        }
        else if($(this).val() == "Surat Keterangan Ahli Waris"){
          $('.input-tambahan').empty();
          $('.input-tambahan').append(`
          <div class="col-md-8">
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
            </div>
          `)
        }
        else if($(this).val() == "Surat Keterangan Usaha"){
          $('.input-tambahan').empty();
          $('.input-tambahan').append(`
          <div class="col-md-8">
          <div class="form-group untuk">
                          <label  >Nama Usaha</label>
                          <input type="text" class="form-control" required name="nama_usaha">
            </div>
            <div class="form-group untuk">
                          <label  >Alamat</label>
                          <input type="text" class="form-control" required name="alamat">
            </div>
        </div>
          `)
        }
        else if($(this).val() == "Surat Keterangan Kematian"){
          $('.input-tambahan').empty();
          $('.input-tambahan').append(`
          <div class="col-md-8">
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
          <div class="col-md-8">
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
            </div>
          `)
        }
        else if($(this).val() == "Surat Keterangan Tanah"){
          $('.input-tambahan').empty();
          $('.input-tambahan').append(`
          <div class="col-md-8">
          <div class="form-group untuk">
                          <label  >Luas Tanah (m2)</label>
                          <input type="text" class="form-control" required name="luas_tanah">
            </div>
            <div class="form-group untuk">
                          <label  >Alamat</label>
                          <input type="text" class="form-control" required name="alamat">
            </div>
        </div>
          `)
        }
        else if($(this).val() == "Surat Keterangan Jual Beli"){
          $('.input-tambahan').empty();
          $('.input-tambahan').append(`
          <div class="col-md-8">
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
          <div class="form-group saksi">
            <label  >Nama Saksi</label>
            <div class="input-group">
                
                <input type="text" class="form-control" aria-label="" name="saksi[]" required aria-describedby="basic-addon2">
                
            </div>
            
        </div>
          <div class="btn btn-success tambah-saksi">Tambah Saksi</div>
        </div>
          `)
        }

        else if($(this).val() == "Surat Pernyataan Hiburan"){
          $('.input-tambahan').empty();
          $('.input-tambahan').append(`
          <div class="col-md-8">
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
        </div>
          `)
          $('.timepicker').timepicker({
            showMeridian: false,
            timeFormat: 'HH:mm:ss'
          })
          $('.timepicker').val("")
        }

        else if($(this).val() == "Surat Keterangan Kehilangan"){
          $('.input-tambahan').empty();
          $('.input-tambahan').append(`
          <div class="col-md-8">
          <div class="form-group">
                          <label  >Nama Barang</label>
                          <input type="text" class="form-control" required name="nama_barang">
            </div>
            <div class="form-group">
                          <label  >Deskripsi Barang</label>
                          <br>
                          <textarea name="deskripsi_barang" id="" style="height:50px important;" class="" cols="50" rows="10"></textarea>
            </div>
        </div>
          `)
        }

        else if($(this).val() == "Surat Keterangan Pindah"){
          $('.input-tambahan').empty();
          $('.input-tambahan').append(`
          <div class="col-md-8">
          <b>Pindah ke :</b>
          <br>
          <br>
          <div class="form-group">
                          <label  >Alamat Tujuan</label>
                          <input type="text" class="form-control" required name="alamat_tujuan">
            </div>
            <div class="form-group">
              <label  >Desa / Kelurahan</label>
              <input type="text" class="form-control" required name="kelurahan">
          </div>
          <div class="form-group">
              <label  >Kecamatan</label>
              <input type="text" class="form-control" required name="kecamatan">
          </div>
          <div class="form-group">
              <label  >Kabupaten / Kota</label>
              <input type="text" class="form-control" required name="kabupaten">
          </div>
          <div class="form-group">
              <label  >Provinsi</label>
              <input type="text" class="form-control" required name="provinsi">
          </div>
          <div class="form-group">
              <label  >Alasan Pindah</label>
              <input type="text" class="form-control" required name="alasan_pindah">
          </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
            <label for="">Pengikut</label>
            
            <div id="slide-wrap">
              <div id="inner-wrap">
                  <div class="horizontal-fields service-item">
                      
                      &nbsp;
                      &nbsp;
                      &nbsp;
                      &nbsp;
                      <input type="text" class="" name="nama[]" placeholder="Nama" required>
                      <select name="jenis_kelamin[]" class="" required>
                        <option value="">--Jenis Kelamin--</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                      
                      </select>
                      <input type="text" class="" name="umur[]" placeholder="Umur">
                      <select  id="" name="hubungan_keluarga[]" required>
                        <option value="">--Hubungan Keluarga--</option>
                        <option value="Suami">Suami</option>
                        <option value="Isteri">Isteri</option>
                        <option value="Anak">Anak</option>
                        <option value="Mertua">Mertua</option>
                        <option value="Menantu">Menantu</option>
                        <option value="Cucu">Cucu</option>
                        <option value="Orang Tua">Orang Tua</option>
                        <option value="Famili Lain">Famili Lain</option>
                        <option value="Pembantu">Pembantu</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>
                  </div>
                  
              </div>
          </div>
              <br>
              <div class="btn btn-success tambah-pengikut"><i class="fa fa-plus"></i></div>
            </div>
            
          </div>
                          
          `)
        }

        else if($(this).val() == "Surat Keterangan Jalan"){
          $('.input-tambahan').empty();
          $('.input-tambahan').append(`
          <div class="col-md-8">
          <b>Tujuan :</b>
          <br>
          <br>
          <div class="form-group">
                          <label  >Alamat Tujuan</label>
                          <input type="text" class="form-control" required name="alamat_tujuan">
            </div>
            <div class="form-group">
              <label  >Desa / Kelurahan</label>
              <input type="text" class="form-control" required name="kelurahan">
          </div>
          <div class="form-group">
              <label  >Kecamatan</label>
              <input type="text" class="form-control" required name="kecamatan">
          </div>
          <div class="form-group">
              <label  >Kabupaten / Kota</label>
              <input type="text" class="form-control" required name="kabupaten">
          </div>
          <div class="form-group">
              <label  >Provinsi</label>
              <input type="text" class="form-control" required name="provinsi">
          </div>
          <div class="form-group">
              <label  >Keperluan</label>
              <input type="text" class="form-control" required name="keperluan">
          </div>
          <div class="form-group">
              <label  >Berangkat Tanggal</label>
              <input type="date" class="form-control" required name="berangkat_tanggal">
          </div>
        </div>
        
                          
          `)
        }

        else if($(this).val() == "Surat Rekomendasi Nikah"){
          $('.input-tambahan').empty();
          $('.input-tambahan').append(`
          <div class="col-md-8">
          <div class="form-group">
              <label  >Nama Lengkap</label>
              <input type="text" class="form-control" value="{{Auth::guard('warga')->user()->nama}}" disabled>
          </div>
          @if(Auth::guard('warga')->user()->jenis_kelamin == "Perempuan")
          <div class="form-group">
              <label  >Binti</label>
              <input type="text" class="form-control" required name="orgtua">
          </div>
          @else
          <div class="form-group">
              <label  >Bin</label>
              <input type="text" class="form-control" required name="orgtua">
          </div>
          @endif
          <b>Menikah dengan :</b>
          <br>
          <br>
          <div class="form-group">
              <label  >Nama Lengkap</label>
              <input type="text" class="form-control" required name="nama">
          </div>
          @if(Auth::guard('warga')->user()->jenis_kelamin != "Perempuan")
          <div class="form-group">
              <label  >Binti</label>
              <input type="text" class="form-control" required name="orgtua2">
          </div>
          @else
          <div class="form-group">
              <label  >Bin</label>
              <input type="text" class="form-control" required name="orgtua2">
          </div>
          @endif
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
            </div>
          `)
        }

        else if($(this).val() == "Surat Permohonan SKCK"){
          $('.input-tambahan').empty();
          $('.input-tambahan').append(`
          <div class="col-md-8">
          <div class="form-group untuk">
                          <label  >Digunakan Untuk</label>
                          <input type="text" class="form-control" required name="untuk">
            </div>
        </div>
          `)
        }

        else if($(this).val() == "Surat Pengantar Perkawinan"){
          $('.input-tambahan').empty();
          $('.input-tambahan').append(`
          <div class="col-md-8">
          <b>Data Ayah :</b>
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
          <br>
          <hr>
          <b>Data Ibu :</b>
          <br>
          <br>
          <div class="form-group">
              <label  >Nama Lengkap</label>
              <input type="text" class="form-control" required name="nama2">
          </div>
          <div class="form-group">
              <label  >NIK</label>
              <input type="text" maxlength="16" onkeypress="return validate(event)" class="form-control" required name="nik2">
          </div>
          <div class="form-group">
              <label  >Alamat</label>
              <input type="text" class="form-control" required name="alamat2">
          </div>
          <div class="form-group">
                          <label  >Tanggal Lahir</label>
                          <input type="date" class="form-control" required name="tanggal_lahir2">
            </div>
          <div class="form-group">
              <label  >Tempat Lahir</label>
              <input type="text" class="form-control" required name="tempat_lahir2">
          </div>
          
          
          <div class="form-group">
              <label  >Pilih Pekerjaan</label>
              <br>
              <select name="pekerjaan2" class="" required>
                  <option value="">--Pilih Pekerjaan--</option>
                  @foreach ($pekerjaan as $item)
                  <option value="{{$item->nama}}">{{$item->nama}}</option>
                  @endforeach
                  
              </select>
          </div>
          <div class="form-group">
              <label  >Agama</label>
              <br>
              <select name="agama2" class="" required>
                  <option value="">--Pilih Agama--</option>
                  <option value="Islam">Islam</option>
                  <option value="Kristen">Kristen</option>
                  <option value="Katolik">Katolik</option>
                  <option value="Hindu">Hindu</option>
                  <option value="Budha">Budha</option>
                  <option value="Konghucu">Konghucu</option>
                  
              </select>
          </div>
          <br>
          <hr>
          <b>Status Perkawinan :</b>
          <br>
          <br>
          <div class="form-group">
              <label  >Laki-laki</label>
              <br>
              <select name="laki" class="" required>
                  <option value="Jejaka">Jejaka</option>
                  <option value="Duda">Duda</option>
                  
              </select>
          </div>
          <div class="form-group">
              <label  >Perempuan</label>
              <br>
              <select name="perempuan" class="" required>
                  <option value="Perawan">Perawan</option>
                  <option value="Janda">Janda</option>
                  
              </select>
          </div>
            </div>
          `)
        }
      })

      $(document).on('click','.tambah-saksi',function(){
          $('.saksi').append(`
          <div class="wrap">
          <br>
            <div class="input-group">
                
                <input type="text" class="form-control" aria-label="" name="saksi[]" required aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-danger hapus-saksi" style="height:30px;" type="button">X</button>
                </div>
            </div>
        </div>
          `)
      })

      $(document).on('click','.hapus-saksi',function(){
          var wrap = $(this).closest('.wrap')
          $(wrap).remove()
      })

      $(document).on('click','.tambah-pengikut',function(){
          $('#inner-wrap').append(`
          <div class="horizontal-fields service-item">
                      <div class="btn btn-danger hapus"><i class="fa fa-trash"></i></div>
                      <input type="text" class="" name="nama[]" placeholder="Nama" required>
                      <select name="jenis_kelamin[]" class="" required>
                        <option value="">--Jenis Kelamin--</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                      
                      </select>
                      <input type="text" class="" name="umur[]" placeholder="Umur">
                      <select  id="" name="hubungan_keluarga[]" required>
                        <option value="">--Hubungan Keluarga--</option>
                        <option value="Suami">Suami</option>
                        <option value="Isteri">Isteri</option>
                        <option value="Anak">Anak</option>
                        <option value="Mertua">Mertua</option>
                        <option value="Menantu">Menantu</option>
                        <option value="Cucu">Cucu</option>
                        <option value="Orang Tua">Orang Tua</option>
                        <option value="Famili Lain">Famili Lain</option>
                        <option value="Pembantu">Pembantu</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>
                  </div>
          `)
      })

      $(document).on('click','.hapus',function(){
          var wrap = $(this).closest('.service-item')
          $(wrap).remove()
      })

      // $('.lihat-surat').click(function(){
        
      //   var dataform = $('.form').serialize();
      //   console.log("dsfsf")
      //   var urls = '{{route('surat.submit')}}';
      //   $.ajax({
      //       type: 'GET',
      //       dataType: 'json',
      //       data: dataform,
      //       url: urls,
      //   })
      //   .done(function(response) {

      //   })
      //   .fail(function(){
      //       $.alert("error");
      //       return;
      //   })
      //   .always(function() {
            
      //       console.log("complete");
      //   });
      // })
    })
  </script>