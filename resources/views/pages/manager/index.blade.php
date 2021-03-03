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
        .input {
            border-radius: .4rem;
            border: 1px solid rgba(0, 0, 0, .4) !important;
        }
        .container .select2-selection.select2-selection--single {
            height: 2.5rem !important; 
            padding-top: .3rem;
        }
        .container .select2-selection.select2-selection--single .select2-selection__arrow {
            margin-top: .3rem !important;
        }
        .container .textarea{
            padding: 0 10%;
        }
        .d-grid-2-column {
            display: grid;   
            grid-template-columns: [first] 39.5% [line2] 39.5%;
            grid-column-gap: 1%;
            /* grid-row-gap: 1em; */
            justify-content: center
        }
        .pd-b-2 fieldset{
            margin-top: .5rem;
            grid-template-areas: [first] 1rem [line2] 0;
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
                    image="{{ url('storage/establishment/default.jpg') }}"
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
    <main class="container">
        <fieldset class="flex flex-col textarea mb-1">
            <label for="">Nome <span class="text-red-700">*</span></label>
            <input class="input" type="text" required placeholder="Informe o nome do estabelecimento" name="name">
        </fieldset>
        <fieldset class="flex flex-col textarea">
            <label for="">Descrição <span class="text-red-700">*</span></label>
            <textarea class="input" name="description" required placeholder="Informe a descrição do estabelecimento"></textarea>
        </fieldset>
        <div class="d-grid-2-column pd-b-2">
            <fieldset class="flex flex-col">
                <label for="">CNPJ <span class="text-red-700">*</span></label>
                <input class="input cnpj" type="text" required placeholder="Informe o CNPJ do estabelecimento" name="cnpj">
            </fieldset>
            <fieldset class="flex flex-col">
                <label for="">Horário de funcionamento <span class="text-red-700">*</span></label>
                <input class="input time-in-time" type="text" required placeholder="Informe o horário de funcionamento" name="opening_hours">
            </fieldset>
            <fieldset class="flex flex-col">
                <label for="">Informe o CEP <span class="text-red-700">*</span></label>
                <input class="input cep" type="text" required placeholder="Informe o CEP" name="cep">
            </fieldset>
            <fieldset class="flex flex-col">
                <label for="">Celular <span class="text-red-700">*</span></label>
                <input class="input celular" type="text" required placeholder="Informe o celular do estabelecimento" name="phone">
            </fieldset>
            <fieldset class="flex flex-col">
                <label for="">Informe a Rua <span class="text-red-700">*</span></label>
                <input class="input" type="text" required placeholder="Informe o rua do estabelecimento" name="street">
            </fieldset>
            <fieldset class="flex flex-col">
                <label for="">Informe o Bairro <span class="text-red-700">*</span></label>
                <input class="input" type="text" required placeholder="Informe o bairro do estabelecimento" name="neighborhood">
            </fieldset>
        </div>
        <div class="d-grid-2-column mt-1">
            <fieldset class="flex flex-col">
                <label for="">Selecione a cidade <span class="text-red-700">*</span></label>
                <select name="cities" id="cities" required class="select2">
                    <option value="all">Todas as cidades</option>
                    @foreach ($cities as $item)
                        <option value="{{ $item->id }}">{{ $item->name }} / {{ $item->abbreviation_state}}</option>
                    @endforeach
                </select>
            </fieldset>
            <fieldset class="flex flex-col">
                <label for="">Selecione a categoria <span class="text-red-700">*</span></label>
                <select name="categories" required id="categories" class="select2">
                    <option value="all">Todas as categorias</option>
                    @foreach ($categories as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </fieldset>
        </div>    
    </main>
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
