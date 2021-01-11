@extends('template')
@section('title')
    Visi dan Misi | Kampung Notoharjo
@endsection
@section('css')
    <style>
      .link{
        
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
                    <h3>Visi dan Misi</h3>
                </div>
            </div>
            <div class="card-body">
            
                <div class="row">
                    <div class="col-sm-12 grid-margin">
                        <h2>Visi</h2>
                        {!! $data['visi'] !!}
                        <br>
                        <br>
                        <h2>Misi</h2>
                        {!! $data['misi'] !!}
                    </div>
                
                </div>
            </div>
          </div>
        </div>

        
      </div>
  </div>
</div>
  
@endsection