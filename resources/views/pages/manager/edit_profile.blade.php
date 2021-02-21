@extends('templates.main')

@section('pagename')
    Editar perfil
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
            <span class="text-2xl my-4 font-bold">Meu perfil</span>
            <img src="{{url('storage/perfil.jpg')}}" id="profile-photo" alt="Foto de perfil do usuário" class="w-48 h-48 rounded-full">
            <form action="#" method="post" enctype="multipart/form-data" class="w-full flex flex-col items-center">
                @csrf
                @method('PUT')
                <fieldset class="flex flex-col w-5/6 mt-12">
                    <label for="name" class="font-bold">Foto do perfil</label>
                    <input type="file" class="h-8 px-2 rounded" name="photo" id="photo" accept="image/png, image/jpeg, image/jpg">
                </fieldset>
                <fieldset class="flex flex-col w-5/6 mt-4">
                    <label for="name" class="font-bold">Nome</label>
                    <input type="text" value="{{ $user->name }}" name="name" id="name" class="h-8 px-2 rounded" />
                </fieldset>
                <fieldset class="flex flex-col w-5/6 mt-4">
                    <label for="email" class="font-bold">E-mail</label>
                    <input type="email" value="{{ $user->email }}" name="email" id="email" class="h-8 px-2 rounded" />
                </fieldset>
                <fieldset class="flex flex-col w-5/6 mt-4">
                    <label for="password" class="font-bold">Senha</label>
                    <input type="password" name="password" id="password" class="h-8 px-2 rounded" required/>
                </fieldset>
                <input type="submit" value="Salvar" class="mt-7 bg-red-600 hover:bg-red-500 text-white font-semibold px-5 py-1 rounded cursor-pointer w-28" />
            </form>
        </div>
    </main>
@endsection

@section('script')
    <script src="{{ asset('libraries/toastr/js/toastr.min.js') }}"></script>
    <script src="{{ asset('libraries/toastr/js/local-toastr.js') }}"></script>
    <script type="module" src="{{ asset(mix('js/pages/edit-profile/index.js')) }}"></script>

    @if ($errors->first())
        <script>
            const error = document.getElementById('error').value;
            withErros(error);
        </script>
    @endif
@endsection
