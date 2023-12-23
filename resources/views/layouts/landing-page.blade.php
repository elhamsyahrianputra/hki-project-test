<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Header -->
    @include('partials.landing-page.header')
    
    <!-- Addition Style -->
    @yield('style')
</head>

<body>
    <!-- Content -->

    @include('partials.landing-page.navbar')

    <main>
        @yield('content')
    </main>

    <!-- /Content -->

    <!-- Footer -->
    @include('partials.landing-page.footer')

    <!-- Addition Script -->
    @yield('script')



</body>

</html>