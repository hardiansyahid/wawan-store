<!DOCTYPE html>
<html lang="en">
    @include('layout.head')
    <body class="bg-primary">
        @yield('content')
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('assets/template/js/scripts.js')}}"></script>
        @yield('script')
    </body>
</html>
