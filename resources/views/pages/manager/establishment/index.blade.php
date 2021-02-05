@extends('templates.main')

@section('title')
    {{ $name ?? 'Meu negócio' }}
@endsection

@section('Local CSS')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="{{ asset(mix('css/pages/manager/establishment/index.css')) }}">
@endsection

@section('main')
    <main class="w-full flex justify-center items-start bg-gray-200">
        <div class="min-h-screen w-3/4 bg-white pt-14 px-12 flex flex-col justify-start items-start">
            <div class="h-52 w-full flex justify-evenly items-center">
                <img src="https://www.otvfoco.com.br/wp-content/uploads/2019/10/Mussum.jpg" alt="" class="w-3/12 rounded"/>
                <div class="flex flex-col justify-evenly w-8/12">
                    <h2 class="text-lg font-bold">{{ $name ?? 'Mussum Ipsum' }}</h2>
                    <p>{{ $description ?? 'Mussum ipsum cacildis vidi litro abertis Mussum ipsum cacildis vidi litro abertis Mussum ipsum cacildis vidi litro abertis Mussum ipsum cacildis vidi litro abertis Mussum ipsum cacildis vidi litro abertis Mussum ipsum cacildis vidi litro abertis Mussum ipsum cacildis vidi litro abertis' }}</p>
                </div>
            </div>

                <div class="flex flex-row justify-between w-full h-10 items-center my-4">
                    <h2 class="text-lg font-bold my-5">Meus serviços</h2>
                    <a class="py-2 px-6 text-white bg-blue-600 hover:bg-blue-500 rounded cursor-pointer">Novo serviço</a>
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
                        <tr>
                            <td></td>
                            <td></td>
                            <td class="flex flex-row justify-evenly ">
                                <a class="py-2 px-6 text-white bg-blue-600 hover:bg-blue-500 rounded cursor-pointer">Visualizar</a>
                                <a class="py-2 px-6 text-white bg-yellow-600 hover:bg-yellow-500 rounded cursor-pointer">Editar</a>
                                <a class="py-2 px-6 text-white bg-red-600 hover:bg-red-500 rounded cursor-pointer">Remover</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="flex flex-row justify-between w-full h-10 items-center mb-4 mt-12">
                    <h2 class="text-lg font-bold my-5">Meus produtos</h2>
                    <a class="py-2 px-6 text-white bg-blue-600 hover:bg-blue-500 rounded cursor-pointer">Novo produto</a>
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
                        <td></td>
                        <td></td>
                        <td class="flex flex-row justify-evenly ">
                            <a class="py-2 px-6 text-white bg-blue-600 hover:bg-blue-500 rounded cursor-pointer">Visualizar</a>
                            <a class="py-2 px-6 text-white bg-yellow-600 hover:bg-yellow-500 rounded cursor-pointer">Editar</a>
                            <a class="py-2 px-6 text-white bg-red-600 hover:bg-red-500 rounded cursor-pointer">Remover</a>
                        </td>
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
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready( function () {
            $('.table-starter').DataTable();
        } );
    </script>
@endsection
