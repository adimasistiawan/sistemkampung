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
                              <th >Warga</th>
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
                              <td>{{$item->warga->nama}}</td>
                              <td>{{date('d-m-Y',strtotime($item->tanggal))}}</td>
                              <td>{{$item->nomor_surat}}</td>
                              <td>{{$item->perihal}}</td>
                              <td>{{$item->keterangan}}</td>
                              <td>
                                  <a href="{{route('suratkeluar.pdf',['perihal'=>$item->perihal,'id'=>$item->id,'watermark'=>0])}}" target="blank" class="btn btn-success"><i class="fa fa-download"></i> PDF</a>
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
                                <th class="text-center">Warga</th>
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
                                <td>{{$item->warga->nama}}</td>
                                <td>{{date('d-m-Y',strtotime($item->tanggal))}}</td>
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
            <form method="post" action="{{route('pekerjaan.store')}}">
                @csrf
                <div class="form-group">
                  <label>Perihal</label>
                  <select name="surat" class="form-control surat" required>
                    <option value="">--Pilih Surat--</option>
                    <option value="Surat Keterangan Pengantar">Surat Keterangan Pengantar</option>
                    <option value="Surat Keterangan Pindah">Surat Keterangan Pindah</option>
                    <option value="Surat Keterangan Kurang Mampu">Surat Keterangan Kurang Mampu</option>
                    <option value="Surat Keterangan Kelahiran">Surat Keterangan Kelahiran</option>
                    <option value="Surat Keterangan Kematian">Surat Keterangan Kematian</option>
                    <option value="Surat Keterangan Usaha">Surat Keterangan Usaha</option>
                    <option value="Surat Keterangan Ahli Waris">Surat Keterangan Ahli Waris</option>
                    <option value="Surat Keterangan Tanah">Surat Keterangan Tanah</option>
                    <option value="Surat Keterangan Nikah">Surat Keterangan Nikah</option>
                    <option value="Surat Keterangan Jual Beli">Surat Keterangan Jual Beli</option>
                    <option value="Surat Keterangan KK">Surat Keterangan KK</option>
                    <option value="Surat Keterangan SKCK">Surat Keterangan SKCK</option>
                    <option value="Surat Keterangan Kuasa">Surat Keterangan Kuasa</option>
                    <option value="Surat Keterangan Izin Penelitian">Surat Keterangan Izin Penelitian</option>
                    <option value="Surat Pernyataan Hiburan">Surat Pernyataan Hiburan</option>
                    <option value="Surat Keterangan Mengurus Orang Tua">Surat Keterangan Mengurus Orang Tua</option>
                    <option value="Surat Keterangan Kehilangan">Surat Keterangan Kehilangan</option>
                    <option value="Surat Keterangan Jalan">Surat Keterangan Jalan</option>
                    <option value="Lainnya">Lainnya</option>
                </select>
              </div>
              <div class="input-tambahan" hidden>
                <div class="form-group">
                  <label>Nama Surat</label>
                  <input type="text" class="form-control" placeholder="Nama Surat" name="nama_surat" required>
                </div>
                <div class="form-group">
                  <label>Kode Surat</label>
                  <input type="text" class="form-control" placeholder="Kode Surat" name="kode_surat" required>
                </div>
              </div>
              <div class="form-group">
                <label>Tanggal</label>
                <input type="text" class="form-control" placeholder="Tanggal" name="tanggal" required>
              </div>
              <div class="form-group">
                <label>Penanggung Jawab</label>
                <input type="text" class="form-control" placeholder="Penanggung Jawab" name="penanggung_jawab" required>
              </div>
              <div class="form-group">
                <label>Keterangan</label>
                <input type="text" class="form-control" placeholder="Keterangan" name="keterangan" required>
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

{{-- @foreach ($data as $item)
<div class="modal fade" id="modal-default{{$item->id}}">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title">Ubah Pekerjaan</h4>
        </div>
        <div class="modal-body">
            <form method="post" action="{{route('pekerjaan.update',$item->id )}}">
                @csrf
                @method('PUT')
                
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" class="form-control" placeholder="Nama" name="nama" value="{{$item->nama}}" required>
                </div>
                <div class="form-group">
                  <label>Warna</label>
  
                  <div class="input-group my-colorpicker2">
                    <input type="text" class="form-control my-colorpicker1" name="warna" value="{{$item->warna}}">
  
                    <div class="input-group-addon">
                      <i></i>
                    </div>
                  </div>
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
  <!-- /.modal -->  
@endforeach --}}
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

    $('.surat').change(function(){
      if($(this).val() == "Lainnya"){
        $('.input-tambahan').removeAttr('hidden');
      }
      else{
        $('.input-tambahan').prop('hidden',true);
      }
    })
 })
</script>
@endsection