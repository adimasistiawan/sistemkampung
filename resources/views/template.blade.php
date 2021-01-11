<!DOCTYPE html>
<html lang="zxx">
  <head>
    <!-- Required meta tags -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>@yield('title')</title>
    <!-- plugin css for this page -->
    <link
      rel="stylesheet"
      href="{{asset('assets/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/aos/dist/aos.css/aos.css')}}">

    <!-- End plugin css for this page -->
    <link rel="shortcut icon" href="{{asset('logo.png')}}">

    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <!-- endinject -->
    @yield('css')
  </head>

  <body>
    <div class="container-scroller">
      <div class="main-panel">
        <!-- partial:partials/_navbar.html -->
        <header id="header">
          <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
                
              {{-- <div class="navbar-top">
                <div class="d-flex justify-content-between align-items-center">
                    
                  <ul class="navbar-top-left-menu navbar-nav mr-auto">
                    <li class="nav-item">
                    &nbsp; &nbsp;
                    </li>
                    
                  </ul>
                  <ul class="navbar-top-right-menu">
                    <li class="nav-item">
                      <a href="#" class="nav-link"></i></a>
                    </li>
                    <li class="nav-item">
                      <a href="#" class="nav-link">Login</a>
                    </li>
                    <li class="nav-item">
                      <a href="#" class="nav-link">Daftar</a>
                    </li>
                  </ul>
                </div>
              </div> --}}
              <div class="navbar-bottom">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="row" style="margin-top: 20px">
                        <div class="col-md-2">
                            <a style="text-decoration: none" href="{{route('index')}}"
                            ><img src="{{asset('logo.png')}}" alt="" width="50px" height="50px"
                        />&nbsp;</a>
                        </div>
                        
                        <div class="col-md-10">
                        <a style="text-decoration: none" href="{{route('index')}}"
                            >KAMPUNG NOTOHARJO <br> Kec. Trimurjo, Kab. Lampung Tengah</a>
                        </div>
                    </div>
                  <div>
                    <button
                      class="navbar-toggler"
                      type="button"
                      data-target="#navbarSupportedContent"
                      aria-controls="navbarSupportedContent"
                      aria-expanded="false"
                      aria-label="Toggle navigation"
                    >
                      <span class="navbar-toggler-icon"></span>
                    </button>
                    <div
                      class="navbar-collapse justify-content-center collapse"
                      id="navbarSupportedContent"
                    >
                      <ul
                        class="navbar-nav d-lg-flex justify-content-between align-items-center"
                      >
                        <li>
                          <button class="navbar-close">
                            <i class="mdi mdi-close"></i>
                          </button>
                        </li>
                        <li class="nav-item">
                        <a href="{{route('index')}}" class="nav-link">Beranda</a>
                    </li>
                        <li class="nav-item">
                        <a href="{{route('berita')}}" class="nav-link">Berita</a>
                        </li>
                        
                        <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Profil
                          </a>
                          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{route('profil.sejarah')}}">Sejarah</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{route('profil.visimisi')}}">Visi dan Misi</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{route('profil.struktur')}}">Struktur Organisasi</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{route('profil.lokasi')}}">Lokasi</a>
                          </div>
                        </li>
                        <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Data Umum
                          </a>
                          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{route('data.penduduk')}}">Penduduk</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{route('data.kepalakeluarga')}}">Kepala Keluarga</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{route('data.pekerjaan')}}">Pekerjaan</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{route('data.pendidikan')}}">Pendidikan</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{route('data.agama')}}">Agama</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{route('data.umur')}}">Umur</a>
                          </div>
                        </li>
                        <li class="nav-item">
                        <a href="#" class="nav-link">Lembaga</a>
                        </li>
                        <li class="nav-item">
                          &nbsp;
                        </li>
                        
                        @if (Auth::guard('warga')->user() == null)
                        <li class="nav-item">
                          <a href="{{route('login.warga')}}" class="nav-link btn btn-outline-info">
                            MASUK
                          </a>
                        </li>
                        <li class="nav-item">
                          &nbsp;
                        </li>
                        <li class="nav-item">
                          <a href="{{route('daftar')}}" class="nav-link btn btn-outline-info">
                            DAFTAR
                          </a>
                        </li>
                        @else
                        <li class="nav-item">
                          <a href="{{route('profil.warga')}}" class="nav-link btn btn-outline-info">
                            Akun
                          </a>
                        </li>
                        <li class="nav-item">
                          &nbsp;
                        </li>
                        <li class="nav-item">
                          <a href="{{route('logout.warga')}}" class="nav-link btn btn-outline-info">
                            Keluar
                          </a>
                        </li>
                        @endif
                        
                      </ul>
                      <ul class="social-media">
                        
                      </ul>
                    </div>
                  </div>
                  
                </div>
              </div>
            </nav>
          </div>
        </header>

        <!-- partial -->
        
       @yield('content')
        <!-- main-panel ends -->
        <!-- container-scroller ends -->

        <!-- partial:partials/_footer.html -->
        <footer>
          <div class="footer-top">
            <div class="container">
              <div class="row">
                <div class="col-sm-5">
                    <img src="{{asset('logo.png')}}" alt="" width="50px" height="50px"/>
                  <h5 class="font-weight-normal mt-4 mb-5">
                    KAMPUNG NOTOHARJO <br> Kec. Trimurjo, Kab. Lampung Tengah
                  </h5>
                  @php
                      $profil = \App\Pengaturan::all();
                      $data = json_decode($profil[0]->web, true);
                  @endphp 
                  <h5>{{$data['telepon']}}</h5>
                  <h5>{{$data['email']}}</h5>
                  {{-- <ul class="social-media mb-3">
                    <li>
                      <a href="#">
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
                <div class="col-sm-4">
                  
                </div>
                <div class="col-sm-3">
                  <h3 class="font-weight-bold mb-3">MENU</h3>
                  
                  <a href="{{route('index')}}" style="text-decoration: none; color:#fff;">
                    <div class="footer-border-bottom pb-2 pt-2">
                        <div class="d-flex justify-content-between align-items-center">
                        <h5 class="mb-0 font-weight-600">Beranda</h5>
                        </div>
                    </div>
                  </a>

                  <a href="{{route('berita')}}" style="text-decoration: none; color:#fff;">
                    <div class="footer-border-bottom pb-2 pt-2">
                        <div class="d-flex justify-content-between align-items-center">
                        <h5 class="mb-0 font-weight-600">Berita</h5>
                        </div>
                    </div>
                  </a>

                  <a href="{{route('profil.sejarah')}}" style="text-decoration: none; color:#fff;">
                    <div class="footer-border-bottom pb-2 pt-2">
                        <div class="d-flex justify-content-between align-items-center">
                        <h5 class="mb-0 font-weight-600">Profil</h5>
                        </div>
                    </div>
                  </a>

                  <a href="{{route('data.penduduk')}}" style="text-decoration: none; color:#fff;">
                    <div class="footer-border-bottom pb-2 pt-2">
                        <div class="d-flex justify-content-between align-items-center">
                        <h5 class="mb-0 font-weight-600">Data Umum</h5>
                        </div>
                    </div>
                  </a>

                  <a href="" style="text-decoration: none; color:#fff;">
                    <div class="footer-border-bottom pb-2 pt-2">
                        <div class="d-flex justify-content-between align-items-center">
                        <h5 class="mb-0 font-weight-600">Lembaga</h5>
                        </div>
                    </div>
                  </a>
                  
                </div>
              </div>
            </div>
          </div>
          <div class="footer-bottom">
            <div class="container">
              <div class="row">
                <div class="col-sm-12">
                  <div class="d-sm-flex justify-content-between align-items-center">
                    <div class="fs-14 font-weight-600">
                      © 2020 All rights reserved.
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </footer>

        <!-- partial -->
      </div>
    </div>
    <script src="{{asset('admin_asset/bower_components/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('assets/vendors/js/vendor.bundle.base.js')}}"></script>
    <script src="{{asset('assets/vendors/aos/dist/aos.js/aos.js')}}"></script>
    <script src="{{asset('assets/js/demo.js')}}"></script>
    @yield('js')
  </body>
</html>
