@extends('templates.external')

@section('pagename')
    Swed
@endsection

@section('Local CSS')
    <link rel="stylesheet" href="{{ asset('libraries/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('libraries/select2/dist/css/select2.css') }}">
    <link rel="stylesheet" href="{{ asset('libraries/toastr/css/toastr.css') }}">
    <link rel="stylesheet" href="{{ asset('libraries/toastr/css/plugin/toastr.css') }}">
@endsection

@section('main')
@if ($errors->first())
    <input type="hidden" id="error" value="{{$errors->first()}}">
@endif
    <main class="w-full">
        <div class="w-full h-screen flex justify-center items-center bg-gradient-to-b from-red-600 to-gray-800">
            <div class="flex flex-col w-full items-center">
                <img src="{{ asset('img/swed-negative.png') }}" alt="Swed logo" />
                <form id="search-field" action="{{ route('dashboard.result') }}" method="post" class="flex flex-col justify-center h-12 w-2/5 mt-10">
                    @csrf
                    <div class="flex flex-row w-full">
                        <input type="text" name="category" id="category" class="h-full w-full px-4 outline-none rounded-l-full" placeholder="Que tipo de estabelecimento você está procurando hoje?" />
                        <div id="search-button" class="h-full w-12 cursor-pointer bg-red-600 hover:bg-red-500 rounded-r-full flex justify-center items-center">
                            <i class="feather icon-search text-white text-xl -ml-2"></i>
                        </div>
                    </div>
                    <div class="flex flex-row mt-4 justify-start items-center w-full h-12">
                        {{-- <fieldset class="pl-1">
                            <input type="checkbox" name="search_other_cities" id="search-other-cities" class="form-checkbox h-5 w-5 text-red-600 outline-none rounded">
                            <label for="search-other-cities" class="text-gray-300">Buscar em outras cidades</label>
                        </fieldset> --}}
                        <fieldset class="ml-10" id="other-cities-container">
                            <select name="cities" id="cities" class="select2 w-64">
                                <option value="all">Todas as cidades</option>
                                @foreach ($cities as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }} / {{ $item->abbreviation_state}}</option>
                                @endforeach
                            </select>
                        </fieldset>
                    </div>
                </form>
            </div>
        </div>

    </main>
@endsection

@section('script')
    <script type="module" src="{{ asset(mix('js/pages/dashboard/index.js')) }}"></script>
    <script src="{{ asset('libraries/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('libraries/select2/dist/js/select2.js') }}"></script>
    <script src="{{ asset('libraries/toastr/js/toastr.min.js') }}"></script>
    <script src="{{ asset('libraries/toastr/js/local-toastr.js') }}"></script>
    <!-- <script src="https://unpkg.com/axios/dist/axios.min.js"></script> -->

    <script>
        document.getElementById('search-button').addEventListener('click', function(element){
            document.getElementById('search-field').submit();
        });
    
        window.onload = function () {
            
            if($('.select2').length > 0) {
                $('.select2').select2({
                    dropdownAutoWidth: true,
                    width: '100%',
                    // disabled: false,
                })
            }
            
            // const states = {
            //     "Paraíba": "PB","Pernambuco": "PE","Alagoas": "AL","Rio Grande do Norte": "RN","Ceará": "CE",
            //     "Maranhão": "MA","Bahia": "BA","Sergipe": "SE","Tocantins": "TO","Goiás": "GO","Distrito Federal": "DF",
            //     "São Paulo": "SP","Rio de Janeiro": "RJ","Minas Gerais": "MG","Espirito Santo": "ES","Paraná": "PR",
            //     "Santa Catarina": "SC","Rio Grande do Sul": "RS","Mato Grosso": "MT","Mato Grosso do Sul": "MS",
            //     "Amazonas": "AM","Acre": "AC","Rondônia": "RO","Roraima": "RR","Amapá": "AP","Pará": "PA","Piauí": "PI"
            // }
        
            // var lat;
            // var long;
    
            // navigator.geolocation.getCurrentPosition((coord) => {
            //     lat = coord.coords.latitude;
            //     long = coord.coords.longitude;
        
            //     axios.get(`https://eu1.locationiq.com/v1/reverse.php?key=pk.bc961a9e76b8a74f009b498a3aa3ec8f&lat=${lat}&lon=${long}&format=json`)
            //     .then((response) => {
            //         village = response.data.address.village;
            //         town = response.data.address.town;
            //         city = response.data.address.city;
            //         state = states[response.data.address.state];
                    
            //         var address;

            //         if (village != undefined) {
            //             address = village + " / " + state;
            //         } else if (town != undefined) {
            //             address = town + " / " + state;
            //         } else {
            //             address = city + " / " + state;
            //         }
                    
            //         console.log(address)
                    
            //         $('.select2').val(address);
            //         $('.select2').trigger('change.select2');
            //     });
        
            // });
        };
    </script>

    @if ($errors->first())
        <script>
            const error = document.getElementById('error').value;
            withWarning(error);
        </script>
    @endif
   
@endsection
