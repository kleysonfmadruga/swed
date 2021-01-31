@extends('templates.main')

@section('pagename')
    Fazer login como Gerente
@endsection

@section('main')
    <main class="w-full h-screen bg-gradient-to-b from-red-600 to-gray-800 flex justify-center items-center">
        <div class="w-3/6 h-2/3 bg-white rounded-md flex flex-row overflow-hidden">
            <form action="#" method="post" class="w-1/2 h-full flex flex-col justify-center items-center px-5">
                @csrf
                <span class="text-xl">Fazer login como gerente</span>
                <fieldset class="flex flex-col w-5/6 mt-12">
                    <label for="email" class="">Login</label>
                    <input type="email" name="email" id="email" class="h-8 px-2 rounded" />
                </fieldset>
                <fieldset class="flex flex-col w-5/6 mt-2">
                    <label for="password" class="">Senha</label>
                    <input type="password" name="password" id="password" class="h-8 px-2 rounded" />
                </fieldset>
                <input type="submit" value="Entrar" class="mt-7 bg-red-600 hover:bg-red-500 text-white font-semibold px-5 py-1 rounded cursor-pointer" />
                <span class="mt-7 text-sm">Ainda não é cadastrado? <a href="#" class="font-bold text-red-600 hover:text-red-500">Clique aqui</a>.</span>
            </form>
            <img src="{{ asset('img/online-shopping-hero-image.svg') }}" alt="" class="w-1/2 px-5 bg-gray-100" />
        </div>
    </main>
@endsection
