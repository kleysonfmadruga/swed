@extends('templates.main')

@section('pagename')
    Resultado da busca
@endsection

@section('main')
    <main class="w-full flex justify-center items-start bg-gray-200">
        <div class="w-2/3 min-h-screen bg-white py-14 px-24 flex flex-col items-center">
            @foreach ($establishments as $item)
                <x-EstablishmentCard
                    route="{{ route('dashboard.result.show', ['id' => $item->id]) }}"
                    name="{{$item->name}}"
                    description="{{$item->description}}"
                    image="{{ url('storage/establishment/default.jpg') }}"
                />
            @endforeach
        </div>
    </main>
@endsection

@section('script')
    <script type="module" src="{{ asset(mix('js/pages/result/index.js')) }}"></script>
@endsection
