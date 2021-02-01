@extends('admin.template')
@section('title')
    Lihat Akun Warga | Kampung Notoharjo
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('admin_asset/plugins/parsley-js/parsley.css')}}">
@endsection

@section('content')
<div class="content-wrapper">
    <section class="content-header">
      <h1>
        Lihat Akun Warga
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> Home</a></li>
        <li class="active">Lihat Akun Warga</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Lihat Akun Warga</h3>
             
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="col-md-6">
                    @csrf
                    <table width="600px">
                      <tr height="40px">
                          <th>Nama Lengkap</th>
                          <td>:</td>
                          <td>{{$warga->nama}}</td>
                      </tr>
                        <tr height="40px">
                            <th>NIK</th>
                            <td>:</td>
                            <td>{{$warga->nik}}</td>
                        </tr>
                        <tr height="40px">
                          <th>No. KK</th>
                          <td>:</td>
                          <td>{{$warga->no_kk}}</td>
                        </tr>
                        <tr height="40px">
                            <th>No. HP</th>
                            <td>:</td>
                            <td>{{$warga->no_hp}}</td>
                        </tr>
                        <tr height="40px">
                          <th>Alamat</th>
                          <td>:</td>
                          <td>{{$warga->alamat}}</td>
                        </tr>
                        <tr height="40px">
                          <th>Agama</th>
                          <td>:</td>
                          <td>{{$warga->agama}}</td>
                        </tr>
                        <tr height="40px">
                          <th>Jenis Kelamin</th>
                          <td>:</td>
                          <td>{{$warga->jenis_kelamin}}</td>
                        </tr>
                        <tr height="40px">
                          <th>Pekerjaan</th>
                          <td>:</td>
                          <td>{{$warga->pekerjaan->nama}}</td>
                        </tr>
                        <tr height="40px">
                          <th>Tempat Lahir</th>
                          <td>:</td>
                          <td>{{$warga->tempat_lahir}}</td>
                        </tr>
                        <tr height="40px">
                          <th>Tanggal Lahir</th>
                          <td>:</td>
                          <td>{{$warga->tanggal_lahir}}</td>
                        </tr>
                        <tr height="40px">
                          <th>Status Kawin</th>
                          <td>:</td>
                          <td>{{$warga->status_kawin}}</td>
                        </tr>
                        <tr height="40px">
                            <th>Email</th>
                            <td>:</td>
                            <td>{{$warga->email}}</td>
                        </tr>
                        <tr height="40px">
                          <th>Status</th>
                          <td>:</td>
                          <td>
                              @if($warga->status == "Telah Diverifikasi")
                                <span class="badge bg-green">
                                    Telah Diverifikasi
                                </span>
                              @else
                              <span class="badge bg-maroon">
                                Belum Diverifikasi
                              </span>
                              @endif
                          </td>
                        </tr>
                    </table>
                </div>
            </div>
            @if($warga->status == "Belum Diverifikasi")
            <div class="box-footer">
                <button class="btn btn-success btn-approve" >Terima</button>
                <button class="btn btn-danger btn-reject" >Tolak</button>
                
            </div>
            @endif
          </div>
        </div>
      </div>
    </section>
  </div>


@endsection

@section('js')
<script src="{{asset('admin_asset/plugins/parsley-js/parsley.js')}}"></script>
<script>
$(document).ready(function(){
    $('.btn-approve').click(function(){
        $.confirm({
            theme: 'material',
            title: 'Warning!',
            content: 'Apakah anda yakin ingin menerima ?',
            buttons: {
            Yes: function(){
                urlsnya = '{{route('warga.verifikasi',$warga->id)}}';
                _token = $('input[name=_token]').val();
                $.ajax({
                    type: 'GET',
                    dataType: 'json',
                    data: {_token:_token, status:'Diverifikasi'},
                    url: urlsnya,
                })
                .done(function(response) {
                if(response == 1){
                    toastr.success("Success")
                    url = "{{ route('warga.index')}}";
                    window.location.replace(url);
                }
                
                })
                .fail(function(){
                    $.alert("error");
                return;
                })
                .always(function() {
                    console.log("complete");
                });
            },
            No: {
                  text:"Batal",
                  action: function () {
                    return;
                  }
                }
            }
        })
        
    })

          $('.btn-reject').click(function(){
            $.confirm({
              theme: 'material',
              title: 'Isi Catatan',
              content: '' +
                                            '<form action="" class="formName">' +
                                            '<div class="form-group">' +
                                            '<input class="form-control alasan" placeholder="Masukan Catatan" required>' +
                                            '</div>' +
                                            '</form>',
              buttons: {
                Yes: {
                  text:'Submit',
                  btnClass: 'btn-primary',
                  action: function(){
                  var checkrequired = $('input').filter('[required]:visible')
                  var isValid = true;
                  $(checkrequired).each( function() {
                          if ($(this).parsley().validate() !== true) isValid = false;
                  });
                  if(!isValid){
                    $.alert('Mohon masukan catatan');
                    return false;
                  }
                  else{
                    urlsnya = '{{route('warga.verifikasi',$warga->id)}}';
                    var catatan = this.$content.find('.alasan').val();
                    _token = $('input[name=_token]').val();
                    $.ajax({
                      type: 'GET',
                      dataType: 'json',
                      data: {_token:_token, status:'Ditolak',catatan:catatan},
                      url: urlsnya,
                    })
                    .done(function(response) {
                      if(response == 1){
                        toastr.success("Success")
                        url = "{{ route('warga.index')}}";
                        window.location.replace(url);
                      }
                      
                    })
                    .fail(function(){
                      $.alert("error");
                      return;
                    })
                    .always(function() {
                        console.log("complete");
                    });
                   }
                  }
                  
                },
                
                No: {
                  text:"Batal",
                  action: function () {
                    return;
                  }
                }
              }
            })
            
          })
 })
</script>
@endsection