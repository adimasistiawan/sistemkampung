@extends('template')
@section('title')
    {{$berita->judul}} | Kampung Notoharjo
@endsection
@section('css')
    <style>
      .img-fluid{
        height: 300px !important;
      }
    </style>
@endsection
@section('content')

<div class="content-wrapper">
    <div class="container">
      <div class="row" data-aos="fade-up">
        
        <div class="col-lg-12 stretch-card grid-margin">
          <div class="card">
            <div class="card-header">
                <div class="card-title">
                    <h3>{{date('d-m-Y',strtotime($berita->created_at))}}</h3>
                </div>
                
            </div>
            <div class="card-body">
            
            <div class="row">
              <div class="col-sm-12 grid-margin">
                
                <h2 class="mb-2 font-weight-600">
                    {{$berita->judul}}
                </h2>
                <br>
                <div class="row">
                  
                  <div class="col-md-5">
                    <img
                      src="{{asset('image_berita/'.$berita->foto)}}"
                      alt="thumb"
                      height="300px" width="400px"
                      class="img-fluid" 
                    />
                  </div>
                  <div class="col-md-6">
                    @if($berita->video != null)
                    <video controls class="video img-fluid"  width="400px" height="300px" src="{{asset('video_berita/'.$berita->video)}}">
                    </video>
                    @endif
                  </div>
                </div>
                
                
                <br>
                <br>
                {{date('d-m-Y',strtotime($berita->tanggal))}}, Ditulis oleh <b>{{$berita->dibuat_oleh}}</b>
                <br>
                <br>
                
                {!! $berita->isi !!}
                <br>
                <br>
                {{-- Bagikan : --}}
              </div>
              {{-- <ul class="social-media mb-3">
                <li>
                  <a href="http://www.facebook.com/sharer.php?u={{route('berita.detail',$berita->id)}}">
                    <i class="mdi mdi-facebook"></i>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <i class="mdi mdi-youtube"></i>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <i class="mdi mdi-twitter"></i>
                  </a>
                </li>
              </ul> --}}
              
            </div>
            </div>
          </div>
        </div>
      </div>
  </div>
</div>
  
@endsection