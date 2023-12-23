<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
	<div class="app-brand demo">
		<a href="{{ route('dashboard') }}" class="app-brand-link">
			<span class="app-brand-logo demo">
				<img src="{{ asset('assets/img/logo/logo-hki-uns.png') }}" alt="HKI UNS Logo" style="height: 45px">
			</span>
		</a>

		<a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
			<i class="bx bx-chevron-left bx-sm align-middle"></i>
		</a>
	</div>

	<div class="menu-inner-shadow"></div>

	<ul class="menu-inner py-1">
		<!-- Dashboard -->
		<li class="menu-item {{ Request::is('dashboard') ? 'active' : '' }}">
			<a href="{{ route('dashboard') }}" class="menu-link">
				<i class="menu-icon tf-icons bx bxs-dashboard"></i>
				<div data-i18n="Analytics">Dashboard</div>
			</a>
		</li>

		<li class="menu-header small text-uppercase">
			<span class="menu-header-text">Permohonan</span>
		</li>

		<!-- Application -->

		<li class="menu-item {{ Request::is('*brands') ? 'active' : '' }}">
		@role('admin')
			<a href="{{ route('admin.brands.index') }}" class="menu-link">
				<i class="menu-icon tf-icons bx bx-list-ul"></i>
				<div data-i18n="Analytics">Daftar Permohonan</div>
			</a>
			@endrole
			@role('applicant')
			<a href="{{ route('applicant.brands.index') }}" class="menu-link">
				<i class="menu-icon tf-icons bx bx-list-ul"></i>
				<div data-i18n="Analytics">Daftar Permohonan</div>
			</a>
			@endrole 
		</li>
			
		@role('applicant')
		<li class="menu-item  {{ Request::routeIs('applicant.settings.profile') ? 'active' : '' }}">
			<a href="{{ route('applicant.brands.create') }}" class="menu-link">
				<i class="menu-icon tf-icons bx bx-plus"></i>
				<div data-i18n="Layouts">Ajukan Permohonan</div>
			</a>
		</li>
		@endrole 


		<li class="menu-header small text-uppercase">
			<span class="menu-header-text">Pengaturan</span>
		</li>

		<!-- Layouts -->
		<li class="menu-item {{ Request::routeIs('settings.profile') ? 'active' : '' }}">
			<a href="{{ route('settings.profile') }}" class="menu-link">
				<i class="menu-icon tf-icons bx bxs-user"></i>
				<div data-i18n="Analytics">Profil</div>
			</a>
		</li>
		<li class="menu-item {{ Request::routeIs('settings.account') ? 'active' : '' }}">
			<a href="{{ route('settings.account') }}" class="menu-link">
				<i class="menu-icon tf-icons bx bxs-key"></i>
				<div data-i18n="Analytics">Ganti Kata Sandi</div>
			</a>
		</li>

	</ul>
</aside>