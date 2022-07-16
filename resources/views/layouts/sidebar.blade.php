<nav class="navbar sidebar navbar-expand-xl navbar-dark bg-dark">

	<div class="d-flex align-items-center">
		<a class="navbar-brand" href="/">
			<img class="navbar-brand-item" src="{{asset('assets/images/logo-light.svg')}}" alt="">
		</a>
	</div>
	
	<div class="offcanvas offcanvas-start flex-row custom-scrollbar h-100" data-bs-backdrop="true" tabindex="-1" id="offcanvasSidebar">
		<div class="offcanvas-body sidebar-content d-flex flex-column bg-dark">

			<ul class="navbar-nav flex-column" id="navbar-sidebar">				
				<li class="nav-item"><a href="/home" class="nav-link @yield('/home')" ><i class="bi bi-house fa-fw me-2"></i>Dashboard</a></li>
				{{-- <li class="nav-item">
					<a class="nav-link" data-bs-toggle="collapse" href="#collapsepage" role="button" aria-expanded="false" aria-controls="collapsepage">
						<i class="bi bi-basket fa-fw me-2"></i>Courses
					</a>
					<ul class="nav collapse flex-column" id="collapsepage" data-bs-parent="#navbar-sidebar">
						<li class="nav-item"> <a class="nav-link" href="#">All Courses</a></li>
						<li class="nav-item"> <a class="nav-link" href="#">Course Category</a></li>
						<li class="nav-item"> <a class="nav-link" href="#">Course Detail</a></li>
					</ul>
				</li> --}}
				{{-- <li class="nav-item ms-2 my-2">Santri</li> --}}
				{{-- <li class="nav-item"> <a class="nav-link" href="#"><i class="fas fa-user-graduate fa-fw me-2"></i>Students</a></li> --}}
				<li class="nav-item ms-2 my-2">Alumni</li>
				<li class="nav-item"> <a class="nav-link @yield('alumni')"  href="/alumni"><i class="fas fa-users fa-fw me-2"></i>Hamidu</a></li>
				<li class="nav-item"> <a class="nav-link @yield('kordinator')" href="/kordinator"><i class="fas fa-landmark fa-fw me-2"></i>Kordinator</a></li>
				<li class="nav-item"> <a class="nav-link @yield('angkatan')" href="/angkatan"><i class="fas fa-school fa-fw me-2"></i>Angkatan</a></li>
				@unless(Auth::user()->role != 'admin')
					
				<li class="nav-item ms-2 my-2">Setting</li>
				<li class="nav-item"> <a class="nav-link  @yield('account')" href="/account"><i class="far fa-user fa-fw me-2"></i>Account</a></li>
				@endunless
				{{-- <li class="nav-item ms-2 my-2">Documentation</li>
				<li class="nav-item"> <a class="nav-link" href="#"><i class="far fa-clipboard fa-fw me-2"></i>Documentation</a></li> --}}
			</ul>
			<div class="px-3 mt-auto pt-3 text-center">
				<div class="text-white badge bg-danger">
						{{-- <a class="h5 mb-0 text-body" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Settings">
							<i class="bi bi-gear-fill"></i>
						</a>
						<a class="h5 mb-0 text-body" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Home">
							<i class="bi bi-globe"></i>
						</a> --}}
						<a class="h5 mb-0 text-white" href="{{ route('logout') }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Sign out"
							onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
							<i class="bi bi-power"></i>
							<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
								@csrf
							</form>
						</a>
				</div>
			</div>
		</div>
	</div>
</nav>