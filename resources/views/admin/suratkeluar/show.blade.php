@extends('admin.template')
@section('title')
    Lihat Surat Keluar | Kampung Notoharjo
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('admin_asset/plugins/parsley-js/parsley.css')}}">
@endsection

@section('content')
<div class="content-wrapper">
    <section class="content-header">
      <h1>
        Lihat Surat Keluar
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> Home</a></li>
        <li class="active">Lihat Surat Keluar</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Lihat Surat Keluar</h3>
             
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="col-md-6">
                    @csrf
                    <table width="600px">
                      <tr height="40px">
                          <th>Nama Warga</th>
                          <td>:</td>
                          <td>
                            @if($data->warga_id == null)
                            {{$data->pemohon}}
                            @else
                            <a href="{{route('warga.show',$data->warga->id)}}" target="blank"> {{$data->warga->nama}} <i class="fa fa-edit"></i></a>
                            @endif
                          </td>
                      </tr>
                        <tr height="40px">
                            <th>Tanggal</th>
                            <td>:</td>
                            <td>{{date('d-m-Y',strtotime($data->tanggal))}}</td>
                        </tr>
                        <tr height="40px">
                          <th>Perihal</th>
                          <td>:</td>
                          <td>{{$data->perihal}}</td>
                        </tr>
                        <tr height="40px">
                          <th>Status</th>
                          <td>:</td>
                          <td>
                              <span class="badge bg-yellow">
                                Belum Diterima
                              </span>
                          </td>
                        </tr>
                    </table>
                    <a href="{{route('suratkeluar.pdf',['perihal'=>$data->perihal == "Surat Keterangan Kematian Suami/Istri"? "Surat Keterangan Kematian SuamiIstri":$data->perihal,'id'=>$data->id,'watermark'=>true])}}" target="blank" class="btn btn-warning">Lihat Surat</a>
                </div>
            </div>
            @if($data->status == "Belum Diterima")
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
                    urlsnya = '{{route('suratkeluar.verifikasi',$data->id)}}';
                    var catatan = this.$content.find('.alasan').val();
                    _token = $('input[name=_token]').val();
                    $.ajax({
                      type: 'GET',
                      dataType: 'json',
                      data: {_token:_token, kode:1,keterangan:catatan},
                      url: urlsnya,
                    })
                    .done(function(response) {
                      if(response == 1){
                        toastr.success("Success")
                        url = "{{ route('suratkeluar.index')}}";
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
                
                No: function () {
                  return;
                }
              }
            })
            
          })

          $('.btn-approve').click(function(){
            $.confirm({
              theme: 'material',
              title: 'Isi Keterangan',
              content: '' +
                                            '<form action="" class="formName">' +
                                            '<div class="form-group">' +
                                            '<input class="form-control alasan" placeholder="Masukan Keterangan">' +
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
                    urlsnya = '{{route('suratkeluar.verifikasi',$data->id)}}';
                    var catatan = this.$content.find('.alasan').val();
                    _token = $('input[name=_token]').val();
                    $.ajax({
                      type: 'GET',
                      dataType: 'json',
                      data: {_token:_token, kode:0,keterangan:catatan},
                      url: urlsnya,
                    })
                    .done(function(response) {
                      if(response == 1){
                        toastr.success("Success")
                        url = "{{ route('suratkeluar.index')}}";
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
                
                No: function () {
                  return;
                }
              }
            })
            
          })
 })
</script>
@endsection