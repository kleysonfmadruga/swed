@extends('templates.main')

@section('pagename')
    Minha página
@endsection

@section('main')
<main class="w-full flex justify-center items-start bg-gray-200 ">

    <div class="w-3/4 min-h-screen bg-white pt-14 px-12">
        <h1 class="mt-5 text-2xl font-bold">Meus estabelecimentos</h1>

        <x-EstablishmentCard
            name="Mussum ipsum"
            description="Mussum Ipsum, cacilds vidis litro abertis. Interessantiss quisso pudia ce receita de bolis, mais bolis eu num gostis. Não sou faixa preta cumpadi, sou preto inteiris,"
            image="{{ asset('img/imagem-estabelecimento.jpg') }}"
        />
        <x-EstablishmentCard
            name="Mussum ipsum"
            description="Mussum Ipsum, cacilds vidis litro abertis. Interessantiss quisso pudia ce receita de bolis, mais bolis eu num gostis. Não sou faixa preta cumpadi, sou preto inteiris,"
            image="{{ asset('img/imagem-estabelecimento.jpg') }}"
        >
        </x-EstablishmentCard>

        <a class="h-52 w-full bg-gray-100 hover:bg-gray-200 border-gray-300 mt-5
                    duration-200 rounded border hover:shadow cursor-pointer flex
                    justify-center items-center mb-10">
                <i class="feather icon-plus text-gray-800 text-2xl"></i>
        </a>
    </div>
</main>
@endsection
