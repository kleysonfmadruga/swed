@extends('templates.main')

@section('pagename')
    {{ $establishment->name ?? 'Meu negócio' }}
@endsection

@section('Local CSS')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="{{ asset(mix('css/pages/result/show-result/index.css')) }}">
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
    <main class="w-full flex justify-center items-start bg-gray-200">
        <div class="min-h-screen w-3/4 bg-white pt-14 px-12 flex flex-col justify-start items-start">
            <div class="w-full flex flex-col justify-center px-16 mt-8">
                <div class="flex justify-between items-center">
                    <img src="{{ url('storage/establishment/default.jpg') }}" alt="" class="w-3/12 rounded"/>
                    <div class="flex flex-col justify-evenly w-8/12">
                        <h2 class="text-lg font-bold">{{ $establishment->name ?? 'Mussum Ipsum' }}</h2>
                        <p>{{ $establishment->description ?? 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.' }}</p>
                    </div>
                </div>
                <div class="flex justify-evenly items-center mt-8">
                    <div class="flex flex-col justify-evenly w-1/3">
                        <h2 class="text-lg font-bold">Horário de funcionamento</h2>
                        <p>{{ $establishment->opening_hours ?? 'Das 08h00 às 20h00' }}</p>
                    </div>
                    <div class="flex flex-col justify-evenly w-1/3">
                        <h2 class="text-lg font-bold">CNPJ</h2>
                        <p>{{ $establishment->cnpj ?? '12.345.678/9012-34' }}</p>
                    </div>
                    <div class="flex flex-col justify-evenly w-1/3">
                        <h2 class="text-lg font-bold">Telefone de contato</h2>
                        <p>{{ $establishment->getPhone() ?? '+0000' }}</p>
                    </div>
                </div>
                <div class="flex justify-evenly items-center mt-8">
                    <div class="flex flex-col justify-evenly w-1/3">
                        <h2 class="text-lg font-bold">Gerentes</h2>
                        <p>{{ $establishment->getManager() ?? 'João das Couves' }}</p>
                    </div>
                    <div class="flex flex-col justify-evenly w-2/3">
                        <h2 class="text-lg font-bold">Endereços</h2>
                        <p>{{ $establishment->getAddress() ?? 'Rua dos Bobos, nº 0' }}</p>
                    </div>
                </div>
            </div>

            <div class="flex flex-row justify-between w-full h-10 items-center my-4">
                <h2 class="text-lg font-bold my-5">Serviços</h2>
            </div>

            <table id="services" class="table-starter w-full">
                <thead>
                    <tr>
                        <th class="w-1/5">Nome</th>
                        <th class="w-1/5">Preço</th>
                        <th class="w-3/5">Descrição</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($establishment_services as $item)
                        <tr>
                            <td>{{ $item->service_name }}</td>
                            <td>{{ $item->price }}</td>
                            <td>{{ $item->description }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="flex flex-row justify-between w-full h-10 items-center mb-4 mt-12">
                <h2 class="text-lg font-bold my-5">Produtos</h2>
            </div>

            <table id="products" class="table-starter mt-10 w-full">
                <thead>
                    <tr>
                        <th class="w-1/5">Nome</th>
                        <th class="w-1/5">Preço</th>
                        <th class="w-3/5">Descrição</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($establishment_products as $item)
                        <td>{{ $item->product_name }}</td>
                        <td>{{ $item->price }}</td>
                        <td>{{ $item->description }}</td>
                    @endforeach
                </tbody>
            </table>
            {{-- <div class="m-5"></div>
            <div class="flex flex-row mt-2 mb-24 items-center">
                <i class="feather icon-star-on text-yellow-400 text-xl"></i>
                <i class="feather icon-star-on text-yellow-400 text-xl"></i>
                <i class="feather icon-star-on text-yellow-400 text-xl"></i>
                <i class="feather icon-star-on text-yellow-400 text-xl"></i>
                <i class="feather icon-star text-yellow-400 text-xl"></i>
                <p class="ml-2">4.5</p>
            </div> --}}
        </div>

    </main>
@endsection

@section('script')
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready( function () {
            $('.table-starter').DataTable();
        } );
    </script>

    <script src="{{ asset('libraries/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('libraries/select2/dist/js/select2.js') }}"></script>
    <script src="{{ asset('libraries/app.js') }}"></script>

    <script src="{{ asset('libraries/toastr/js/toastr.min.js') }}"></script>
    <script src="{{ asset('libraries/toastr/js/local-toastr.js') }}"></script>
    <script type="module" src="{{ asset(mix('js/pages/show-result/index.js')) }}"></script>

    @if ($errors->first())
        <script>
            const error = document.getElementById('error').value;
            withErros(error);
        </script>
    @endif
@endsection
