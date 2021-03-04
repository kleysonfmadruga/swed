@extends('templates.main')

@section('pagename')
    Meu perfil
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
            <img src="{{url($user->photo)}}" id="profile-photo" alt="Foto de perfil do usuário" class="w-48 h-48 rounded-full">
            <div class="w-full flex flex-col items-center">
                <div class="flex flex-col w-5/6 mt-4">
                    <h1 for="name" class="font-bold">Nome</h1>
                    <p class="h-8 px-2 rounded">{{ $user->name }}</p>
                </div>
                <div class="flex flex-col w-5/6 mt-4">
                    <h1 for="email" class="font-bold">E-mail</h1>
                    <p class="h-8 px-2 rounded">{{ $user->email }}</p>
                </div>
            </form>
            <a href="{{route('profile.edit', $user->id)}}" class="mt-7 bg-red-600 hover:bg-red-500 text-white font-semibold px-5 py-1 rounded cursor-pointer w-48 text-center">Editar perfil</a>
            <form action="{{route('profile.disable', $user->id)}}" method="POST" class="mt-7">
                @csrf
                <input type="submit" value="Desativar meu perfil" class="bg-red-600 hover:bg-red-500 text-white font-semibold px-5 py-1 rounded cursor-pointer text-center w-60">
            </form>
        </div>
    </main>
@endsection

@section('script')
    <script src="{{ asset('libraries/toastr/js/toastr.min.js') }}"></script>
    <script src="{{ asset('libraries/toastr/js/local-toastr.js') }}"></script>
    <script type="module" src="{{ asset(mix('js/pages/view-profile/index.js')) }}"></script>

    @if ($errors->first())
        <script>
            const error = document.getElementById('error').value;
            withErros(error);
        </script>
    @endif
@endsection
