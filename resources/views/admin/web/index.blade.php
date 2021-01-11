@extends('admin.template')
@section('title')
    Web | Kampung Notoharjo
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('admin_asset/plugins/parsley-js/parsley.css')}}">
<link rel="stylesheet" href="{{asset('admin_asset/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
@endsection

@section('content')
<div class="content-wrapper">
    <section class="content-header">
      <h1>
        Web
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-Berita"></i> Home</a></li>
        <li class="active">Web</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Form</h3>
            </div>
            <div class="box-body form_content">
                <form action="{{route('web.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                  <input type="hidden" value="{{$id}}" name="id">
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label  >Foto Header</label>
                        <br>
                        
                        <img id="blah" src="{{asset('header/'.$data['foto_header'])}}"  alt="your image" height="200px" width="250px"/>
                        <br>
                        <input type='file' id="imgInp" name="foto_header" accept="image/*" />
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label  >Telepon</label>
                        <input type='text' class="form-control" value="{{$data['telepon']}}" name="telepon"  />
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label  >Email</label>
                        <input type='email' class="form-control" value="{{$data['email']}}" name="email"  />
                      </div>
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
<script src="{{asset('admin_asset/plugins/parsley-js/parsley.js')}}"></script>
<script src="{{asset('admin_asset/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<script>
    @if(session()->has('success'))
         toastr.success("{{session('success')}}")
   
         
    @endif

    @if(session()->has('error'))
    $.alert("{{session('error')}}")
    @endif
  $('.textarea').wysihtml5()
function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $('#blah').attr('src', e.target.result);
    }
    
    reader.readAsDataURL(input.files[0]); // convert to base64 string
  }
}

$("#imgInp").change(function() {
  $('#blah').removeAttr('hidden')
  readURL(this);
});
</script>
@endsection