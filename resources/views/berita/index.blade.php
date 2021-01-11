@extends('template')
@section('title')
    Berita | Kampung Notoharjo
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
        
        <div class="col-lg-12 stretch-card grid-margin">
          <div class="card">
            <div class="card-header">
                <div class="card-title">
                    <h3>Semua Berita</h3>
                </div>
            </div>
            <div class="card-body">
            @foreach ($berita as $item)
            
            <div class="row">
              <div class="col-sm-3 grid-margin">
                <div class="position-relative">
                  <div class="rotate-img">
                    <img
                      src="{{asset('image_berita/'.$item->foto)}}"
                      alt="thumb"
                      height="150px" width="200px"
                    />
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
            
            {{ $berita->links() }}
            </div>
          </div>
        </div>
      </div>
  </div>
</div>
  
@endsection