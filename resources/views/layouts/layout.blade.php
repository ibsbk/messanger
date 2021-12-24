<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../resources/css/app.css">
    <title>Document</title>
</head>
<body>
<header>
    <nav class="nav">
        <div class="left-side">
            <a href="{{route('/')}}" class="big-text">
                мессенджер
            </a>
        </div>
        <div class="right-side">
            @guest()
                <a href="{{route('auth')}}">войти</a>
                <a href="{{route('reg')}}">зарегистрироваться</a>
            @endguest
            @auth()
                    <a href="{{route('logout')}}">выйти</a>
            @endauth
        </div>
    </nav>
</header>
<section>
    <div class="content-wrapper">
        @yield('content')
    </div>
</section>
@yield('script')
</body>
</html>
