<header id="header" class="header fixed-top">

    <div class="branding d-flex align-items-cente">

        <div class="container position-relative d-flex align-items-center justify-content-between">

            <a href="index.html" class="logo d-flex align-items-center">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <!-- <img src="assets/img/logo.png" alt=""> -->
                <h1 class="sitename" style="color: #0dc225; font-weight: bold; font-size: 50px;">WriteStory</h1>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('karya.index') }}">Karya</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('pages.cerpen.index') }}">Cerpen</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('pages.puisi.index') }}">Puisi</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdownProfile" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Profil
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownProfile">
                            <li><a class="dropdown-item" href="{{ route('profile') }}">Profil Saya</a></li>
                            <li><a class="dropdown-item" href="{{ route('login') }}">Login</a></li>
                            <li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                            </li>
                            <!-- Opsi Logout -->
                        </ul>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>
        </div>

    </div>
</header>
