@extends('admin.template')
@section('title')
    Tambah Data Penduduk | Kampung Notoharjo
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('admin_asset/plugins/parsley-js/parsley.css')}}">
    <style>
        div.dataTables_wrapper {
        margin: 0 auto;
    }
    </style>
@endsection

@section('content')
<div class="content-wrapper">
    <section class="content-header">
      <h1>
        Tambah Data Penduduk
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-Data Penduduk"></i> Home</a></li>
        <li>Data Penduduk</li>
        <li class="active">Tambah Data Penduduk</li>
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
                      <input type="number" class="form-control input" id="no_kk"  placeholder="No Kartu Keluarga" maxlength="16" required  name="no_kk">
                    </div>
                    <div class="form-group">
                      <label  >Alamat</label>
                      <input type="text" class="form-control input" id="alamat"  placeholder="Alamat" required  name="alamat">
                    </div>
                    <div class="form-group">
                      <label  >RT</label>
                      <select  id="" class="form-control input" name="rt" required>
                        <option value="001">001</option>
                        <option value="002">002</option>
                        <option value="003">003</option>
                        <option value="004">004</option>
                        <option value="005">005</option>
                        <option value="006">006</option>
                        <option value="007">007</option>
                        <option value="008">008</option>
                        <option value="009">009</option>
                        <option value="010">010</option>
                        <option value="011">011</option>
                        <option value="012">012</option>
                        <option value="013">013</option>
                        <option value="014">014</option>
                        <option value="015">015</option>
                        <option value="016">016</option>
                        <option value="017">017</option>
                        <option value="018">018</option>
                        <option value="020">020</option>
                        <option value="021">021</option>
                        <option value="022">022</option>
                        <option value="023">023</option>
                        <option value="024">024</option>
                        <option value="025">025</option>
                      </select>
                    </div>
                    <div class="form-group">
                        <label  >RW</label>
                        <select  id="" class="form-control input" name="rw" required>
                          <option value="001">001</option>
                          <option value="002">002</option>
                          <option value="003">003</option>
                          <option value="004">004</option>
                          <option value="005">005</option>
                          <option value="006">006</option>
                          <option value="007">007</option>
                          <option value="008">008</option>
                          <option value="009">009</option>
                          <option value="010">010</option>
                          <option value="011">011</option>
                          <option value="012">012</option>
                          <option value="013">013</option>
                          <option value="014">014</option>
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
                                <tr class="tr">
                                    <td>

                                    </td>
                                    <td>
                                        <input type="text" class="form-control input-table input" placeholder="Nama Lengkap" name="kepala_keluarga" required>
                                    </td>
                                    <td>
                                        <select  id="" class="form-control input-table "  required disabled>
                                            <option value="">--Pilih Status Keluarga--</option>
                                            <option value="Kepala Keluarga" selected>Kepala Keluarga</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="number" class="form-control input-table" placeholder="NIK" maxlength="16" required>
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
<script>
$(document).ready(function(){

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

        urlsnya = '{{route('penduduk.store')}}';
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
            type: 'POST',
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