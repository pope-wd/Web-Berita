<div class="container">
    <div id="carouselExampleCaptions" class="carousel slide mt-3" data-ride="carousel">
        <div class="carousel-inner">
            @foreach ($artikel as $key => $art)
                @if ($art->slide == '1')
                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                    <img src="{{ asset('uploads/' . $art->gambar_artikel) }}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                      <a href="{{ route('detail', $art->slug) }}" style="text-decoration: none" class="text-light"><h5>{{ $art->judul }}</h5></a>
                      <p>{!! $art->excerpt !!}</p>
                    </div>
                </div>
                @endif
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
    </div>
</div>