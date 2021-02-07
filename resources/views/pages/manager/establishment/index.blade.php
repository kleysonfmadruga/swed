@extends('templates.main')

@section('title')
    {{ $name ?? 'Meu negócio' }}
@endsection

@section('Local CSS')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="{{ asset(mix('css/pages/manager/establishment/index.css')) }}">
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
<x-Modal classAbrirModal="new-service" titleModal="Cadastro de Serviço" routeFormAction="{{ route('service.merge') }}">
    <input type="hidden" name="establishment_id" value="{{ $establishment->id }}">
    <fieldset class="flex flex-col w-36">
        <label for="">Serviços</label>
        <select new-content="new-service" name="service" id="service" class="select2" required>
            <option disabled selected>Selecione um Serviço</option>
            @foreach ($services as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
            <option value="new">Cadastrar um novo</option>
        </select>
    </fieldset>
    <div id="new-service" class="hidden">
        <fieldset class="flex flex-col w-36">
            <label for="">Informe o nome do serviço</label>
            <input type="text" disabled placeholder="Digite o nome do novo serviço" name="new_service">
        </fieldset>
    </div>
    <fieldset class="flex flex-col w-36">
        <label for="">Informe o preço do serviço</label>
        <input type="number" placeholder="Digite o preço do serviço" name="price">
    </fieldset>
    <fieldset class="flex flex-col w-36">
        <label for="">Descrição do serviço</label>
        <textarea type="text" placeholder="Informe a descrição do estabelecimento" name="description"></textarea>
    </fieldset>
</x-Modal>

<x-Modal classAbrirModal="new-product" titleModal="Cadastro de Produto" routeFormAction="{{ route('product.merge') }}">
    <input type="hidden" name="establishment_id" value="{{ $establishment->id }}">
    <fieldset class="flex flex-col w-36">
        <label for="">Produtos</label>
        <select new-content="new-product" name="product" id="product" class="select2" required>
            <option disabled selected>Selecione um Produto</option>
            @foreach ($products as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
            <option value="new">Cadastrar um novo</option>
        </select>
    </fieldset>
    <div id="new-product" class="hidden">
        <fieldset class="flex flex-col w-36">
            <label for="">Informe o nome do produto</label>
            <input type="text" disabled placeholder="Digite o nome do novo produto" name="new_product">
        </fieldset>
    </div>
    <fieldset class="flex flex-col w-36">
        <label for="">Informe o preço do produto</label>
        <input type="number" placeholder="Digite o preço do produto" name="price">
    </fieldset>
    <fieldset class="flex flex-col w-36">
        <label for="">Descrição do produto</label>
        <textarea type="text" placeholder="Informe a descrição do estabelecimento" name="description"></textarea>
    </fieldset>
</x-Modal>
<x-ModalShow classAbrirModal="show-service" titleModal="Meu serviço">
    <div class="flex flex-col w-72">
        <h3 class="text-md font-bold">Nome do serviço</h3>
        <p>Nome de teste</p>
    </div>
    <div class="flex flex-col w-72 mt-4">
        <h3 class="text-md font-bold">Preço do serviço</h3>
        <p>R$ 2323,20</p>
    </div>
    <div class="flex flex-col w-72 mt-4">
        <h3 class="text-md font-bold">Descrição do serviço</h3>
        <p>É um serviço bem testado</p>
    </div>
</x-ModalShow>
<x-ModalShow classAbrirModal="show-product" titleModal="Meu produto">
    <div class="flex flex-col w-72">
        <h3 class="text-md font-bold">Nome do produto</h3>
        <p>Produto de teste</p>
    </div>
    <div class="flex flex-col w-72 mt-4">
        <h3 class="text-md font-bold">Preço do produto</h3>
        <p>R$ 23,20</p>
    </div>
    <div class="flex flex-col w-72 mt-4">
        <h3 class="text-md font-bold">Descrição do produto</h3>
        <p>É um produto bem comprado</p>
    </div>
</x-ModalShow>

    <main class="w-full flex justify-center items-start bg-gray-200">
        <div class="min-h-screen w-3/4 bg-white pt-14 px-12 flex flex-col justify-start items-start">
            <div class="h-52 w-full flex justify-evenly items-center">
                <img src="https://www.otvfoco.com.br/wp-content/uploads/2019/10/Mussum.jpg" alt="" class="w-3/12 rounded"/>
                <div class="flex flex-col justify-evenly w-8/12">
                    <h2 class="text-lg font-bold">{{ $establishment->name ?? 'Mussum Ipsum' }}</h2>
                    <p>{{ $establishment->description ?? 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.' }}</p>
                </div>
            </div>

                <div class="flex flex-row justify-between w-full h-10 items-center my-4">
                    <h2 class="text-lg font-bold my-5">Meus serviços</h2>
                    <a show-modal="modal-new-service" class="py-2 px-6 text-white bg-blue-600 hover:bg-blue-500 rounded cursor-pointer">Novo serviço</a>
                </div>
                
                <table id="services" class="table-starter">
                    <thead>
                        <tr>
                            <th class="w-2/5">Nome</th>
                            <th class="w-1/5">Preço</th>
                            <th class="w-2/5">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($establishment_services as $item)
                            <tr>
                                <td>{{ $item->service_name }}</td>
                                <td>{{ $item->price }}</td>
                                <td class="flex flex-row justify-evenly ">
                                    <a show-modal="modal-show-service" class="py-2 px-6 text-white bg-blue-600 hover:bg-blue-500 rounded cursor-pointer">Visualizar</a>
                                    <a href="#" class="py-2 px-6 text-white bg-yellow-600 hover:bg-yellow-500 rounded cursor-pointer">Editar</a>
                                    <a href="{{ route('service.delete', ['establishment_service_id' => $item->id,  'establishment_id' => $establishment->id]) }}" class="py-2 px-6 text-white bg-red-600 hover:bg-red-500 rounded cursor-pointer">Remover</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="flex flex-row justify-between w-full h-10 items-center mb-4 mt-12">
                    <h2 class="text-lg font-bold my-5">Meus produtos</h2>
                    <a show-modal="modal-new-product" class="py-2 px-6 text-white bg-blue-600 hover:bg-blue-500 rounded cursor-pointer">Novo produto</a>
                </div>
                
                <table id="products" class="table-starter mt-10">
                    <thead>
                        <tr>
                            <th class="w-2/5">Nome</th>
                            <th class="w-1/5">Preço</th>
                            <th class="w-2/5">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($establishment_products as $item)
                            <td>{{ $item->product_name }}</td>
                            <td>{{ $item->price }}</td>
                            <td class="flex flex-row justify-evenly ">
                                <a show-modal="modal-show-product" class="py-2 px-6 text-white bg-blue-600 hover:bg-blue-500 rounded cursor-pointer">Visualizar</a>
                                <a class="py-2 px-6 text-white bg-yellow-600 hover:bg-yellow-500 rounded cursor-pointer">Editar</a>
                                <a href="{{ route('product.delete', ['establishment_product_id' => $item->id, 'establishment_id' => $establishment->id]) }}" class="py-2 px-6 text-white bg-red-600 hover:bg-red-500 rounded cursor-pointer">Remover</a>
                            </td>
                        @endforeach
                    </tbody>
                </table>
                <div class="m-5"></div>
            <div class="flex flex-row mt-2 mb-24 items-center">
                <i class="feather icon-star-on text-yellow-400 text-xl"></i>
                <i class="feather icon-star-on text-yellow-400 text-xl"></i>
                <i class="feather icon-star-on text-yellow-400 text-xl"></i>
                <i class="feather icon-star-on text-yellow-400 text-xl"></i>
                <i class="feather icon-star text-yellow-400 text-xl"></i>
                <p class="ml-2">4.5</p>
            </div>
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
    <script src="{{ asset(mix('js/etc/modal.js')) }}"></script>
    <script type="module" src="{{ asset(mix('js/pages/manager/index.js')) }}"></script>

    @if ($errors->first())
        <script>
            const error = document.getElementById('error').value;
            withErros(error);
        </script>
    @endif
@endsection
