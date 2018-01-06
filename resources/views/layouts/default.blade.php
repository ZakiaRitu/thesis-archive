<!DOCTYPE html>
<html lang="en">
@include('includes.header')
<body class="body-wrapper" style="background-color: #DCDCDC">
    @include('includes.navbar')
        @yield('content')
    @include('includes.footer')
</body>
</html>