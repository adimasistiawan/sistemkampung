@extends('admin.template')
@section('title')
    Profil | Kampung Notoharjo
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('admin_asset/plugins/parsley-js/parsley.css')}}">
<link rel="stylesheet" href="{{asset('admin_asset/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
@endsection

@section('content')
<div class="content-wrapper">
    <section class="content-header">
      <h1>
        Profil
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-Berita"></i> Home</a></li>
        <li class="active">Profil</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Form Profil</h3>
            </div>
            <div class="box-body form_content">
                <form action="{{route('profil.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                  <input type="hidden" value="{{$id}}" name="id">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label >Sejarah</label>
                      <textarea class="textarea" name="sejarah" placeholder="Sejarah .."
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required>{{$data['sejarah']}}</textarea>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group">
                      <label >Visi</label>
                      <textarea class="textarea" name="visi" placeholder="Visi .."
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required>{{$data['visi']}}</textarea>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label >Misi</label>
                      <textarea class="textarea" name="misi" placeholder="Misi .."
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required>{{$data['misi']}}</textarea>
                    </div>
                  </div>
                  
                  <br>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label  >Struktur Oganisasi</label>
                        <br>
                        <img id="blah" src="{{asset('struktur/'.$data['struktur_organisasi'])}}" alt="your image" height="200px" width="250px"/>
                        <br>
                        <input type='file' accept="image/*" id="imgInp" name="struktur_organisasi"  />
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label  >Nama Ketua Kampung</label>
                        <input type='text' class="form-control" value="{{$data['nama_ketua_kampung']}}" name="nama_ketua_kampung"  required/>
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