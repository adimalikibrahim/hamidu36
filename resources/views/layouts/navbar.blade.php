	<nav class="top-bar navbar-light border-bottom py-0 py-xl-3">
		<div class="container-fluid p-0">
			<div class="d-flex align-items-center w-100">

				<div class="d-flex align-items-center d-xl-none">
					<a class="navbar-brand" href="/">
						<img class="light-mode-item navbar-brand-item h-30px" src="{{asset('assets/images/logo-mobile.png')}}" alt="">
						<img class="dark-mode-item navbar-brand-item h-30px" src="{{asset('assets/images/logo-mobile.png')}}" alt="">
					</a>
				</div>

				<div class="navbar-expand-xl sidebar-offcanvas-menu">
					<button class="navbar-toggler me-auto" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSidebar" aria-controls="offcanvasSidebar" aria-expanded="false" aria-label="Toggle navigation" data-bs-auto-close="outside">
						<i class="bi bi-text-right fa-fw h2 lh-0 mb-0 rtl-flip" data-bs-target="#offcanvasMenu"> </i>
					</button>
				</div>
				
				<div class="navbar-expand-lg ms-auto ms-xl-0">
					
					<button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTopContent" aria-controls="navbarTopContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-animation">
							<span></span>
							<span></span>
							<span></span>
						</span>
					</button>
					<div class="collapse navbar-collapse w-100" id="navbarTopContent">
						<div class="nav my-3 my-xl-0 flex-nowrap align-items-center">
							<div class="nav-item w-100">
								<form class="position-relative">
									<input class="form-control pe-5 bg-secondary bg-opacity-10 border-0" type="search" placeholder="Search" aria-label="Search">
									<button class="btn bg-transparent px-2 py-0 position-absolute top-50 end-0 translate-middle-y" type="submit"><i class="fas fa-search fs-6 text-primary"></i></button>
								</form>
							</div>
						</div>
					</div>
				</div>
				
				<div class="ms-xl-auto">
					<ul class="navbar-nav flex-row align-items-center">
						<li class="nav-item ms-2 ms-md-3 dropdown">
							<a class="avatar avatar-sm p-0" href="#" id="profileDropdown" role="button" data-bs-auto-close="outside" data-bs-display="static" data-bs-toggle="dropdown" aria-expanded="false">
								<img class="avatar-img rounded-circle" src="{{asset('assets/images/avatar/01.jpg')}}" alt="avatar">
							</a>

							<ul class="dropdown-menu dropdown-animation dropdown-menu-end shadow pt-3" aria-labelledby="profileDropdown">
								<li class="px-3">
									<div class="d-flex align-items-center">
										<div class="avatar me-3">
											<img class="avatar-img rounded-circle shadow" src="{{asset('assets/images/avatar/01.jpg')}}" alt="avatar">
										</div>
										<div>
											<a class="h6 mt-2 mt-sm-0" href="#">{{ Auth::user()->name }}</a>
											<p class="small m-0">{{ Auth::user()->email }}</p>
										</div>
									</div>
									<hr>
								</li>
								<li><a class="dropdown-item" href="/profile"><i class="bi bi-person fa-fw me-2"></i>Edit Profile</a></li>
								{{-- <li><a class="dropdown-item" href="#"><i class="bi bi-gear fa-fw me-2"></i>Account Settings</a></li> --}}
								{{-- <li><a class="dropdown-item" href="#"><i class="bi bi-info-circle fa-fw me-2"></i>Help</a></li> --}}
								<li><a class="dropdown-item bg-danger-soft-hover" href="{{ route('logout') }}"
									onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
									<i class="bi bi-power fa-fw me-2"></i>Sign Out</a>
									<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
										@csrf
									</form>
								</li>
								{{-- <li> <hr class="dropdown-divider"></li>
								<li>
									<div class="modeswitch-wrap" id="darkModeSwitch">
										<div class="modeswitch-item">
											<div class="modeswitch-icon"></div>
										</div>
										<span>Dark mode</span>
									</div>
								</li>  --}}
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</nav>