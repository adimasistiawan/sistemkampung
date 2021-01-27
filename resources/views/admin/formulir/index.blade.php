@extends('admin.template')
@section('title')
    Formulir | Kampung Notoharjo
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('admin_asset/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css')}}">
@endsection

@section('content')
<div class="content-wrapper">
    <section class="content-header">
      <h1>
        Formulir
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> Home</a></li>
        <li class="active">Formulir</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Data Formulir</h3>
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
                            <th>Nama Formulir</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($data as $item)
                        <tr>
                            <td>{{$no}}</td>
                            <td>{{$item->nama}}</td>
                            <td>
                                <form action="{{route('formulir.destroy', $item->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <a class="btn btn-success" href="{{route('formulir.show',$item->id)}}"><i class="fa fa-download"></i></a>
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
            <h4 class="modal-title">Tambah Formulir</h4>
        </div>
        <div class="modal-body">
            <form method="post" action="{{route('formulir.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Nama Formulir</label>
                    <input type="text" class="form-control" placeholder="Nama Formulir" name="nama" required>
                </div>
              <div class="form-group">
                  <label>File</label>
                  <input type="file" class="form-control" placeholder="File" name="file" required>
                  
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
            <h4 class="modal-title">Ubah Formulir</h4>
        </div>
        <div class="modal-body">
            <form method="post" action="{{route('formulir.store')}}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" id="id">
                <div class="form-group">
                    <label>Nama Formulir</label>
                    <input type="text" class="form-control" id="nama" placeholder="Nama Formulir" name="nama" required>
                </div>
              <div class="form-group">
                  <label>File</label>
                  <br>
                  <span id="file"></span>
                  <input type="file" id="fileinput" class="form-control" placeholder="File" name="file">
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
        url = '{{route('formulir.edit',":id")}}';
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
            $('#nama').val(response.nama)
            $('#file').text(response.file)
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

    $('#fileinput').change(function(){
      $('#file').text("");
    })
    
 })
</script>
@endsection