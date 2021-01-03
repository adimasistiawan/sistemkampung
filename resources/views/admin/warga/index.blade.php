@extends('admin.template')
@section('title')
    Akun Warga | Kampung Notoharjo
@endsection

@section('css')
    
@endsection

@section('content')
<div class="content-wrapper">
    <section class="content-header">
      <h1>
        Akun Warga
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> Home</a></li>
        <li class="active">Akun Warga</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Akun Warga</h3>
              {{-- <a href="{{route('warga.create')}}" class="btn btn-primary pull-right" >
                Tambah Data
              </a> --}}
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="datatable" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th width="15px">No</th>
                            <th>Nama</th>
                            <th>NIK</th>
                            <th>No. KK</th>
                            <th>Status</th>
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
                            <td>{{$item->nik}}</td>
                            <td>{{$item->no_kk}}</td>
                            <td>
                                @if ($item->status == "Belum Diverifikasi")
                                    <span class="bedge bedge-danger">Belum Diverifikasi</span>
                                @endif
                            </td>
                            <td>
                                @if ($item->status == "Belum Diverifikasi")
                                <a href="{{route('warga.show', $item->id)}}" class="btn btn-warning edit">Lihat</a>
                                @else
                                <form action="{{route('warga.destroy', $item->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <a href="{{route('warga.edit', $item->id)}}" class="btn btn-warning edit">Ubah</a>
                                    <button type="submit" class="btn btn-danger hapus" onclick="return confirm('Apakah kamu yakin ingin menghapus data?')">Hapus</button>
                                </form>
                                @endif
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