@extends('templates.main')

@section('pagename')
    Editar estabelecimento
@endsection

@section('Local CSS')
    <link rel="stylesheet" href="{{ asset('libraries/toastr/css/toastr.css') }}">
    <link rel="stylesheet" href="{{ asset('libraries/toastr/css/plugin/toastr.css') }}">
@endsection

@section('main')
    @if ($errors->first())
        <input type="hidden" id="error" value="{{$errors->first()}}">
    @endif

    <main class="w-full flex justify-center items-start bg-gray-200">
        <div class="w-3/6 min-h-screen bg-white py-14 px-24 flex flex-col items-center">
            <span class="text-2xl my-4 font-bold">Meu estabelecimento</span>
            <img src="{{url('storage/establishment/default.jpg')}}" id="establishment-photo" alt="Foto do estabelecimento" class="w-48 h-28 rounded-full">

            <form action="{{ route('establishment.merge') }}" method="POST" class="w-full flex flex-col items-center">
                @csrf
                <input type="hidden" name="id" id="id" value="{{$establishment->id}}"/>
                <fieldset class="flex flex-col w-5/6 mt-12">
                    <label for="photo" class="font-bold">Foto do estabelecimento</label>
                    <input type="file" name="photo" accept="image/png, image/jpg, image/jpeg"/>
                </fieldset>
                <fieldset class="flex flex-col w-5/6 mt-4">
                    <label for="name" class="font-bold">Nome</label>
                    <input type="text" value="{{$establishment->name}}" name="name" id="name" class="h-8 px-2 rounded"/>
                </fieldset>
                <fieldset class="flex flex-col w-5/6 mt-4">
                    <label for="description" class="font-bold">Descrição do estabelecimento</label>
                    <textarea type="text" placeholder="Informe a descrição do estabelecimento" name="description">{{$establishment->description}}</textarea>
                </fieldset>
                <fieldset class="flex flex-col w-5/6 mt-4">
                    <label for="cnpj" class="font-bold">CNPJ</label>
                    <input type="text" class="cnpj" value="{{ $establishment->cnpj ?? '12.345.678/9012-34' }}" name="cnpj" id="cnpj" class="h-8 px-2 rounded"/>
                </fieldset>
                <fieldset class="flex flex-col w-5/6 mt-4">
                    <label for="opening_hours" class="font-bold">Horário de funcionamento</label>
                    <input type="text" class="time-in-time" value="{{$establishment->opening_hours}}" name="opening_hours" id="opening_hours" class="h-8 px-2 rounded"/>
                </fieldset>
                <fieldset class="flex flex-col w-5/6 mt-4">
                    <label for="phone" class="font-bold">Telefone de contato</label>
                    <input type="text" class="celular" value="{{$establishment->getPhone()}}" name="phone" id="phone" class="h-8 px-2 rounded"/>
                </fieldset>
                <fieldset class="flex flex-col w-5/6 mt-4">
                    <label for="neighborhood" class="font-bold">Bairro</label>
                    <input type="text" value="{{$addresses[0]->neighborhood}}" name="neighborhood" id="neighborhood" class="h-8 px-2 rounded"/>
                </fieldset>
                <fieldset class="flex flex-col w-5/6 mt-4">
                    <label for="street" class="font-bold">Rua</label>
                    <input type="text" value="{{$addresses[0]->street}}" name="street" id="street" class="h-8 px-2 rounded"/>
                </fieldset>
                <fieldset class="flex flex-col w-5/6 mt-4">
                    <label for="cep" class="font-bold">CEP</label>
                    <input type="text" class="cep" value="{{$addresses[0]->cep}}" name="cep" id="cep" class="h-8 px-2 rounded"/>
                </fieldset>
                <fieldset class="flex flex-col w-5/6 mt-4">
                    <label for="cities" class="font-bold">Selecione a cidade</label>
                    <select name="cities" id="cities" class="select2">
                        <option value="all">Todas as cidades</option>
                        @foreach ($cities as $item)
                            @if ($item->name == $selectedCity[0]->name && $item->abbreviation_state == $selectedState[0]->abbreviation)
                                <option value="{{ $item->id }}" selected>{{ $item->name }} / {{ $item->abbreviation_state}}</option>
                            @else
                                <option value="{{ $item->id }}">{{ $item->name }} / {{ $item->abbreviation_state}}</option>
                            @endif


                        @endforeach
                    </select>
                </fieldset>
                <input type="submit" value="Salvar" class="mt-7 bg-red-600 hover:bg-red-500 text-white font-semibold px-5 py-1 rounded cursor-pointer w-28" />
            </form>
        </div>
    </main>

@endsection

@section('script')
    <script src="{{ asset('libraries/toastr/js/toastr.min.js') }}"></script>
    <script src="{{ asset('libraries/toastr/js/local-toastr.js') }}"></script>
    <script type="module" src="{{ asset(mix('js/pages/edit-establishment/index.js')) }}"></script>

    @if ($errors->first())
        <script>
            const error = document.getElementById('error').value;
            withErros(error);
        </script>
    @endif
@endsection
