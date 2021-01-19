@extends('admin.template')
@section('title')
    Akun Admin | Kampung Notoharjo
@endsection

@section('css')
    
@endsection

@section('content')
<div class="content-wrapper">
    <section class="content-header">
      <h1>
        Akun Admin
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> Home</a></li>
        <li class="active">Akun Admin</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Akun Admin</h3>
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
                            <th class="text-center">Email</th>
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
                            <td>{{$item->email}}</td>
                            <td>
                                
                                <form action="{{route('admin.destroy', $item->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <a  class="btn btn-warning edit" data-toggle="modal" data-target="#modal-default{{$item->id}}">Ubah</a>
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
            <h4 class="modal-title">Tambah Admin</h4>
        </div>
        <div class="modal-body">
          <form method="post" action="{{route('admin.store')}}">
            @csrf
            <div class="form-group">
              <label >Nama</label>
              <input type="text" class="form-control" placeholder="Nama"  name="nama" required>
            </div>
            <div class="form-group">
              <label>Email</label>
              <input type="email" class="form-control" placeholder="Email" name="email" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" placeholder="Password" name="password" required>
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

  @foreach ($data as $value)
  <div class="modal fade" id="modal-default{{$value->id}}">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title">Ubah Admin</h4>
        </div>
        <div class="modal-body">
          <form method="post" action="{{route('admin.update',$value->id )}}">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label >Nama</label>
              <input type="text" class="form-control" placeholder="Nama" value="{{$value->nama}}" name="nama" required>
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