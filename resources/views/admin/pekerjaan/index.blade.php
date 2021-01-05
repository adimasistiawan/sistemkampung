@extends('admin.template')
@section('title')
    Pekerjaan | Kampung Notoharjo
@endsection

@section('css')
    
@endsection

@section('content')
<div class="content-wrapper">
    <section class="content-header">
      <h1>
        Pekerjaan
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> Home</a></li>
        <li class="active">Pekerjaan</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Data Pekerjaan</h3>
              <button class="btn btn-primary pull-right"  data-toggle="modal" data-target="#modal-default" >
                Tambah Data
              </button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="datatable" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th width="15px">No</th>
                            <th class="text-center">Nama</th>
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
                            <td>{{$item->nama}}</td>
                            <td>
                                <form action="{{route('pekerjaan.destroy', $item->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <div class="btn btn-warning edit"  data-toggle="modal" data-target="#modal-default{{$item->id}}">Ubah</div>
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
            <h4 class="modal-title">Default Modal</h4>
        </div>
        <div class="modal-body">
            <form method="post" action="{{route('pekerjaan.store')}}">
                @csrf
                <div class="form-group">
                  <label>Nama</label>
                  <input type="text" class="form-control" placeholder="Nama" name="nama" required>
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

@foreach ($data as $item)
<div class="modal fade" id="modal-default{{$item->id}}">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title">Ubah Pekerjaan</h4>
        </div>
        <div class="modal-body">
            <form method="post" action="{{route('pekerjaan.update',$item->id )}}">
                @csrf
                @method('PUT')
                
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" class="form-control" placeholder="Nama" name="nama" value="{{$item->nama}}" required>
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
@endforeach
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
 })
</script>
@endsection