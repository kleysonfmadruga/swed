<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <title>@yield('pagename')</title>

    <link rel="stylesheet" href="{{ asset(mix('css/app.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('fonts/feather/iconfont.css')) }}" />
</head>
<body class="w-full">
    <header class="w-full h-14 bg-red-600 px-24 flex justify-between items-center">
        <a href="#" class="flex items-center px-7 h-full hover:bg-red-500 duration-200">
            <img class="w-full" src="{{ asset('img/swed-logo-alt-sm.png') }}" alt="Swed logo" />
        </a>
        <div class="h-full flex items-center">
            <a class="h-full px-7 py-4 text-white hover:bg-red-500 duration-200" href="#">Cidades Mapeadas</a>
            <a class="h-full px-7 py-4 text-white hover:bg-red-500 duration-200" href="#">Quem somos</a>
            <a class="h-full px-7 py-4 text-white hover:bg-red-500 duration-200" href="#">Sobre</a>
        </div>
    </header>

    @yield('main')

    <footer class="w-full h-40 bg-gray-900 px-24">

    </footer>

    @yield('script')
</body>
</html>
