@extends('admin.template')
@section('title')
    Laporan Kependudukan | Kampung Notoharjo
@endsection

@section('css')
    
@endsection

@section('content')
<div class="content-wrapper">
    <section class="content-header">
      <h1>
        Laporan Kependudukan
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> Home</a></li>
        <li class="active">Laporan Kependudukan</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Laporan Kependudukan</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-3">
                    @csrf
                    <div class="form-group">
                      <label  >RT</label>
                      <select  id="rt" class="form-control input" name="rt" required>
                        <option value="001">001</option>
                        <option value="002">002</option>
                        <option value="003">003</option>
                        <option value="004">004</option>
                        <option value="005">005</option>
                        <option value="006">006</option>
                        <option value="007">007</option>
                        <option value="008">008</option>
                        <option value="009">009</option>
                        <option value="010">010</option>
                        <option value="011">011</option>
                        <option value="012">012</option>
                        <option value="013">013</option>
                        <option value="014">014</option>
                        <option value="015">015</option>
                        <option value="016">016</option>
                        <option value="017">017</option>
                        <option value="018">018</option>
                        <option value="020">020</option>
                        <option value="021">021</option>
                        <option value="022">022</option>
                        <option value="023">023</option>
                        <option value="024">024</option>
                        <option value="025">025</option>
                      </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                      <label  >RW</label>
                      <select  id="rw" class="form-control input" name="rw" required>
                        <option value="001">001</option>
                        <option value="002">002</option>
                        <option value="003">003</option>
                        <option value="004">004</option>
                        <option value="005">005</option>
                        <option value="006">006</option>
                        <option value="007">007</option>
                        <option value="008">008</option>
                        <option value="009">009</option>
                        <option value="010">010</option>
                        <option value="011">011</option>
                        <option value="012">012</option>
                        <option value="013">013</option>
                        <option value="014">014</option>
                      </select>
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
                <u><h2 class="text-center">DATA PENDUDUK</h2></u>
                <table>
                    <tr>
                        <td width="100px"><b>DUSUN</b></td>
                        <td width="15px">:</td>
                        <td>1 - 6</td>
                    </tr>
                    <tr>
                        <td><b>RT/RW</b></td>
                        <td>:</td>
                        <td><span class="rt_rw"></span></td>
                    </tr>
                    <tr>
                        <td><b>KAMPUNG</b></td>
                        <td>:</td>
                        <td>NOTOHARJO</td>
                    </tr>
                </table>
                <table class="table table-bordered" width="100%">
                    <thead>
                        <tr>
                            <th width="15px" rowspan="2">NO</th>
                            <th class="text-center" width="200px" rowspan="2">NAMA</th>
                            <th class="text-center" width="180px" rowspan="2">NIK</th>
                            <th class="text-center" width="100px" colspan="2">JENIS KELAMIN</th>
                            <th class="text-center" width="130px" rowspan="2">HDK</th>
                            <th class="text-center" width="200px" rowspan="2">TEMPAT TGL LAHIR</th>
                            <th class="text-center" width="180px" rowspan="2">NO KK</th>
                            <th class="text-center" width="50px" rowspan="2">AGAMA</th>
                        </tr>
                        <tr>
                            
                            <th class="text-center">L</th>
                            <th class="text-center">P</th>
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
        
        rt = $('#rt').val()
        rw = $('#rw').val()

        if(rt=="" || rw==""){
            $.alert('Mohon lengkapi parameter !');
            return;
        }
        $('.loading').removeAttr('hidden')
        $('.rt').text(rt)
        $('.rw').text(rw)
        var url = "{{route('laporan.kependudukan.pdf',['rt' => ':rt','rw' => ':rw'])}}";
        
        url = url.replace(':rw', rw);
        url = url.replace(':rt', rt);
        $('.pdf').append(
            `<a href="`+url+`" target="blank" class="btn btn-success"><i class="fa fa-download"></i> PDF</a>`
          )

        $('.tbody').empty();
        $('.report').removeAttr('hidden')
        var urlsnya='{{route('laporan.kependudukan.submit')}}';
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
            $('.rt_rw').text(response['rt_rw'])
            var no = 1;
            
            $.each(response['data'],function(k,value){
              
              
              $('.tbody').append(`
              <tr>
                <td>`+no+`</td>
                <td>`+value['nama']+`</td>
                <td>`+value['nik']+`</td>
                <td>
                  `+(value['jenis_kelamin']=="Laki-laki"? "L":"")+`
                </td>
                <td>
                  `+(value['jenis_kelamin']=='Perempuan'? 'P':'')+`
                </td>
                <td>`+value['status_keluarga']+`</td>
                <td>`+value['tempat_lahir']+` / `+$.datepicker.formatDate( "dd/mm/yy", new Date(value['tanggal_lahir']))+`</td>
                <td>`+value['no_kk']+`</td>
                <td>`+value['agama']+`</td>
                
            </tr>
              `)
              no++;
              $('.loading').attr('hidden',true)
            });
          }
          else{
            $('.rt_rw').text(response['rt_rw'])
            $('.tbody').append(`
              <tr>
                  <td colspan="9" class="text-center">Data Tidak Ada</td>
                  
              </tr>
              `)
              
          }
          
          $('.loading').attr('hidden',true)
        })
        
      })
 })
</script>
@endsection