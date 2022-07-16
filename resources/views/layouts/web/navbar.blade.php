<header class="navbar-light navbar-sticky">
    <nav class="navbar navbar-expand-xl">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img class="light-mode-item navbar-brand-item" src="/assets/images/logo.png" alt="logo">
                <img class="dark-mode-item navbar-brand-item" src="/assets/images/logo.png" alt="logo">
            </a>
            <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-animation">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
            </button>

            <div class="navbar-collapse collapse ms-2" id="navbarCollapse">
                <ul class="navbar-nav navbar-nav-scroll ms-auto">  
                    <li class="nav-item"><a class="nav-link  @yield('webAlumni')" href="/hamidu/alumni">Hamidu</a></li>
                    <li class="nav-item"><a class="nav-link  @yield('webKor')" href="/hamidu/kordinator">Kordinator</a></li>
                    <!--<li class="nav-item"><a class="nav-link  @yield('webAng')" href="/hamidu/angkatan">Angkatan</a></li>-->
                </ul>
            </div>
            

            <div class="dropdown ms-1 ms-lg-4">
                @if (Route::has('login'))
                    @auth
                        <a class="avatar avatar-sm p-0" href="#" id="profileDropdown" role="button"
                            data-bs-auto-close="outside" data-bs-display="static" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <img class="avatar-img rounded-circle" src="/assets/images/avatar/01.jpg" alt="avatar">
                        </a>
                        <ul class="dropdown-menu dropdown-animation dropdown-menu-end shadow pt-3"
                            aria-labelledby="profileDropdown">
                            <li class="px-3">
                                <div class="d-flex align-items-center">
                                    <div class="avatar me-3">
                                        <img class="avatar-img rounded-circle shadow" src="/assets/images/avatar/01.jpg"
                                            alt="avatar">
                                    </div>
                                    <div>
                                        <a class="h6 mt-2 mt-sm-0" href="#">{{ Auth::user()->name }}</a>
                                        <p class="small m-0">{{ Auth::user()->email }}</p>
                                    </div>
                                </div>
                                <hr>
                            </li>
                            <li><a class="dropdown-item" href="/home"><i
                                        class="bi bi-building fa-fw me-2"></i>Dashboard</a></li>
                            <li><a class="dropdown-item" href="/profile"><i class="bi bi-person fa-fw me-2"></i>Edit
                                    Profile</a></li>
                            <li><a class="dropdown-item bg-danger-soft-hover" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="bi bi-power fa-fw me-2"></i>Sign Out</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-sm btn-dark mb-0"><i
                                class="bi bi-power me-2"></i>Sign In</a>
                    @endauth
                @endif
            </div>
        </div>
    </nav>
</header>