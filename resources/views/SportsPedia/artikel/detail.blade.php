@extends('SportsPedia.frontend')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-lg-8 mt-3">
                <h2>{{ $artikel->judul }}</h2>
                <div class="div">
                    <img src="{{ asset('uploads/' . $artikel->gambar_artikel ) }}" class="img-fluid">
                </div>
                <div class="detail-content mt-2 p-4">
                    <div class="detail-badge">
                        <a href="{{ route('cabor.spesific', $artikel->kategori->slug) }}" class="badge badge-warning">{{ $artikel->kategori->nama }}</a>
                        <a href="{{ route('author.user', $artikel->users->name) }}" class="badge badge-primary">{{ $artikel->users->name }}</a>
                    </div>
                    <div class="detail-body">
                        <p>
                            {!! $artikel->body !!}
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mt-3">
                <div class="detail-artikel-terkait">
                    <h4>Artikel Lainnya</h4>
                    <hr>
                    @foreach ($postNew as $pN)
                    <div class="media">
                        <img src="{{ asset('uploads/' . $pN->gambar_artikel) }}" width="50px" class="mr-3" alt="...">
                        <div class="media-body">
                          <a href="{{ route('detail', $pN->slug) }}" style="text-decoration: none"><h6 class="mt-0">{{ $pN->judul }}</h6></a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    
@endsection