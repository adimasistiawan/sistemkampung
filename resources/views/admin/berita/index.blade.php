@extends('admin.template')
@section('title')
    Berita | Kampung Notoharjo
@endsection

@section('css')
    
@endsection

@section('content')
<div class="content-wrapper">
    <section class="content-header">
      <h1>
        Berita
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> Home</a></li>
        <li class="active">Berita</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Berita</h3>
              <a href="{{route('berita.create')}}" class="btn btn-primary pull-right" >
                Tambah Data
              </a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                
                <table id="datatable" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th width="15px">No</th>
                            <th class="text-center">Foto</th>
                            <th class="text-center">Judul</th>
                            <th class="text-center">Tanggal</th>
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
                            <td><img src="{{asset('image_berita/'.$item->foto)}}" width="50px" height="50px" alt=""></td>
                            <td>{{$item->judul}}</td>
                            <td>{{$item->tanggal}}</td>
                            <td>
                                <form action="{{route('berita.destroy', $item->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <a href="{{route('berita.edit', $item->id)}}" class="btn btn-warning edit">Ubah</a>
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