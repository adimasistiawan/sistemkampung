@extends('admin.template')
@section('title')
    Ubah Data Penduduk | Kampung Notoharjo
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('admin_asset/plugins/parsley-js/parsley.css')}}">
<link rel="stylesheet" href="{{asset('admin_asset/bower_components/select2/dist/css/select2.min.css')}}">
    <style>
        div.dataTables_wrapper {
        margin: 0 auto;
    }
    .select2-container{
        width: 100%!important;
    }
    .select2-search--dropdown .select2-search__field {
        width: 98%;
    }
    .select2-container .select2-selection--single .select2-selection__rendered {
            
            margin-top: -4px;
        }
    </style>
@endsection

@section('content')
<div class="content-wrapper">
    <section class="content-header">
      <h1>
        Ubah Data Penduduk
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-Data Penduduk"></i> Home</a></li>
        <li>Data Penduduk</li>
        <li class="active">Ubah Data Penduduk</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Form Data Penduduk</h3>
            </div>
            <div class="box-body form_content">
                @csrf
                <div class="col-md-4">
                    <div class="form-group">
                      <label  >No Kartu Keluarga</label>
                      <input type="number" class="form-control input" id="no_kk"  placeholder="No Kartu Keluarga" maxlength="16" required value="{{$penduduk->no_kk}}" name="no_kk">
                    </div>
                    <div class="form-group">
                      <label  >Alamat</label>
                      <input type="text" class="form-control input" id="alamat"  placeholder="Alamat" required value="{{$penduduk->alamat}}"  name="alamat">
                    </div>
                    <div class="form-group">
                        <label  >RT</label>
                        <select  id="" class="form-control input" name="rt" required>
                          <option value="001" @if($penduduk->rt == "001") selected @endif>001</option>
                          <option value="002" @if($penduduk->rt == "002") selected @endif>002</option>
                          <option value="003" @if($penduduk->rt == "003") selected @endif>003</option>
                          <option value="004" @if($penduduk->rt == "004") selected @endif>004</option>
                          <option value="005" @if($penduduk->rt == "005") selected @endif>005</option>
                          <option value="006" @if($penduduk->rt == "006") selected @endif>006</option>
                          <option value="007" @if($penduduk->rt == "007") selected @endif>007</option>
                          <option value="008" @if($penduduk->rt == "008") selected @endif>008</option>
                          <option value="009" @if($penduduk->rt == "009") selected @endif>009</option>
                          <option value="010" @if($penduduk->rt == "010") selected @endif>010</option>
                          <option value="011" @if($penduduk->rt == "011") selected @endif>011</option>
                          <option value="012" @if($penduduk->rt == "012") selected @endif>012</option>
                          <option value="013" @if($penduduk->rt == "013") selected @endif>013</option>
                          <option value="014" @if($penduduk->rt == "014") selected @endif>014</option>
                          <option value="015" @if($penduduk->rt == "015") selected @endif>015</option>
                          <option value="016" @if($penduduk->rt == "016") selected @endif>016</option>
                          <option value="017" @if($penduduk->rt == "017") selected @endif>017</option>
                          <option value="018" @if($penduduk->rt == "018") selected @endif>018</option>
                          <option value="020" @if($penduduk->rt == "020") selected @endif>020</option>
                          <option value="021" @if($penduduk->rt == "021") selected @endif>021</option>
                          <option value="022" @if($penduduk->rt == "022") selected @endif>022</option>
                          <option value="023" @if($penduduk->rt == "023") selected @endif>023</option>
                          <option value="024" @if($penduduk->rt == "024") selected @endif>024</option>
                          <option value="025" @if($penduduk->rt == "025") selected @endif>025</option>
                        </select>
                      </div>
                      <div class="form-group">
                          <label  >RW</label>
                          <select  id="" class="form-control input" name="rw" required>
                            <option value="001" @if($penduduk->rw == "001") selected @endif>001</option>
                            <option value="002" @if($penduduk->rw == "002") selected @endif>002</option>
                            <option value="003" @if($penduduk->rw == "003") selected @endif>003</option>
                            <option value="004" @if($penduduk->rw == "004") selected @endif>004</option>
                            <option value="005" @if($penduduk->rw == "005") selected @endif>005</option>
                            <option value="006" @if($penduduk->rw == "006") selected @endif>006</option>
                            <option value="007" @if($penduduk->rw == "007") selected @endif>007</option>
                            <option value="008" @if($penduduk->rw == "008") selected @endif>008</option>
                            <option value="009" @if($penduduk->rw == "009") selected @endif>009</option>
                            <option value="010" @if($penduduk->rw == "010") selected @endif>010</option>
                            <option value="011" @if($penduduk->rw == "011") selected @endif>011</option>
                            <option value="012" @if($penduduk->rw == "012") selected @endif>012</option>
                            <option value="013" @if($penduduk->rw == "013") selected @endif>013</option>
                            <option value="014" @if($penduduk->rw == "014") selected @endif>014</option>
                          </select>
                        </div>
                </div>
                <br>
                <br>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <table id="datatable-input" class="table table-bordered display nowrap dt-responsive" style="width:100%">
                            <thead>
                                <tr>
                                    <th width="50px"></th>
                                    <th>Nama Lengkap</th>
                                    <th>Status Keluarga</th>
                                    <th>NIK</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Tempat Lahir</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Agama</th>
                                    <th>Pendidikan</th>
                                    <th>Pekerjaan</th>
                                    <th>Status Perkawinan</th>
                                    <th>Kewarganegaraan</th>
                                    <th>No Paspor(Opsional)</th>
                                    <th>No KITAP(Opsional)</th>
                                    <th>Ayah</th>
                                    <th>Ibu</th>
                                </tr>
                            </thead>
                            <tbody id="tbody">
                                <?php $no =1?>
                                @foreach($penduduk_detail as $value)
                                    @if($value->status_keluarga == "Kepala Keluarga")
                                    <tr class="tr">
                                        <td>
                                            
                                        </td>
                                        <td>
                                            <input type="text" class="form-control input-table input" placeholder="Nama Lengkap" name="kepala_keluarga" value="{{$value->nama}}" required>
                                            
                                        </td>
                                        <td>
                                            @if($value->status_keluarga == "Kepala Keluarga")
                                            <select  id="" class="form-control input-table "  required disabled>
                                                <option value="">--Pilih Status Keluarga--</option>
                                                <option value="Kepala Keluarga" selected>Kepala Keluarga</option>
                                            </select>
                                            @else
                                            <select  id="" class="form-control input-table" required>
                                                <option value="">--Pilih Status Keluarga--</option>
                                                <option value="Suami" @if ($value->status_keluarga == "Suami")selected @endif>Suami</option>
                                                <option value="Isteri" @if ($value->status_keluarga == "Isteri")selected @endif>Isteri</option>
                                                <option value="Anak" @if ($value->status_keluarga == "Anak")selected @endif>Anak</option>
                                                <option value="Mertua" @if ($value->status_keluarga == "Mertua")selected @endif>Mertua</option>
                                                <option value="Menantu" @if ($value->status_keluarga == "Menantu")selected @endif>Menantu</option>
                                                <option value="Cucu" @if ($value->status_keluarga == "Cucu")selected @endif>Cucu</option>
                                                <option value="Orang Tua" @if ($value->status_keluarga == "Orang Tua")selected @endif>Orang Tua</option>
                                                <option value="Famili Lain" @if ($value->status_keluarga == "Famili Lain")selected @endif>Famili Lain</option>
                                                <option value="Pembantu" @if ($value->status_keluarga == "Pembantu")selected @endif>Pembantu</option>
                                                <option value="Lainnya" @if ($value->status_keluarga == "Lainnya")selected @endif>Lainnya</option>
                                            </select>
                                            @endif
                                        </td>
                                        <td>
                                            <input type="number" class="form-control input-table" placeholder="NIK" maxlength="16" value="{{$value->nik}}" required>
                                        </td>
                                        <td>
                                            <select  id="" class="form-control input-table" required>
                                                <option value="">--Pilih Jenis Kelamin--</option>
                                                <option value="Laki-laki"  @if ($value->jenis_kelamin == "Laki-laki")selected @endif>Laki-laki</option>
                                                <option value="Perempuan" @if ($value->jenis_kelamin == "Perempuan")selected @endif>Perempuan</option>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control input-table" placeholder="Tempat Lahir" value="{{$value->tempat_lahir}}">
                                        </td>
                                        <td>
                                            <input type="date" class="form-control input-table" value="{{$value->tanggal_lahir}}">
                                        </td>
                                        <td>
                                            <select  id="" class="form-control input-table" required>
                                                <option value="">--Pilih Agama--</option>
                                                <option value="Islam" @if ($value->agama == "Islam")selected @endif>Islam</option>
                                                <option value="Kristen" @if ($value->agama == "Kristen")selected @endif>Kristen</option>
                                                <option value="Katolik" @if ($value->agama == "Katolik")selected @endif>Katolik</option>
                                                <option value="Hindu" @if ($value->agama == "Hindu")selected @endif>Hindu</option>
                                                <option value="Budha" @if ($value->agama == "Budha")selected @endif>Budha</option>
                                                <option value="Konghucu" @if ($value->agama == "Konghucu")selected @endif>Konghucu</option>
                                            </select>
                                        </td>
                                        <td>
                                            <select  id="" class="form-control input-table" required>
                                                <option value="">--Pilih Pendidikan--</option>
                                                <option value="TIDAK / BELUM SEKOLAH"  @if ($value->pendidikan == "TIDAK / BELUM SEKOLAH")selected @endif>TIDAK / BELUM SEKOLAH</option>
                                                <option value="BELUM TAMAT SD/SEDERAJAT"  @if ($value->pendidikan == "BELUM TAMAT SD/SEDERAJAT")selected @endif>BELUM TAMAT SD/SEDERAJAT</option>
                                                <option value="TAMAT SD / SEDERAJAT"  @if ($value->pendidikan == "TAMAT SD / SEDERAJAT")selected @endif>TAMAT SD / SEDERAJAT</option>
                                                <option value="SLTP/SEDERAJAT"  @if ($value->pendidikan == "SLTP/SEDERAJAT")selected @endif>SLTP/SEDERAJAT</option>
                                                <option value="SLTA / SEDERAJAT"  @if ($value->pendidikan == "SLTA / SEDERAJAT")selected @endif>SLTA / SEDERAJAT</option>
                                                <option value="DIPLOMA I / II"  @if ($value->pendidikan == "DIPLOMA I / II")selected @endif>DIPLOMA I / II</option>
                                                <option value="AKADEMI/ DIPLOMA III/S. MUDA"  @if ($value->pendidikan == "AKADEMI/ DIPLOMA III/S. MUDA")selected @endif>AKADEMI/ DIPLOMA III/S. MUDA</option>
                                                <option value="DIPLOMA IV/ STRATA I"  @if ($value->pendidikan == "DIPLOMA IV/ STRATA I")selected @endif>DIPLOMA IV/ STRATA I</option>
                                                <option value="STRATA II"  @if ($value->pendidikan == "STRATA II")selected @endif>STRATA II</option>
                                                <option value="STRATA III"  @if ($value->pendidikan == "STRATA III")selected @endif>STRATA III</option>
                                            </select>
                                        </td>
                                        <td>
                                            <select  id="" class="form-control input-table" required>
                                                <option value="">--Pilih Pekerjaan--</option>
                                                @foreach ($pekerjaan as $item)
                                                <option value="{{$item->id}}" @if ($value->pekerjaan_id == $item->id) selected @endif>{{$item->nama}}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <select  id="" class="form-control input-table" required>
                                                <option value="">--Pilih Status Perkawinan--</option>
                                                <option value="Belum Kawin" @if ($value->status_perkawinan == "Belum Kawin")selected @endif>Belum Kawin</option>
                                                <option value="Kawin" @if ($value->status_perkawinan == "Kawin")selected @endif>Kawin</option>
                                            </select>
                                        </td>
                                        <td>
                                            <select  id="" class="form-control input-table" required>
                                                <option value="">--Pilih Status Kewarganegaraan--</option>
                                                <option value="WNI" @if ($value->kewarganegaraan == "WNI")selected @endif>WNI</option>
                                                <option value="WNA" @if ($value->kewarganegaraan == "WNA")selected @endif>WNA</option>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="number" class="form-control input-table" placeholder="No Paspor" value="{{$value->no_paspor}}">
                                        </td>
                                        <td>
                                            <input type="number" class="form-control input-table" placeholder="No KITAP" value="{{$value->no_kitap}}">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control input-table" placeholder="Nama Ayah" value="{{$value->ayah}}">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control input-table" placeholder="Nama Ibu" value="{{$value->ibu}}">
                                        </td>
                                    </tr>
                                    @endif
                                @endforeach

                                @foreach($penduduk_detail as $value)
                                    @if($value->status_keluarga != "Kepala Keluarga")
                                    <tr class="tr">
                                        <td>
                                            <button class="btn btn-danger hapus"><i class="fa fa-trash delete"></i></button>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control input-table" placeholder="Nama Lengkap" value="{{$value->nama}}" required>
                                            
                                        </td>
                                        <td>
                                            @if($value->status_keluarga == "Kepala Keluarga")
                                            <select  id="" class="form-control input-table "  required disabled>
                                                <option value="">--Pilih Status Keluarga--</option>
                                                <option value="Kepala Keluarga" selected>Kepala Keluarga</option>
                                            </select>
                                            @else
                                            <select  id="" class="form-control input-table" required>
                                                <option value="">--Pilih Status Keluarga--</option>
                                                <option value="Suami" @if ($value->status_keluarga == "Suami")selected @endif>Suami</option>
                                                <option value="Isteri" @if ($value->status_keluarga == "Isteri")selected @endif>Isteri</option>
                                                <option value="Anak" @if ($value->status_keluarga == "Anak")selected @endif>Anak</option>
                                                <option value="Mertua" @if ($value->status_keluarga == "Mertua")selected @endif>Mertua</option>
                                                <option value="Menantu" @if ($value->status_keluarga == "Menantu")selected @endif>Menantu</option>
                                                <option value="Cucu" @if ($value->status_keluarga == "Cucu")selected @endif>Cucu</option>
                                                <option value="Orang Tua" @if ($value->status_keluarga == "Orang Tua")selected @endif>Orang Tua</option>
                                                <option value="Famili Lain" @if ($value->status_keluarga == "Famili Lain")selected @endif>Famili Lain</option>
                                                <option value="Pembantu" @if ($value->status_keluarga == "Pembantu")selected @endif>Pembantu</option>
                                                <option value="Lainnya" @if ($value->status_keluarga == "Lainnya")selected @endif>Lainnya</option>
                                            </select>
                                            @endif
                                        </td>
                                        <td>
                                            <input type="number" class="form-control input-table" placeholder="NIK" maxlength="16" value="{{$value->nik}}" required>
                                        </td>
                                        <td>
                                            <select  id="" class="form-control input-table" required>
                                                <option value="">--Pilih Jenis Kelamin--</option>
                                                <option value="Laki-laki"  @if ($value->jenis_kelamin == "Laki-laki")selected @endif>Laki-laki</option>
                                                <option value="Perempuan" @if ($value->jenis_kelamin == "Perempuan")selected @endif>Perempuan</option>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control input-table" placeholder="Tempat Lahir" value="{{$value->tempat_lahir}}">
                                        </td>
                                        <td>
                                            <input type="date" class="form-control input-table" value="{{$value->tanggal_lahir}}">
                                        </td>
                                        <td>
                                            <select  id="" class="form-control input-table" required>
                                                <option value="">--Pilih Agama--</option>
                                                <option value="Islam" @if ($value->agama == "Islam")selected @endif>Islam</option>
                                                <option value="Kristen" @if ($value->agama == "Kristen")selected @endif>Kristen</option>
                                                <option value="Katolik" @if ($value->agama == "Katolik")selected @endif>Katolik</option>
                                                <option value="Hindu" @if ($value->agama == "Hindu")selected @endif>Hindu</option>
                                                <option value="Budha" @if ($value->agama == "Budha")selected @endif>Budha</option>
                                                <option value="Konghucu" @if ($value->agama == "Konghucu")selected @endif>Konghucu</option>
                                            </select>
                                        </td>
                                        <td>
                                            <select  id="" class="form-control input-table" required>
                                                <option value="">--Pilih Pendidikan--</option>
                                                <option value="TIDAK / BELUM SEKOLAH"  @if ($value->pendidikan == "TIDAK / BELUM SEKOLAH")selected @endif>TIDAK / BELUM SEKOLAH</option>
                                                <option value="BELUM TAMAT SD/SEDERAJAT"  @if ($value->pendidikan == "BELUM TAMAT SD/SEDERAJAT")selected @endif>BELUM TAMAT SD/SEDERAJAT</option>
                                                <option value="TAMAT SD / SEDERAJAT"  @if ($value->pendidikan == "TAMAT SD / SEDERAJAT")selected @endif>TAMAT SD / SEDERAJAT</option>
                                                <option value="SLTP/SEDERAJAT"  @if ($value->pendidikan == "SLTP/SEDERAJAT")selected @endif>SLTP/SEDERAJAT</option>
                                                <option value="SLTA / SEDERAJAT"  @if ($value->pendidikan == "SLTA / SEDERAJAT")selected @endif>SLTA / SEDERAJAT</option>
                                                <option value="DIPLOMA I / II"  @if ($value->pendidikan == "DIPLOMA I / II")selected @endif>DIPLOMA I / II</option>
                                                <option value="AKADEMI/ DIPLOMA III/S. MUDA"  @if ($value->pendidikan == "AKADEMI/ DIPLOMA III/S. MUDA")selected @endif>AKADEMI/ DIPLOMA III/S. MUDA</option>
                                                <option value="DIPLOMA IV/ STRATA I"  @if ($value->pendidikan == "DIPLOMA IV/ STRATA I")selected @endif>DIPLOMA IV/ STRATA I</option>
                                                <option value="STRATA II"  @if ($value->pendidikan == "STRATA II")selected @endif>STRATA II</option>
                                                <option value="STRATA III"  @if ($value->pendidikan == "STRATA III")selected @endif>STRATA III</option>
                                            </select>
                                        </td>
                                        <td>
                                            <select  id="" class="form-control input-table" required>
                                                <option value="">--Pilih Pekerjaan--</option>
                                                @foreach ($pekerjaan as $item)
                                                <option value="{{$item->id}}" @if ($value->pekerjaan_id == $item->id)selected @endif>{{$item->nama}}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <select  id="" class="form-control input-table" required>
                                                <option value="">--Pilih Status Perkawinan--</option>
                                                <option value="Belum Kawin" @if ($value->status_perkawinan == "Belum Kawin")selected @endif>Belum Kawin</option>
                                                <option value="Kawin" @if ($value->status_perkawinan == "Kawin")selected @endif>Kawin</option>
                                            </select>
                                        </td>
                                        <td>
                                            <select  id="" class="form-control input-table" required>
                                                <option value="">--Pilih Status Kewarganegaraan--</option>
                                                <option value="WNI" @if ($value->kewarganegaraan == "WNI")selected @endif>WNI</option>
                                                <option value="WNA" @if ($value->kewarganegaraan == "WNA")selected @endif>WNA</option>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="number" class="form-control input-table" placeholder="No Paspor" value="{{$value->no_paspor}}">
                                        </td>
                                        <td>
                                            <input type="number" class="form-control input-table" placeholder="No KITAP" value="{{$value->no_kitap}}">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control input-table" placeholder="Nama Ayah" value="{{$value->ayah}}">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control input-table" placeholder="Nama Ibu" value="{{$value->ibu}}">
                                        </td>
                                    </tr>
                                    @endif
                                @endforeach
                            </tbody>
                            
                                <tr>
                                  <td>
                                    <button class="btn btn-success tambah-item"><i class="fa fa-plus"></i></button>
                                  </td>
                                </tr>
                        </table>
                    </div>
                </div>
                        
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-primary simpan" name="submit">Simpan</button>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>


