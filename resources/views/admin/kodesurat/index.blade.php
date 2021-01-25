@extends('admin.template')
@section('title')
    Kode Surat | Kampung Notoharjo
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('admin_asset/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css')}}">
@endsection

@section('content')
<div class="content-wrapper">
    <section class="content-header">
      <h1>
        Kode Surat
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> Home</a></li>
        <li class="active">Kode Surat</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Data Kode Surat</h3>
              
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="datatable" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th width="15px">No</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Kode</th>
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
                            <td>{{$item->kode}}</td>
                            <td>
                                <div class="btn btn-warning edit"  data-toggle="modal" data-target="#modal-default{{$item->id}}">Ubah</div>
                                
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

@foreach ($data as $item)
<div class="modal fade" id="modal-default{{$item->id}}">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title">Ubah Kode Surat</h4>
        </div>
        <div class="modal-body">
            <form method="post" action="{{route('kodesurat.update',$item->id )}}">
                @csrf
                @method('PUT')
                
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" class="form-control" placeholder="Nama" name="nama" value="{{$item->nama}}" disabled>
                </div>
                <div class="form-group">
                    <label>Kode</label>
                    <input type="text" class="form-control" placeholder="Kode" name="kode" value="{{$item->kode}}" required>
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