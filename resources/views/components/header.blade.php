<header id="header" class="header d-flex align-items-center sticky-top">
  <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

    <a href="index.html" class="logo d-flex align-items-center">
      <!-- Uncomment the line below if you also wish to use an image logo -->
      <!-- <img src="assets/img/logo.png" alt=""> -->
      <h1 class="sitename" style="color: #0dc225; font-weight: bold; font-size: 50px;">WriteStory</h1>
    </a>

    <nav id="navmenu" class="navmenu">
      <ul>
        <li><a href="{{ route('home') }}" class="active">Home</a></li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('karya.index') }}">Karya</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="">Cerpen</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="">Puisi</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('home') }}">Logout</a>
        </li>
      </ul>
      <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
    </nav>
  </div>
</header>