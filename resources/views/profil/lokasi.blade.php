@extends('template')
@section('title')
    Lokasi | Kampung Notoharjo
@endsection
@section('css')
    <style>
      .iframe-container{
            position: relative;
            width: 100%;
            padding-bottom: 56.25%; /* Ratio 16:9 ( 100%/16*9 = 56.25% ) */
        }
        .iframe-container > *{
            display: block;
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            margin: 0;
            padding: 0;
            height: 100%;
            width: 100%;
        }
    </style>
@endsection
@section('content')

<div class="content-wrapper">
    <div class="container">
      <div class="row" data-aos="fade-up">
        <div class="col-lg-3  grid-margin">
            <div class="card">
              <div class="card-body">
                <h2>Sub Menu</h2>
                <ul class="vertical-menu">
                  <li><a href="{{route('profil.sejarah')}}">Sejarah</a></li>
                  <li><a href="{{route('profil.visimisi')}}">Visi dan Misi</a></li>
                  <li><a href="{{route('profil.struktur')}}">Struktur Organisasi</a></li>
                  <li><a href="{{route('profil.lokasi')}}">Lokasi</a></li>
                </ul>
              </div>
            </div>
        </div>
        <div class="col-lg-9 stretch-card grid-margin">
          <div class="card">
            <div class="card-header">
                <div class="card-title">
                    <h3> Lokasi</h3>
                </div>
            </div>
            <div class="card-body">
            
                <div class="row">
                    <div class="col-sm-12 grid-margin">
                        <div class="iframe-container">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15895.03332010917!2d105.22339471945588!3d-5.14256151886548!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e40b9e863bae1ef%3A0xbd27687182ed95c9!2sNotoharjo%2C%20Trimurjo%2C%20Kabupaten%20Lampung%20Tengah%2C%20Lampung!5e0!3m2!1sid!2sid!4v1610114355662!5m2!1sid!2sid" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                    
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