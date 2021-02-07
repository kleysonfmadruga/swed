@extends('templates.main')

@section('pagename')
    Meus Estabelecimentos
@endsection

@section('Local CSS')
    <link rel="stylesheet" href="{{ asset('libraries/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('libraries/select2/dist/css/select2.css') }}">
    <link rel="stylesheet" href="{{ asset('libraries/toastr/css/toastr.css') }}">
    <link rel="stylesheet" href="{{ asset('libraries/toastr/css/plugin/toastr.css') }}">
    <style>
        .select2-container{
            z-index: 100003 !important;
        }
    </style>
@endsection

@section('main')
@if ($errors->first())
    <input type="hidden" id="error" value="{{$errors->first()}}">
@endif
<main class="w-full flex justify-center items-start bg-gray-200 ">

    <div class="w-3/4 min-h-screen bg-white pt-14 px-12">
        <h1 class="mt-5 text-2xl font-bold">Meus estabelecimentos</h1>
        <div id="establishment-item-container">
            @foreach ($establishments as $item)
                <x-EstablishmentCard
                    route="{{ route('establishment.show', ['id' => $item->id]) }}"
                    name="{{ $item->name }}"
                    description="{{ $item->description ?? 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.'}}"
                    image="{{ asset('img/triste.jpg') }}"
                />         
            @endforeach
        </div>
        <a show-modal="modal-new-establishment" function="reseteModal" class="h-52 w-full bg-gray-100 hover:bg-gray-200 border-gray-300 mt-5
                duration-200 rounded border hover:shadow cursor-pointer flex
                justify-center items-center mb-10">
            <i class="feather icon-plus text-gray-800 text-2xl"></i>
        </a>
    </div>
</main>

<x-Modal classAbrirModal="new-establishment" titleModal="Cadastro de Estabelecimento" routeFormAction="{{ route('establishment.merge') }}">
    <div class="flex">
        <fieldset class="flex flex-col w-36 mr-10">
            <label for="">Nome do estabelecimento</label>
            <input type="text" placeholder="Informe o nome do estabelecimento" name="name">
        </fieldset>
        <fieldset class="flex flex-col w-36">
            <label for="">Descrição do estabelecimento</label>
            <textarea type="text" placeholder="Informe a descrição do estabelecimento" name="description"></textarea>
        </fieldset>
        
    </div>
    <div class="flex">
        <fieldset class="flex flex-col w-36 mr-10">
            <label for="">CNPJ do estabelecimento</label>
            <input type="text" placeholder="Informe o CNPJ do estabelecimento" name="cnpj">
        </fieldset>
        <fieldset class="flex flex-col w-36">
            <label for="">Horário de funcionamento</label>
            <input type="text" placeholder="Informe o horário de funcionamento" name="opening_hours">
        </fieldset>
    </div>
    <div class="flex">
        <fieldset class="flex flex-col w-36 mr-10">
            <label for="">Informe o CEP</label>
            <input type="text" placeholder="Informe o CEP" name="cep">
        </fieldset>
        <fieldset class="flex flex-col w-36">
            <label for="">Celular</label>
            <input type="text" placeholder="Informe o celular do estabelecimento" name="phone">
        </fieldset>
    </div>
    <div class="flex">
        <fieldset class="flex flex-col w-36 mr-10">
            <label for="">Informe a Rua</label>
            <input type="text" placeholder="Informe o rua do estabelecimento" name="street">
        </fieldset>
        <fieldset class="flex flex-col w-36">
            <label for="">Informe o Bairro</label>
            <input type="text" placeholder="Informe o bairro do estabelecimento" name="neighborhood">
        </fieldset>
    </div>
    <fieldset class="flex flex-col w-36">
        <label for="">Selecione a cidade</label>
        <select name="cities" id="cities" class="select2">
            <option value="all">Todas as cidades</option>
            @foreach ($cities as $item)
                <option value="{{ $item->id }}">{{ $item->name }} / {{ $item->abbreviation_state}}</option>
            @endforeach
        </select>
    </fieldset>
</x-Modal>
@endsection

@section('script')

    <script src="{{ asset('libraries/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('libraries/select2/dist/js/select2.js') }}"></script>
    <script src="{{ asset('libraries/app.js') }}"></script>

    <script src="{{ asset('libraries/toastr/js/toastr.min.js') }}"></script>
    <script src="{{ asset('libraries/toastr/js/local-toastr.js') }}"></script>

    <script type="module" src="{{ asset(mix('js/pages/manager/index.js')) }}"></script>
    <script src="{{ asset(mix('js/etc/modal.js')) }}"></script>

@if ($errors->first())
    <script>
        const error = document.getElementById('error').value;
        withErros(error);
    </script>
@endif
    
@endsection
