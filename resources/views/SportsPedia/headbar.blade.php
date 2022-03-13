<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="/">SportsPedia</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
  
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Cabang Olahraga
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    @foreach ($kategori as $kat)
                        <a class="dropdown-item" href="{{ route('cabor.spesific', $kat->slug) }}">{{ $kat->nama }}</a>
                    @endforeach
                </div>
                </li>
            </ul>
            
            <ul class="navbar-nav ms-auto">
                @auth

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Welcome Back, {{ auth()->user()->name }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <li><a class="dropdown-item" href="/home"><i class="bi bi-clipboard2-data-fill"></i>Admin</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <form action="/logout" method="POST">
                          @csrf
                        <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i>Logout</button>
                      </form>
                    </ul>
                </li>

                @else
            
                    <li class="nav-item">
                        <a href="/login" class="nav-link"><i class="bi bi-box-arrow-in-right"></i>Login</a>
                    </li>
                
                @endauth
            </ul>
                
        </div>
    </div>
</nav>