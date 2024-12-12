<header id="header" class="header fixed-top">
    <div class="branding d-flex align-items-center">
        <div class="container position-relative d-flex align-items-center justify-content-between">
            <a class="logo d-flex align-items-center">
                <h1 class="sitename"> ✨WriteStory✨</h1>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a></li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('karya.index') ? 'active' : '' }}" href="{{ route('karya.index') }}">Karya</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('pages.cerpen.index') ? 'active' : '' }}" href="{{ route('pages.cerpen.index') }}">Cerpen</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('pages.puisi.index') ? 'active' : '' }}" href="{{ route('pages.puisi.index') }}">Puisi</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdownProfile" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Profil
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownProfile">
                            <li>
                                <a class="dropdown-item {{ request()->routeIs('profile') || request()->routeIs('profileadmin') ? 'active' : '' }}" 
                                   href="{{ Auth::check() && Auth::user()->role === 'admin' ? route('profileadmin') : route('profile') }}">
                                   Profil Saya
                                </a>
                            </li>
                            <li><a class="dropdown-item {{ request()->routeIs('login') ? 'active' : '' }}" href="{{ route('login') }}">Login</a></li>
                            <li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>
        </div>
    </div>
</header>