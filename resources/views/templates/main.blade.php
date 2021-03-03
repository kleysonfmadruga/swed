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
        @if (!Auth::check())
            <div class="h-full flex items-center">
                <a class="h-full px-7 py-4 font-semibold text-gray-900 hover:bg-gray-200 animate-scale" href="#">Cidades Mapeadas</a>
                <a class="h-full px-7 py-4 font-semibold text-gray-900 hover:bg-gray-200 animate-scale" href="#">Quem somos</a>
                <a class="h-full px-7 py-4 font-semibold text-gray-900 hover:bg-gray-200 animate-scale" href="#">Sobre</a>
                <div id="profile-dropdown" class="h-full w-24 inline-block relative justify-end group">
                    <button id="profile-dropdown-button"
                        class="h-full w-full font-semibold text-gray-900 focus:outline-none group-hover:bg-gray-200" href="#">Login</button>

                    <div id="profile-dropdown-content" class="absolute inset-x-15 z-10 bg-white shadow-sm w-24 flex-col hidden">
                        <a href="{{ route('login.gerente') }}" class="py-2 px-4 w-full hover:bg-gray-200">Gerente</a>
                        <a href="{{ route('login.cliente') }}" class="py-2 px-4 w-full hover:bg-gray-200">Cliente</a>
                    </div>
                </div>
            </div>
        @else
            <div class="h-full flex items-center">
                @if (Session::get('role')->id == 1)
                    <a class="h-full px-7 py-4 font-semibold text-gray-900 hover:bg-gray-200 animate-scale" href="{{ route('establishment.index', ['id' => $user->id]) }}">Meus estabelecimentos</a>
                @endif
                <a class="h-full px-7 py-4 font-semibold text-gray-900 hover:bg-gray-200 animate-scale" href="#">Sobre</a>
                <div id="profile-dropdown" class="h-full w-100-md inline-block relative justify-end group ">
                    <hr class="hr-sm">

                    <button id="profile-dropdown-button"
                        class="h-full w-full px-4 py-2 font-semibold text-gray-900 focus:outline-none group-hover:bg-gray-200 inline-flex items-center">
                        <img class="mr-2 h-8 w-8 rounded-full" @if($user->photo) src="{{url($user->photo)}}" @else src="{{ asset('storage/profile_photo/default.png') }}" @endif/> {{ $user->name }}
                        <i class="feather icon-chevron-down text-2xl ml-2"></i>
                    </button>

                    <div id="profile-dropdown-content" class="absolute z-10 bg-white shadow-xl w-40 flex-col hidden">
                        <a href="{{ route('profile.index', $user->id) }}" class="py-2 px-4 w-full hover:bg-gray-200"><span>Meu perfil</span></a>
                        <a href="{{ route('profile.logout') }}" class="py-2 px-4 w-full hover:bg-gray-200"><span>Sair</span></a>
                    </div>
                </div>
            </div>
        @endif
    </header>

    @yield('main')

    @yield('footer')

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="{{ asset(mix('js/etc/mask/jquery.mask.js')) }}"></script>
    <script type="text/javascript" src="{{ asset(mix('js/etc/mask/mask.js')) }}"></script>
    @yield('script')

</body>
</html>
