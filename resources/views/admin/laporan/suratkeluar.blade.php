@extends('admin.template')
@section('title')
    Laporan Surat Keluar | Kampung Notoharjo
@endsection

@section('css')
    
@endsection

@section('content')
<div class="content-wrapper">
    <section class="content-header">
      <h1>
        Laporan Surat Keluar
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> Home</a></li>
        <li class="active">Laporan Surat Keluar</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Laporan Surat Keluar</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-3">
                    @csrf
                    <div class="form-group">
                      <label  >Dari</label>
                      <input type="date" id="dari" class="form-control input" name="dari" required>
                      
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                      <label  >Sampai</label>
                      <input type="date" id="sampai" class="form-control input" name="sampai" required>
                    </div>
                </div>
                <div class="col-md-2">
                   
                    <label for="">&nbsp;</label>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary search">Cari</button>
                    </div>
                </div>
            </div>
            
            <div class="report" hidden>
                <br>
                <br>
                <br>
              <div class="pdf">
                          
              </div>
                <u><h2 class="text-center">BUKU AGENDA SURAT KELUAR</h2></u>
                <table class="table table-bordered" width="100%">
                    <thead>
                        <tr>
                            <th width="15px">No</th>
                            <th class="text-center" width="180px">Tanggal - Bulan - Tahun</th>
                            <th class="text-center" width="160px">Nomor Surat</th>
                            <th class="text-center" width="150px" >Perihal</th>
                            <th class="text-center" width="150px">Penanggung Jawab Pengelola</th>
                            <th class="text-center" width="150px">Keterangan</th>
                        </tr>
                    </thead>
                    <tbody class="tbody">
                        

                    </tbody>
                </table>
              </div>
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

    $('.search').click(function(){
        $('.pdf').empty();
        
        dari = $('#dari').val()
        sampai = $('#sampai').val()

        if(dari=="" || sampai==""){
            $.alert('Mohon lengkapi parameter !');
            return;
        }
        if(dari>sampai){
            $.alert('Tanggal "Dari" harus lebih kecil dari tanggal "Sampai" !');
            return;
        }
        $('.loading').removeAttr('hidden')
        var url = "{{route('laporan.suratkeluar.pdf',['dari' => ':dari','sampai' => ':sampai'])}}";
        
        url = url.replace(':sampai', sampai);
        url = url.replace(':dari', dari);
        $('.pdf').append(
            `<a href="`+url+`" target="blank" class="btn btn-success"><i class="fa fa-download"></i> PDF</a>`
          )

        $('.tbody').empty();
        $('.report').removeAttr('hidden')
        var urlsnya='{{route('laporan.suratkeluar.submit')}}';
        _token = $('input[name=_token]').val();
        form = $('.input');
        var arr= {};
        $.each(form,function(k,value){
            arr[value.name] = value.value;
        });

        $.ajax({
            type: 'POST',
            dataType: 'json',
            data: {_token:_token, arr:arr},
            url: urlsnya,
        })
        .done(function(response) {
          if(response['data'].length != 0){
            var no = 1;
            
            $.each(response['data'],function(k,value){
              console.log(value['warga'])
              
              $('.tbody').append(`
              <tr>
                <td>`+no+`</td>
                <td class="text-center">`+$.datepicker.formatDate( "dd/mm/yy", new Date(value['tanggal']))+`</td>
                <td>`+value['nomor_surat']+`</td>
                <td>`+value['perihal']+`</td>
                <td>Kep. Kampung</td>
                <td>`+(value['warga']==null? value['pemohon']:value['warga'])+` `+(value['keterangan']==null? "":"/ "+value['keterangan'])+`</td>
            </tr>
              `)
              no++;
              $('.loading').attr('hidden',true)
            });
          }
          else{
            $('.tbody').append(`
              <tr>
                  <td colspan="6" class="text-center">Data Tidak Ada</td>
                  
              </tr>
              `)
              
          }
          
          $('.loading').attr('hidden',true)
        })
        
      })
 })
</script>
@endsection