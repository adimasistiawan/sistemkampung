@extends('admin.template')
@section('title')
    Surat Masuk | Kampung Notoharjo
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('admin_asset/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css')}}">
@endsection

@section('content')
<div class="content-wrapper">
    <section class="content-header">
      <h1>
        Surat Masuk
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> Home</a></li>
        <li class="active">Surat Masuk</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Data Surat Masuk</h3>
              <button class="btn btn-primary pull-right"  data-toggle="modal" data-target="#modal-default" >
                Tambah Data
              </button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="datatable" class="table table-bordered table-hover table-responsive">
                    <thead>
                        <tr>
                            <th width="15px">No</th>
                            <th>Nomor Surat</th>
                            <th class="text-center">Tanggal</th>
                            <th>Nama Instansi Pengirim</th>
                            <th>Tujuan/Penerima</th>
                            <th>Perihal</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($data as $item)
                        <tr>
                            <td>{{$no}}</td>
                            <td>{{$item->nomor_surat}}</td>
                            <td>{{date('d-m-Y',strtotime($item->tanggal))}}</td>
                            <td>{{$item->pengirim}}</td>
                            <td>{{$item->penerima}}</td>
                            <td>{{$item->perihal}}</td>
                            <td>
                                <form action="{{route('suratmasuk.destroy', $item->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <div class="btn btn-warning edit" data-id="{{$item->id}}"  data-toggle="modal">Ubah</div>
                                    <button type="submit" class="btn btn-danger hapus" onclick="return confirm('Apakah kamu yakin ingin menghapus data?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @php
                            $no++;
                        @endphp
                        @endforeach

                    </tbody>
                </table>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>


  <div class="modal fade" id="modal-default">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title">Tambah Surat Masuk</h4>
        </div>
        <div class="modal-body">
            <form method="post" action="{{route('suratmasuk.store')}}">
                @csrf
                <div class="form-group">
                    <label>Nomor Surat</label>
                    <input type="text" class="form-control" placeholder="Nomor Surat" name="nomor_surat" required>
                </div>
              <div class="form-group">
                  <label>Perihal</label>
                  <input type="text" class="form-control" placeholder="Perihal" name="perihal" required>
              </div>
              
              <div class="form-group">
                <label>Diterima Tanggal</label>
                <input type="date" class="form-control" placeholder="Diterima Tanggal" name="tanggal" required>
              </div>
              <div class="form-group">
                <label>Nama Instansi Pengirim</label>
                <input type="text" class="form-control" placeholder="Nama Instansi Pengirim" name="pengirim" required>
              </div>
              <div class="form-group">
                <label>Tujuan/Penerima</label>
                <input type="text" class="form-control" placeholder="Tujuan/Penerima" name="penerima" required>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </form>
        </div>  
      </div>
      <!-- /.modal-content -->
    </div>
  </div>

<div class="modal fade" id="modal-default2">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title">Ubah Surat Masuk</h4>
        </div>
        <div class="modal-body">
            <form method="post" action="{{route('suratmasuk.store')}}">
                @csrf
                <input type="hidden" name="id" id="id">
                <div class="form-group">
                    <label>Nomor Surat</label>
                    <input type="text" class="form-control" id="nomor_surat" placeholder="Nomor Surat" name="nomor_surat" required>
                </div>
              <div class="form-group">
                  <label>Perihal</label>
                  <input type="text" class="form-control" id="perihal" placeholder="Perihal" name="perihal" required>
              </div>
              
              <div class="form-group">
                <label>Diterima Tanggal</label>
                <input type="date" class="form-control" id="tanggal" placeholder="Diterima Tanggal" name="tanggal" required>
              </div>
              <div class="form-group">
                <label>Nama Instansi Pengirim</label>
                <input type="text" class="form-control" id="pengirim" placeholder="Nama Instansi Pengirim" name="pengirim" required>
              </div>
              <div class="form-group">
                <label>Tujuan/Penerima</label>
                <input type="text" class="form-control" id="penerima" placeholder="Tujuan/Penerima" name="penerima" required>
              </div>
              <!-- /.card-body -->

              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </form>
        </div>  
      </div>
      <!-- /.modal-content -->
    </div>
</div>
  <!-- /.modal -->  

@endsection

@section('js')
<script>
$(document).ready(function(){
    @if(session()->has('success'))
         toastr.success("{{session('success')}}")
   
         
    @endif

    @if(session()->has('error'))
    $.alert("{{session('error')}}")
    @endif

    $('.edit').click(function(){
        var id = $(this).attr('data-id');
        url = '{{route('suratmasuk.edit',":id")}}';
        url = url.replace(':id', id);
        _token = $('input[name=_token]').val();
        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: url,
        })
        .done(function(response) {
            console.log(response)
            $('#id').val(response.id)
            $('#nomor_surat').val(response.nomor_surat)
            $('#perihal').val(response.perihal)
            $('#tanggal').val(response.tanggal)
            $('#penerima').val(response.penerima)
            $('#pengirim').val(response.pengirim)
            $('#modal-default2').modal('show');
        })
        .fail(function(){
            $.alert("error");
            return;
        })
        .always(function() {
            console.log("complete");
        });
    })
    
 })
</script>
@endsection