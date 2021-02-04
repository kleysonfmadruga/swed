@extends('templates.external')

@section('pagename')
    Swed
@endsection

@section('Local CSS')
    <link rel="stylesheet" href="{{ asset('libraries/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('libraries/select2/dist/css/select2.css') }}">
@endsection

@section('main')
    <main class="w-full">
        <div class="w-full h-screen flex justify-center items-center bg-gradient-to-b from-red-600 to-gray-800">
            <div class="flex flex-col w-full items-center">
                <img src="{{ asset('img/swed-negative.png') }}" alt="Swed logo" />
                <form action="#" method="get" class="flex flex-row justify-center h-12 w-2/5 mt-10">
                    @csrf
                    <input type="text" name="category" id="category" class="h-full w-full px-4 outline-none rounded-l-full" placeholder="Que tipo de estabelecimento você está procurando hoje?" />
                    <div class="h-full w-12 cursor-pointer bg-red-600 hover:bg-red-500 rounded-r-full flex justify-center items-center">
                        <i class="feather icon-search text-white text-xl -ml-2"></i>
                    </div>
                </form>
                <div class="flex flex-row mt-4 justify-start items-center w-2/5 h-12">
                    <fieldset class="pl-1">
                        <input type="checkbox" name="search-other-cities" id="search-other-cities" class="form-checkbox h-5 w-5 text-red-600 outline-none rounded">
                        <label for="search-other-cities" class="text-gray-300">Buscar em outras cidades</label>
                    </fieldset>
                    <fieldset class="ml-10 hidden" id="other-cities-container">
                        <select name="cities" id="cities" class="select2" disabled>
                            <option value="all">Todas as cidades</option>
                            @foreach ($cities as $item)
                                <option value="{{ $item->id }}">{{ $item->name }} / {{ $item->abbreviation_state}}</option>
                            @endforeach
                        </select>
                    </fieldset>
                </div>
            </div>
        </div>

    </main>
@endsection

@section('script')
    <script type="module" src="{{ asset(mix('js/pages/dashboard/index.js')) }}"></script>
    <script src="{{ asset('libraries/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('libraries/select2/dist/js/select2.js') }}"></script>
@endsection
