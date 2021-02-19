<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <title>@yield('pagename')</title>

    <link rel="stylesheet" href="{{ asset(mix('css/app.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/global/index.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/global/button.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/global/modal.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('fonts/feather/iconfont.css')) }}" />
    <style>
        .menu-splat {
            display: inline;
        }
        .button-menu {
            display: none;
        }
        .hr-sm {
            display: none;
        }
        .w-100-md {
            width: auto;
        }
        @media(max-width: 800px) {
            .menu-splat {
                display: flex !important;
                flex-direction: column !important;
                position: absolute;
                top: 3.5rem;
                right: 2rem;
                font-size: 1rem;
                background-color: #fff;
                z-index: 2000;
                box-shadow: 2px 2px 3px rgba(0, 0, 0, .6);
                font-weight: normal !important;
                border-bottom-left-radius: .4rem;
                border-bottom-right-radius: .4rem;
            }
            .manu-splat .border-sm-grey {
                border-top: 1px solid rgba(0, 0, 0, .4) !important;
            }
            .menu-splat .animate-scale:hover {
                transform: scale(1);
            }
            .menu-splat.none{
                display: none !important;
            }
            .button-menu {
                display: block;
            }
            .hr-sm {
                display: block;
            }
            .w-100-md {
                width: 100%;
            }
        }
    </style>

    @yield('Local CSS')

</head>
<body class="w-full m-0 p-0">
    <header class="w-full h-14 bg-gray-100 px-24 flex justify-between items-center absolute top-0">
        <a href="{{ route('dashboard.index') }}" class="flex items-center px-7 h-full hover:bg-opacity-50 duration-200">
            <img class="w-full" src="{{ asset('img/swed-sm.png') }}" alt="Swed logo" />
        </a>
        <div class="h-full flex items-center">
                <a class="h-full px-7 py-4 font-semibold text-gray-900 hover:bg-gray-200 animate-scale" href="{{ route('establishment.index') }}">Meus estabelecimentos</a>
                <a class="h-full px-7 py-4 font-semibold text-gray-900 hover:bg-gray-200 animate-scale" href="#">Sobre</a>
                <div id="profile-dropdown" class="h-full w-100-md inline-block relative justify-end group ">
                    <hr class="hr-sm">

                    <button id="profile-dropdown-button"
                        class="h-full w-full px-4 py-2 font-semibold text-gray-900 focus:outline-none group-hover:bg-gray-200 inline-flex items-center"> <img class="mr-2 h-8 w-8 rounded-full" src="{{url('storage/perfil.jpg')}}"/> João das Couves <i class="feather icon-chevron-down text-2xl ml-2"></i></button>

                    <div id="profile-dropdown-content" class="absolute z-10 bg-white shadow-xl w-40 flex-col hidden">
                        <a href="#" class="py-2 px-4 w-full hover:bg-gray-200">Meu perfil</a>
                        <a href="#" class="py-2 px-4 w-full hover:bg-gray-200">Sair</a>
                    </div>
            </div>
        </div>
    </header>

    @yield('main')

    @yield('footer')

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    @yield('script')

</body>
</html>
