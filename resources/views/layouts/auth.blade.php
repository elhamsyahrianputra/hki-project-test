<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-assets-path="{{ asset ('sneat') }}/" data-template="vertical-menu-template-free">


<head>
    <!-- Header -->
    @include('partials.auth.header')

    <!-- Addition Style -->
    @yield('style')
</head>

<body>
    <!-- Content -->

    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <!-- Register -->
                <div class="card">
                    <div class="card-body">
                        @yield('content')
                    </div>
                </div>
                <!-- /Register -->
            </div>
        </div>
    </div>

    <!-- / Content -->

    <!-- Footer -->
    @include('partials.auth.footer')

    <!-- Addition Script -->
    @yield('script')
</body>

</html>