@extends('admin.template')
@section('title')
    Tambah Berita | Kampung Notoharjo
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('admin_asset/plugins/parsley-js/parsley.css')}}">
<link rel="stylesheet" href="{{asset('admin_asset/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
@endsection

@section('content')
<div class="content-wrapper">
    <section class="content-header">
      <h1>
        Tambah Berita
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-Berita"></i> Home</a></li>
        <li>Berita</li>
        <li class="active">Tambah Berita</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Form Berita</h3>
            </div>
            <div class="box-body form_content">
                <form action="{{route('berita.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="col-md-4">
                    <div class="form-group">
                      <label  >Foto</label>
                      <br>
                      <img id="blah" src="#"  alt="your image" height="200px" width="250px" hidden/>
                      <br>
                      <input type='file' id="imgInp" accept="image/*" name="foto" required />
                    </div>
                    <div class="form-group">
                      <label  >Judul</label>
                      <input type="text" class="form-control input" id="judul"  placeholder="Judul" required  name="judul">
                    </div>
                    <div class="form-group">
                      <label  >Tanggal</label>
                      <input type="date" class="form-control input" id="tanggal" required  name="tanggal" required>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label >Isi</label>
                      <textarea class="textarea" name="isi" placeholder="Isi .."
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required></textarea>
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