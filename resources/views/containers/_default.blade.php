<!DOCTYPE html>
<html lang="en">
    @include('components._head')
    <body>
        @yield('content')
        <script src="{{ asset('js/currency.js') }}"></script>
    </body>
</html>
