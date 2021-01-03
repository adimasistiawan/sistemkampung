@extends('template')
@section('title')
    Home | Kampung Notoharjo
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
              src="{{asset('header/header.jpg')}}"
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
        <div class="col-lg-3 stretch-card grid-margin">
          <div class="card">
            <div class="card-body">
              <h2>Menu</h2>
              <ul class="vertical-menu">
                <li><a href="#">Berita</a></li>
                <li><a href="#">Profil</a></li>
                <li><a href="#">Data Umum</a></li>
                <li><a href="#">Lembaga</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-lg-9 stretch-card grid-margin">
          <div class="card">
            <div class="card-body">
            @foreach ($berita as $item)
            <div class="row">
                <div class="col-sm-4 grid-margin">
                  <div class="position-relative">
                    <div class="rotate-img">
                      <img
                        src="{{asset('image_berita/'.$item->foto)}}"
                        alt="thumb"
                        class="img-fluid" width="200px" height="200px"
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
                    {{$item->tanggal}}
                  </div>
                  <p class="mb-0">
                    {!!  \Illuminate\Support\Str::limit($item->isi,150,'...') !!}
                  </p>
                </div>
              </div>
            </div>
            @endforeach
              
          </div>
        </div>
      </div>
      <div class="row" data-aos="fade-up">
        <div class="col-sm-12 grid-margin">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-lg-8">
                  <div class="card-title">
                    Video
                  </div>
                  <div class="row">
                    <div class="col-sm-6 grid-margin">
                      <div class="position-relative">
                        <div class="rotate-img">
                          <img
                            src="assets/images/dashboard/home_7.jpg"
                            alt="thumb"
                            class="img-fluid"
                          />
                        </div>
                        <div class="badge-positioned w-90">
                          <div
                            class="d-flex justify-content-between align-items-center"
                          >
                            <span
                              class="badge badge-danger font-weight-bold"
                              >Lifestyle</span
                            >
                            <div class="video-icon">
                              <i class="mdi mdi-play"></i>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-6 grid-margin">
                      <div class="position-relative">
                        <div class="rotate-img">
                          <img
                            src="assets/images/dashboard/home_8.jpg"
                            alt="thumb"
                            class="img-fluid"
                          />
                        </div>
                        <div class="badge-positioned w-90">
                          <div
                            class="d-flex justify-content-between align-items-center"
                          >
                            <span
                              class="badge badge-danger font-weight-bold"
                              >National News</span
                            >
                            <div class="video-icon">
                              <i class="mdi mdi-play"></i>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6 grid-margin">
                      <div class="position-relative">
                        <div class="rotate-img">
                          <img
                            src="assets/images/dashboard/home_9.jpg"
                            alt="thumb"
                            class="img-fluid"
                          />
                        </div>
                        <div class="badge-positioned w-90">
                          <div
                            class="d-flex justify-content-between align-items-center"
                          >
                            <span
                              class="badge badge-danger font-weight-bold"
                              >Lifestyle</span
                            >
                            <div class="video-icon">
                              <i class="mdi mdi-play"></i>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-6 grid-margin">
                      <div class="position-relative">
                        <div class="rotate-img">
                          <img
                            src="assets/images/dashboard/home_10.jpg"
                            alt="thumb"
                            class="img-fluid"
                          />
                        </div>
                        <div class="badge-positioned w-90">
                          <div
                            class="d-flex justify-content-between align-items-center"
                          >
                            <span
                              class="badge badge-danger font-weight-bold"
                              >National News</span
                            >
                            <div class="video-icon">
                              <i class="mdi mdi-play"></i>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div
                    class="d-flex justify-content-between align-items-center"
                  >
                    <div class="card-title">
                      Latest Video
                    </div>
                    <p class="mb-3">See all</p>
                  </div>
                  <div
                    class="d-flex justify-content-between align-items-center border-bottom pb-2"
                  >
                    <div class="div-w-80 mr-3">
                      <div class="rotate-img">
                        <img
                          src="assets/images/dashboard/home_11.jpg"
                          alt="thumb"
                          class="img-fluid"
                        />
                      </div>
                    </div>
                    <h3 class="font-weight-600 mb-0">
                      Apple Introduces Apple Watch
                    </h3>
                  </div>
                  <div
                    class="d-flex justify-content-between align-items-center border-bottom pt-3 pb-2"
                  >
                    <div class="div-w-80 mr-3">
                      <div class="rotate-img">
                        <img
                          src="assets/images/dashboard/home_12.jpg"
                          alt="thumb"
                          class="img-fluid"
                        />
                      </div>
                    </div>
                    <h3 class="font-weight-600 mb-0">
                      SEO Strategy & Google Search
                    </h3>
                  </div>
                  <div
                    class="d-flex justify-content-between align-items-center border-bottom pt-3 pb-2"
                  >
                    <div class="div-w-80 mr-3">
                      <div class="rotate-img">
                        <img
                          src="assets/images/dashboard/home_13.jpg"
                          alt="thumb"
                          class="img-fluid"
                        />
                      </div>
                    </div>
                    <h3 class="font-weight-600 mb-0">
                      Cycling benefit & disadvantag
                    </h3>
                  </div>
                  <div
                    class="d-flex justify-content-between align-items-center border-bottom pt-3 pb-2"
                  >
                    <div class="div-w-80 mr-3">
                      <div class="rotate-img">
                        <img
                          src="assets/images/dashboard/home_14.jpg"
                          alt="thumb"
                          class="img-fluid"
                        />
                      </div>
                    </div>
                    <h3 class="font-weight-600">
                      The Major Health Benefits of
                    </h3>
                  </div>
                  <div
                    class="d-flex justify-content-between align-items-center pt-3"
                  >
                    <div class="div-w-80 mr-3">
                      <div class="rotate-img">
                        <img
                          src="assets/images/dashboard/home_15.jpg"
                          alt="thumb"
                          class="img-fluid"
                        />
                      </div>
                    </div>
                    <h3 class="font-weight-600 mb-0">
                      Powerful Moments of Peace
                    </h3>
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