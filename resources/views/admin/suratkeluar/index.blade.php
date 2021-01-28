@extends('admin.template')
@section('title')
    Surat Keluar | Kampung Notoharjo
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('admin_asset/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css')}}">
@endsection

@section('content')
<div class="content-wrapper">
    <section class="content-header">
      <h1>
        Surat Keluar
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> Home</a></li>
        <li class="active">Surat Keluar</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Data Surat Keluar</h3>
              <button class="btn btn-primary pull-right"  data-toggle="modal" data-target="#modal-default" >
                Tambah Data
              </button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                @php
                    $suratkeluar = App\SuratKeluar::where('status','Belum Diterima')->count();
                @endphp
                  <li class="active"><a href="#tab_1" data-toggle="tab">Telah Diterima</a></li>
                  <li>
                      <a href="#tab_2" data-toggle="tab">
                          <span>Belum Diterima</span>
                          &nbsp;
                          @if ($suratkeluar > 0)
                            <span class="pull-right-container">
                            <span class="label label-danger pull-right">{{$suratkeluar}}</span>
                            </span>
                          @endif
                      </a>
                  </li>
                </ul>
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">
                    <table id="datatable" class="table table-bordered table-hover table-responsive">
                      <thead>
                          <tr>
                              <th width="15px">No</th>
                              <th >Pemohon</th>
                              <th class="text-center">Tanggal</th>
                              <th>Nomor Surat</th>
                              <th>Perihal</th>
                              <th>Keterangan</th>
                              <th class="text-center">Aksi</th>
                          </tr>
                      </thead>
                      <tbody>
                          @php
                              $no = 1;
                          @endphp
                          @foreach ($telahditerima as $item)
                          <tr>
                              <td>{{$no}}</td>
                              <td>{{$item->warga_id == null? $item->pemohon:$item->warga->nama}}</td>
                              <td>{{date('d-m-Y',strtotime($item->tanggal))}}</td>
                              <td>{{$item->nomor_surat}}</td>
                              <td>{{$item->perihal}}</td>
                              <td>{{$item->keterangan}}</td>
                              <td>
                                @if($item->warga_id == null)
                                  <div class="btn btn-warning edit" data-id="{{$item->id}}"  data-toggle="modal">Ubah</div>
                                </form>
                                @else
                                <a href="{{route('suratkeluar.pdf',['perihal'=>$item->perihal == "Surat Keterangan Kematian Suami/Istri"? "Surat Keterangan Kematian SuamiIstri":$item->perihal,'id'=>$item->id,'watermark'=>0])}}" target="blank" class="btn btn-success"><i class="fa fa-download"></i> PDF</a>
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
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_2">
                    <table id="datatable2" class="table table-bordered table-hover table-responsive">
                        <thead>
                            <tr>
                                <th width="15px">No</th>
                                <th class="text-center">Pemohon</th>
                                <th>Tanggal</th>
                                <th>Perihal</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($belumditerima as $item)
                            <tr>
                                <td>{{$no}}</td>
                                <td>{{$item->warga_id == null? $item->pemohon:$item->warga->nama}}</td>
                                <td>{{date('d-m-Y',strtotime($item->created_at))}}</td>
                                <td>{{$item->perihal}}</td>
                                <td>
                                    <a href="{{route('suratkeluar.show',$item->id)}}" class="btn btn-warning"><i class="fa fa-search"></i></a>
                                </td>
                            </tr>
                            @php
                                $no++;
                            @endphp
                            @endforeach
    
                        </tbody>
                    </table>
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_3">
                    
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div>
                
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
            <h4 class="modal-title">Tambah Surat Keluar</h4>
        </div>
        <div class="modal-body">
            <form method="post" action="{{route('suratkeluar.store')}}">
                @csrf
                <div class="form-group">
                  <label>Perihal</label>
                  <select name="surat" class="form-control surat" required>
                    <option value="">--Pilih Surat--</option>
                    <option value="Surat Keterangan Pindah">Surat Keterangan Pindah</option>
                    <option value="Surat Keterangan Kurang Mampu">Surat Keterangan Kurang Mampu</option>
                    <option value="Surat Keterangan Kematian">Surat Keterangan Kematian</option>
                    <option value="Surat Keterangan Usaha">Surat Keterangan Usaha</option>
                    <option value="Surat Keterangan Ahli Waris">Surat Keterangan Ahli Waris</option>
                    <option value="Surat Keterangan Tanah">Surat Keterangan Tanah</option>
                    <option value="Surat Keterangan Jual Beli">Surat Keterangan Jual Beli</option>
                    <option value="Surat Keterangan Kuasa">Surat Keterangan Kuasa</option>
                    <option value="Surat Pernyataan Hiburan">Surat Pernyataan Hiburan</option>
                    <option value="Surat Rekomendasi Nikah">Surat Rekomendasi Nikah</option>
                    <option value="Surat Permohonan SKCK">Surat Permohonan SKCK</option>
                    <option value="Surat Pengantar Perkawinan">Surat Pengantar Perkawinan</option>
                    <option value="Surat Keterangan Kematian Suami/Istri">Surat Keterangan Kematian Suami/Istri</option>
                    <option value="Surat Keterangan Mengurus Orang Tua">Surat Keterangan Mengurus Orang Tua</option>
                    <option value="Surat Keterangan Kehilangan">Surat Keterangan Kehilangan</option>
                    <option value="Surat Keterangan Jalan">Surat Keterangan Jalan</option>
                    <option value="Lainnya">Lainnya</option>
                </select>
              </div>
              
              <div class="input-tambahan">
                
              </div>
              <div class="form-group">
                <label>Pemohon</label>
                <input type="text" class="form-control" placeholder="Pemohon" name="pemohon" required>
              </div>
              <div class="form-group">
                <label>Keterangan</label>
                <input type="text" class="form-control" placeholder="Keterangan" name="keterangan">
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </form>
        </div>  
      </div>
      <!-- /.modal-content -->
    </div>
  </div>

  <div class="modal fade" id="modal-default2">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title">Ubah Surat Keluar</h4>
        </div>
        <div class="modal-body">
            <form method="post" action="{{route('suratkeluar.store')}}">
                @csrf
                <input type="hidden" name="id" id="id">
                <div class="form-group">
                  <label>Pemohon</label>
                  <input type="text" id="pemohon" class="form-control" placeholder="Pemohon" name="pemohon" required>
                </div>
                <div class="form-group">
                  <label>Keterangan</label>
                  <input type="text" id="keterangan" class="form-control" placeholder="Keterangan" name="keterangan">
                </div>
              <!-- /.card-body -->

              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </form>
        </div>  
      </div>
      <!-- /.modal-content -->
    </div>
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

    $('.edit').click(function(){
        var id = $(this).attr('data-id');
        url = '{{route('suratkeluar.edit',":id")}}';
        url = url.replace(':id', id);
        _token = $('input[name=_token]').val();
        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: url,
        })
        .done(function(response) {
            console.log(response)
            $('#id').val(response.id)
            $('#pemohon').val(response.pemohon)
            $('#keterangan').val(response.keterangan)
            $('#modal-default2').modal('show');
        })
        .fail(function(){
            $.alert("error");
            return;
        })
        .always(function() {
            console.log("complete");
        });
    })

    $('.surat').change(function(){
      if($(this).val() == "Lainnya"){
        $('.input-tambahan').append(`
        <div class="form-group">
                  <label>Nama Surat</label>
                  <input type="text" class="form-control" placeholder="Nama Surat" name="nama_surat" required>
                </div>
                <div class="form-group">
                  <label>Kode Surat</label>
                  <input type="text" class="form-control" placeholder="Kode Surat" name="kode_surat" required>
                </div>
        `)
      }
      else{
        $('.input-tambahan').empty();
      }
    })
 })
</script>
@endsection