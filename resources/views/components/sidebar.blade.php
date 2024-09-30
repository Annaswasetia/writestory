<a href="index.html" class="logo d-flex align-items-center">
    <!-- Uncomment the line below if you also wish to use an image logo -->
    <!-- <img src="assets/img/logo.png" alt=""> -->
    <h1 class="sitename">WriteaStory</h1>
  </a>

  <nav id="navmenu" class="navmenu">
    <ul>
      <li><a href="index.html" class="active">Home</a></li>
      <li><a href="about.html">About</a></li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('karya.index') }}">Karya</a>
    </li>
    <li class="dropdown"><a href="#"><span>Category</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
      <ul>
        <li><a href="#">Cerpen</a></li>
        <li><a href="#">Puisi</a></li>
      </ul>
    </li>
    </ul>
    <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
  </nav>