@endsection

@section('js')
<script src="{{asset('admin_asset/plugins/parsley-js/parsley.js')}}"></script>
<script src="{{asset('admin_asset/bower_components/select2/dist/js/select2.full.min.js')}}"></script>

<script>
$(document).ready(function(){
    $('.select2').select2({
        width: 'resolve'
    })
    $('.tambah-item').click(function(){
            $('#tbody').append(`
            <tr class="tr">
                <td>
                    <button class="btn btn-danger hapus"><i class="fa fa-trash delete"></i></button>
                </td>
                <td>
                    <input type="text" class="form-control input-table" placeholder="Nama Lengkap" required>
                </td>
                <td>
                    <select  id="" class="form-control input-table" required>
                        <option value="">--Pilih Status Keluarga--</option>
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
                </td>
                <td>
                    <input type="number" class="form-control input-table" placeholder="NIK" maxlength="17" required>
                </td>
                <td>
                    <select  id="" class="form-control input-table" required>
                        <option value="">--Pilih Jenis Kelamin--</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </td>
                <td>
                    <input type="text" class="form-control input-table" placeholder="Tempat Lahir">
                </td>
                <td>
                    <input type="date" class="form-control input-table">
                </td>
                <td>
                    <select  id="" class="form-control input-table" required>
                        <option value="">--Pilih Agama--</option>
                        <option value="Islam">Islam</option>
                        <option value="Kristen">Kristen</option>
                        <option value="Katolik">Katolik</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Budha">Budha</option>
                        <option value="Konghucu">Konghucu</option>
                    </select>
                </td>
                <td>
                    <select  id="" class="form-control input-table" required>
                        <option value="">--Pilih Pendidikan--</option>
                        <option value="TIDAK / BELUM SEKOLAH">TIDAK / BELUM SEKOLAH</option>
                        <option value="BELUM TAMAT SD/SEDERAJAT">BELUM TAMAT SD/SEDERAJAT</option>
                        <option value="TAMAT SD / SEDERAJAT">TAMAT SD / SEDERAJAT</option>
                        <option value="SLTP/SEDERAJAT">SLTP/SEDERAJAT</option>
                        <option value="SLTA / SEDERAJAT">SLTA / SEDERAJAT</option>
                        <option value="DIPLOMA I / II">DIPLOMA I / II</option>
                        <option value="AKADEMI/ DIPLOMA III/S. MUDA">AKADEMI/ DIPLOMA III/S. MUDA</option>
                        <option value="DIPLOMA IV/ STRATA I">DIPLOMA IV/ STRATA I</option>
                        <option value="STRATA II">STRATA II</option>
                        <option value="STRATA III">STRATA III</option>
                    </select>
                </td>
                <td>
                    <select  id="" class="form-control input-table" required>
                        <option value="">--Pilih Pekerjaan--</option>
                        @foreach ($pekerjaan as $item)
                        <option value="{{$item->id}}">{{$item->nama}}</option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <select  id="" class="form-control input-table" required>
                        <option value="">--Pilih Status Perkawinan--</option>
                        <option value="Belum Kawin">Belum Kawin</option>
                        <option value="Kawin">Kawin</option>
                    </select>
                </td>
                <td>
                    <select  id="" class="form-control input-table" required>
                        <option value="">--Pilih Status Kewarganegaraan--</option>
                        <option value="WNI">WNI</option>
                        <option value="WNA">WNA</option>
                    </select>
                </td>
                <td>
                    <input type="number" class="form-control input-table" placeholder="No Paspor" >
                </td>
                <td>
                    <input type="number" class="form-control input-table" placeholder="No KITAP" >
                </td>
                <td>
                    <input type="text" class="form-control input-table" placeholder="Nama Ayah">
                </td>
                <td>
                    <input type="text" class="form-control input-table" placeholder="Nama Ibu">
                </td>
            </tr>
            `)
            $('.select2').select2({
                
            })
    })

    $(document).on('click', '.hapus', function() {
            $(this).closest('.tr').remove();
    })
    $('.simpan').click(function(){
        var checkrequired = $('input,textarea,select').filter('[required]:visible')
        var isValid = true;
        $(checkrequired).each( function() {
                if ($(this).parsley().validate() !== true) isValid = false;
        });
        if(!isValid){
            return;
        }

        urlsnya = '{{route('penduduk.update',$penduduk->id)}}';
        _token = $('.form_content').find('input[name=_token]').val();
        form = $('.form_content').find('.input');
        subform_row = $('#tbody').find('.tr');
        var arr= {};
        var item= [];
        $.each(form,function(k,value){
            arr[value.name] = value.value;
        });
        $.each(subform_row,function(k,value){
            subform_value = $(this).find('.input-table');
            console.log(subform_value)
            item.push({
                'nama': subform_value[0].value,
                'status_keluarga': subform_value[1].value,
                'nik':subform_value[2].value,
                'jenis_kelamin':subform_value[3].value,
                'tempat_lahir':subform_value[4].value,
                'tanggal_lahir':subform_value[5].value,
                'agama':subform_value[6].value,
                'pendidikan':subform_value[7].value,
                'pekerjaan_id':subform_value[8].value,
                'status_perkawinan':subform_value[9].value,
                'kewarganegaraan':subform_value[10].value,
                'no_paspor':subform_value[11].value,
                'no_kitap':subform_value[12].value,
                'ayah':subform_value[13].value,
                'ibu':subform_value[14].value,
            });
        });
        $.ajax({
            type: 'PUT',
            dataType: 'json',
            data: {_token:_token, arr:arr, item:item},
            url: urlsnya,
        })
        .done(function(response) {
            if(response == 1){
                toastr.success("Success")
                url = "{{ route('penduduk.index')}}";
                window.location.replace(url);
            }
            else if(response == 2){
                $.alert("No Kartu Keluarga sudah pernah digunakan");
            }
            else{
                return;
            }
            
        })
        .fail(function(){
            $.alert("error");
            return;
        })
        .always(function() {
            
            console.log("complete");
        });
    });
    $('#datatable-input').DataTable({
      'paging'      : false,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : false,
      'info'        : false,
      'autoWidth'   : false,
      "scrollX": true,
      responsive: true
    })
})
</script>
@endsection