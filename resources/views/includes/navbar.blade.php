<nav class="navbar navbar-expand-lg navbar-dark bg-success">
    <div class="container">
      <a class="navbar-brand" href="{{ url('/') }}"><i class="fa-solid fa-bag-shopping me-1"></i> Ecommerce</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        {{-- links --}}
        <ul class="navbar-nav mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          @if(count($categories) > 0)
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Kategoriler
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                @foreach ($categories as $category)
                  <li><a class="dropdown-item" href="#">{{ $category->name }}</a></li>
                @endforeach
              </ul>
            </li>
          @endif
        </ul>

        {{-- auth --}}
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          @admin
            <li class="nav-item">
              <a href="{{ url('/admin') }}" class="nav-link">Admin</a>
            </li>
          @endadmin
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              @auth
                {{ Auth::user()->username }}
              @else
                <i class="fas fa-user"></i>
              @endauth
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
              @auth
                <li><a class="dropdown-item" href="{{ url('/profil') }}">Profilim</a></li>
                <li>
                  <a class="dropdown-item" href="javascript:;" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Çıkış Yap</a>
                  <form id="logout-form" action="{{ url('/cikis-yap') }}" method="POST" class="d-none">@csrf</form>
                </li>
              @else
                <li><a class="dropdown-item" href="{{ url('/giris-yap') }}">Giriş Yap</a></li>
                <li><a class="dropdown-item" href="{{ url('/kayit-ol') }}">Kayıt Ol</a></li>
              @endauth
            </ul>
          </li>
        </ul>

        {{-- search form --}}
        <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-light" type="submit">Ara</button>
        </form>
      </div>
    </div>
</nav>