@extends('template')
@section('title')
    Home | Kampung Notoharjo
@endsection
@section('css')
    <style>
      .link{
        
      }
    </style>
@endsection
@section('content')
<div class="flash-news-banner">
    <div class="container">
      <div class="d-lg-flex align-items-center justify-content-between">
        <div class="d-flex align-items-center">
          <span class="badge badge-dark mr-3">Terbaru</span>
          <p class="mb-0">
              {{$berita[0]->judul}}
          </p>
        </div>
        <div class="d-flex">
          <span class="mr-3 text-danger">{{$berita[0]->tanggal}}</span>
        </div>
      </div>
    </div>
  </div>
<div class="content-wrapper">
    <div class="container">
      <div class="row" data-aos="fade-up">
        <div class="col-xl-12 stretch-card grid-margin">
          <div class="position-relative">
            <img
              src="{{asset('header/'.$data['foto_header'])}}"
              alt="banner"
              class="img-fluid"
            />
            <div class="banner-content ">
              
              <h1 class="mb-0">SELAMAT DATANG DI WEBSITE KAMPUNG NOTOHARJO</h1>
              
            </div>
          </div>
        </div>
        
      </div>
      <div class="row" data-aos="fade-up">
        
        <div class="col-lg-9 stretch-card grid-margin">
          <div class="card">
            <div class="card-body">
              @if(count($berita) == 0)
              <span class="text-center">Tidak ada berita</span>
              @endif
            @foreach ($berita as $item)
            
            <div class="row">
              <div class="col-sm-4 grid-margin">
                <div class="position-relative">
                  <div class="rotate-img">
                    <img
                      src="{{asset('image_berita/'.$item->foto)}}"
                      alt="thumb"
                      height="150px" width="200px"
                    />
                  </div>
                  <div class="badge-positioned">
                    <span class="badge badge-danger font-weight-bold"
                      >Terbaru</span
                    >
                  </div>
                </div>
              </div>
              <div class="col-sm-8  grid-margin">
                <h2 class="mb-2 font-weight-600">
                  {{$item->judul}}
                </h2>
                <div class="fs-13 mb-2">
                  <span class="mr-2">{{date('d-m-Y',strtotime($item->created_at))}} </span>
                </div>
                <p class="mb-0">
                  {!!  \Illuminate\Support\Str::limit($item->isi,150,'...') !!}
                </p>
                <a href="{{route('berita.detail',$item->id)}}">
                  <h4 class="mb-2 font-weight-600">
                    Selengkapnya
                  </h4>
                </a>
              </div>
            </div> 
          
            @endforeach
            </div>

            
             
          </div>
        </div>
        <div class="col-lg-3  grid-margin">
          <div class="card">
            <div class="card-body">
              <h2>Menu</h2>
              <ul class="vertical-menu">
                <li><a href="{{route('berita')}}">Berita</a></li>
                <li><a href="#">Profil</a></li>
                <li><a href="#">Data Umum</a></li>
                <li><a href="#">Lembaga</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="row" data-aos="fade-up">
        <div class="col-sm-12 grid-margin">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-lg-12">
                  <div class="card-title">
                    Video
                  </div>
                  <div class="row">
                    @if(count($video) == 0)
                    <span class="text-center">Tidak ada video</span>
                    @endif
                    @foreach ($video as $item)
                    <div class="col-sm-4 grid-margin">
                      <div class="position-relative">
                        <div class="rotate-img">
                          <a href="{{route('berita.detail',$item->id)}}">
                          <video
                            src="{{asset('video_berita/'.$item->video)}}"
                            alt="thumb"
                            class="img-fluid"
                          >
                          </video>
                        </a>
                        </div>
                        <div class="badge-positioned w-90">
                          <div
                            class="d-flex justify-content-between align-items-center"
                          >
                            <span
                              class="badge badge-danger font-weight-bold"
                              >Terbaru</span
                            >
                            <div class="video-icon">
                              <i class="mdi mdi-play"></i>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    @endforeach
                    

                    
                  </div>
                  
                </div>
                
              </div>
            </div>
          </div>
        </div>
      </div>
      
    </div>
  </div>
  
@endsection