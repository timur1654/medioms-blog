<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Laravel 12 Блог с нуля')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('resources/css/style.css')}}">
</head>
<body>
<header>
    <nav class="header-nav container flex-container">
        <h1 class="logo"><a class="logo-link" href="{{route('blog.index')}}">Blog</a></h1>
        <ul class="header-menu flex-container">
            @auth
                <li><a class="header-menu-link" href="">Посты</a></li>
                <li><a class="header-menu-link" href="">О проекте</a></li>
                <li><a class="header-menu-link'" href="{{route('logout')}}">Выйти</a></li>
            @endauth

            @guest
                <li><a class="header-menu-link" href="{{route('login')}}">Войти</a></li>
                <li><a class="header-menu-link" href="{{route('register')}}">Регистрация</a></li>
            @endguest
        </ul>
    </nav>
</header>

<div class="container mt-3">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
