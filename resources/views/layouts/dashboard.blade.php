<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
	data-assets-path="{{ asset ('sneat') }}/" data-template="vertical-menu-template-free">


<head>
	<!-- Header -->
	@include('partials.dashboard.header')

	<!-- Addition Style -->
	@yield('style')
</head>

<body>
	<!-- Wrapper -->
	<div class="layout-wrapper layout-content-navbar">
		<div class="layout-container">

			<!-- Sidebar -->
			@include('partials.dashboard.sidebar')

			<!-- Layout Container -->
			<div class="layout-page">
				<!-- Navbar -->
				@include('partials.dashboard.navbar')

				<!-- Content wrapper -->
				<div class="content-wrapper">
					<!-- Content -->
					<div class="container-xxl flex-grow-1 container-p-y">
						@yield('content')
					</div>
					<div class="content-backdrop fade"></div>
				</div>
			</div>
		</div>

		<!-- Overlay -->
		<div class="layout-overlay layout-menu-toggle"></div>
	</div>

	<!-- Footer -->
	@include('partials.dashboard.footer')

	<!-- Addition Script -->
	@yield('script')
</body>

</html>