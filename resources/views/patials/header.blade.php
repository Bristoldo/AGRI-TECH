<header id="header" class="header d-flex align-items-center position-relative">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

      <a href="{{ route('index') }}" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        {{--  <img src="assets/img/logo.png" alt="AgriCulture">  --}}
         <h1 class="sitename">Agri-Tech</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="{{ route('index') }}" class="{{ Request::is('/') ? 'active' : '' }}">Accueil</a></li>
          <li><a href="#services" class="{{ Request::is('diagnostic') ? 'active' : '' }}">Nos Services</a></li>
          <li><a href="#">A propos</a></li>
          <li><a href="#">Connexion</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

    </div>
  </header>
