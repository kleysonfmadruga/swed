@extends('templates.main')

@section('pagename')
    Fazer login como Gerente
@endsection

@section('main')
    <main class="w-full h-screen bg-gradient-to-b from-red-600 to-gray-800 flex justify-center items-center">
        <div class="w-3/6 h-3/4 bg-white rounded-md flex flex-row overflow-hidden">
            <form action="#" method="post" class="w-1/2 h-full flex flex-col justify-center items-center px-5">
                @csrf
                <span class="text-xl">Cadastrar-se como {{$title}}</span>
                <fieldset class="flex flex-col w-5/6 mt-12">
                    <label for="name" class="">Nome</label>
                    <input type="text" name="name" id="name" class="h-8 px-2 rounded" />
                </fieldset>
                <fieldset class="flex flex-col w-5/6 mt-2">
                    <label for="email" class="">E-mail</label>
                    <input type="email" name="email" id="email" class="h-8 px-2 rounded" />
                </fieldset>
                <fieldset class="flex flex-col w-5/6 mt-2">
                    <label for="password" class="">Senha</label>
                    <input type="password" name="password" id="password" class="h-8 px-2 rounded" />
                </fieldset>
                <fieldset class="flex flex-col w-5/6 mt-2">
                    <label for="password-confirm" class="">Confirme sua senha</label>
                    <input type="password" name="password-confirm" id="password-confirm" class="h-8 px-2 rounded" />
                </fieldset>
                <input type="submit" value="Cadastrar" class="mt-7 bg-red-600 hover:bg-red-500 text-white font-semibold px-5 py-1 rounded cursor-pointer" />
                <span class="mt-7 text-sm">Já é cadastrado?
                    <a href="{{ $title === 'gerente' ? route('login.gerente') : route('login.cliente') }}"
                    class="font-bold text-red-600 hover:text-red-500">
                        Clique aqui
                    </a>.
                </span>
            </form>
            <img src="{{ $title === 'gerente' ?
                            asset('img/signup-owner-image.svg') :
                            asset('img/signup-client-image.svg')
                      }}"
                 alt=""
                 class="w-1/2 px-5 bg-gray-100" />
        </div>
    </main>
@endsection

@section('script')
    <script type="module" src="{{ asset(mix('js/pages/login/index.js')) }}"></script>
@endsection
