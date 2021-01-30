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
            <div id="profile-dropdown" class="h-full w-24 inline-block relative justify-end group">
                <button onclick="toggleDropdownVisibilityHandler()" id="profile-dropdown-button"
                    class="h-full w-full font-semibold text-white focus:outline-none group-hover:bg-red-500" href="#">Login</button>

                <div id="profile-dropdown-content" class="absolute -inset-x-32 z-10 bg-white shadow-sm w-56 flex-col hidden">
                    <a href="#" class="py-2 px-4 w-full hover:bg-gray-200">Fazer login como Gerente</a>
                    <a href="#" class="py-2 px-4 w-full hover:bg-gray-200">Fazer login como Cliente</a>
                </div>
            </div>
        </div>
    </header>

    @yield('main')

    @yield('footer')

    @yield('script')
    <script>
        window.onclick = (event) => {
            let dropMenu = document.querySelector('#profile-dropdown-content')
            if(!event.target.matches('#profile-dropdown-button') && !dropMenu.classList.contains('hidden')) {
                dropMenu.classList.toggle('hidden')
                dropMenu.classList.toggle('flex')
            }
        }

        function toggleDropdownVisibilityHandler(){
            let dropMenu = document.querySelector('#profile-dropdown-content')
            dropMenu.classList.toggle('hidden');
            dropMenu.classList.toggle('flex');
        }
    </script>
</body>
</html>
