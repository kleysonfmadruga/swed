<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <title>@yield('pagename')</title>

    <link rel="stylesheet" href="{{ asset(mix('css/app.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('fonts/feather/iconfont.css')) }}" />
    <style>
        .animate-scale {
            transition: .3s;
        }
        .animate-scale:hover {
            transform: scale(1.05);
        }
    </style>
</head>
<body class="w-full m-0 p-0">
    <header class="w-full h-14 bg-grey-500 px-24 flex justify-between items-center absolute top-0">
        <a href="#" class="flex items-center px-7 h-full hover:bg-opacity-50 duration-200">
            <img class="w-full" src="{{ asset('img/swed-logo-alt-sm.png') }}" alt="Swed logo" />
        </a>
        <div class="h-full flex items-center">
            <a class="h-full px-7 py-4 font-semibold text-white hover:bg-red-500 animate-scale" href="#">Cidades Mapeadas</a>
            <a class="h-full px-7 py-4 font-semibold text-white hover:bg-red-500 animate-scale" href="#">Quem somos</a>
            <a class="h-full px-7 py-4 font-semibold text-white hover:bg-red-500 animate-scale" href="#">Sobre</a>
            <a class="h-full px-7 py-4 font-semibold text-white hover:bg-red-500" href="#">Login</a>
        </div>
    </header>

    @yield('main')

    @yield('footer')

    @yield('script')
</body>
</html>
