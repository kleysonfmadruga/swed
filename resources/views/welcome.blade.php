@extends('templates.main')

@section('pagename')
    Swed
@endsection

@section('main')
    <main class="w-full">
        <div style="background-image: url({{ asset('img/comercio-hero-image.jpg') }}); background-repeat: no-repeat; border: none; background-size: cover;"
             class="w-full h-screen flex justify-center items-center">
            <div class="flex flex-col w-full items-center">
                <img src="{{ asset('img/swed-logo-lg.png') }}" alt="Swed logo" />
                <form action="#" method="get" class="flex flex-row justify-center h-12 w-2/5 mt-10">
                    @csrf
                    <input type="text" name="category" id="category" class="h-full w-full px-4 outline-none rounded-l-full" placeholder="Que tipo de estabelecimento você está procurando hoje?" />
                    <div class="h-full w-12 cursor-pointer bg-red-600 hover:bg-red-500 rounded-r-full flex justify-center items-center">
                        <i class="feather icon-search text-white text-xl -ml-2"></i>
                    </div>
                </form>
                <div class="flex flex-row mt-4 justify-between w-2/5 h-12">
                    <fieldset class="pl-1">
                        <input type="checkbox" name="buscar-aqui" id="buscar-aqui" class="form-checkbox h-5 w-5 text-red-600 outline-none rounded">
                        <label for="buscar-aqui" class="text-gray-300">Buscar onde estou</label>
                    </fieldset>
                    
                    {{-- <a href="#" class="flex items-center justify-center text-white bg-red-600 hover:bg-red-500 h-full w-1/2 rounded-full duration-200">É Gerente? Clique aqui</a>
                    <a href="#" class="flex items-center justify-center text-white bg-yellow-500 hover:bg-yellow-400 h-full w-1/2 rounded-full duration-200">É Cliente? Clique aqui</a> --}}
                </div>
            </div>
        </div>

    </main>
@endsection

@section('script')
    <script>

    </script>
@endsection
