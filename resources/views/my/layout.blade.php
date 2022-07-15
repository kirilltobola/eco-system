<!doctype html>
<html lang="ru">
<head>
    @yield('head')
</head>
<body>
@include('my.nav_bar')
<div class="container-fluid justify-content-center mx-auto mt-2" style="max-width: 50rem;">
    @yield('content')
</div>
</body>
</html>
