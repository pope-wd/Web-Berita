@extends('SportsPedia.frontend')

@section('content')
    <div class="container">
        <div class="row">
            @forelse ($artikel as $art)
            
            <div class="col-md-4 mt-3">
                <div class="card">
                    <img src="{{ asset('uploads/' . $art->gambar_artikel) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">
                            <a href="{{ route('detail', $art->slug) }}" style="text-decoration: none">
                                {{ $art->judul }}
                            </a>
                      </h5>
                      <p class="card-text">{!! $art->excerpt !!}</p>
                    </div>
                    <div class="card-body">
                      <a href="{{ route('author.user', $art->users->name) }}" class="card-link">{{ $art->users->name }}</a>
                      <a href="{{ route('cabor.spesific', $art->kategori->slug) }}" class="card-link">{{ $art->kategori->nama }}</a>
                    </div>
                </div>
            </div>
    
            @empty
                
            @endforelse
        </div>
    </div>
@endsection