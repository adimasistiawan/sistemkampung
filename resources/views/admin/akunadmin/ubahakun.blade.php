@extends('admin.template')
@section('title')
    Ubah Akun | Kampung Notoharjo
@endsection

@section('css')
@endsection

@section('content')
<div class="content-wrapper">
    <section class="content-header">
      <h1>
        Ubah Akun
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-Berita"></i> Home</a></li>
        <li>Ubah Akun</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Form Ubah Akun</h3>
            </div>
            <div class="box-body form_content">
                <div class="col-md-4">
                  <form method="post" action="{{route('ubahakun.update')}}">
                    @csrf
                    <div class="form-group">
                      <label >Nama</label>
                      <input type="text" class="form-control" placeholder="Nama" value="{{Auth::guard('admin')->user()->nama}}" name="nama" required>
                    </div>
                    <div class="form-group">
                      <label>Email</label>
                      <input type="email" class="form-control" placeholder="Email" name="email" value="{{Auth::guard('admin')->user()->email}}" required>
                    </div>
                    
                    <a id="" href="#" class="text-blue change_password" style="width:100%">Ganti Password</a>
                    <a id="" class="text-red batal" href="#" style="width:100%" hidden>Batal Ganti Password</a>
                    <div class="formpassword">
                
                    </div>
                </div>
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-primary simpan" name="submit">Simpan</button>
                </form>
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