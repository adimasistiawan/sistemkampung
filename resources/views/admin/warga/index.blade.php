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
                            <th class="text-center">Nama</th>
                            <th class="text-center">NIK</th>
                            <th class="text-center">No. KK</th>
                            <th class="text-center">Status</th>
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
                            <td class="text-center">{{$item->nik}}</td>
                            <td class="text-center">{{$item->no_kk}}</td>
                            <td class="text-center">
                                @if ($item->status == "Belum Diverifikasi")
                                    <div class="badge bg-maroon">Belum Diverifikasi</div>
                                @else
                                  <div class="badge bg-green">Telah Diverifikasi</div>
                                @endif
                            </td>
                            <td>
                                @if ($item->status == "Belum Diverifikasi")
                                <a href="{{route('warga.show', $item->id)}}" class="btn btn-primary edit">Lihat</a>
                                @else
                                <form action="{{route('warga.destroy', $item->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <a href="{{route('warga.show', $item->id)}}" class="btn btn-primary">Lihat</a>
                                    <a  class="btn btn-warning edit" data-toggle="modal" data-target="#modal-default{{$item->id}}">Ubah</a>
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
  @foreach ($data as $value)
  <div class="modal fade" id="modal-default{{$value->id}}">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title">Ubah Pekerjaan</h4>
        </div>
        <div class="modal-body">
          <form method="post" action="{{route('warga.update',$value->id )}}">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label >Nama</label>
              <input type="text" class="form-control" placeholder="Nama" value="{{$value->nama}}" name="nama" required>
            </div>
        
            <div class="form-group">
                <label >NIK</label>
                <input type="text" class="form-control" placeholder="NIK" name="nik" value="{{$value->nik}}" required>
            </div>
        
            <div class="form-group">
              <label >No. KK</label>
              <input type="text" class="form-control" placeholder="No. KK" name="no_kk" value="{{$value->no_kk}}" required>
            </div>
            <div class="form-group">
              <label >No. HP</label>
              <input type="text" class="form-control" placeholder="No. HP" name="no_hp" value="{{$value->no_hp}}" required>
            </div>
            <div class="form-group">
              <label>Email</label>
              <input type="email" class="form-control" placeholder="Email" name="email" value="{{$value->email}}" required>
            </div>
            
            <a id="" href="#" class="text-blue change_password" style="width:100%">Reset Password</a>
            <a id="" class="text-red batal" href="#" style="width:100%" hidden>Batal Reset Password</a>
            <div class="formpassword">
        
            </div>
            
          </div>
          
          <!-- /.card-body -->
        
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary btn_submit2">Simpan</button>
          </div>
        </form>
        </div>  
      </div>
      <!-- /.modal-content -->
  </div>
    </div>
</div>
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

        $('.change_password').click(function(){
            $('.formpassword').append(`
                <div class="form-group">
                    <label>Password Baru</label>
                    <input type="password" class="form-control Password2" id="" placeholder="Password" name="password" required>
                  </div>
                
            `)
            $('.batal').removeAttr('hidden');
            $(this).attr('hidden',true);
            
        })
        $('.batal').click(function(){
            $('.formpassword').empty();
            $('.change_password').removeAttr('hidden');
            $(this).attr('hidden',true);
        })

        
        $('.edit').click(function(){
            $('.formpassword').empty();
            $('.change_password').removeAttr('hidden');
            $('.batal').attr('hidden',true);
        })
 })
</script>
@endsection