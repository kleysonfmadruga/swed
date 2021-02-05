<a class="h-52 w-full bg-gray-100 hover:bg-gray-200 border-gray-300 mt-5
        duration-200 rounded border hover:shadow cursor-pointer flex
        justify-evenly items-center"
>
    <img src="{{ $image ?? '' }}" alt="" class="w-2/12 rounded">
    <div class="flex flex-col justify-evenly w-9/12">
        <h2 class="text-lg font-bold">{{ $name ?? '' }}</h2>
        <p>{{ $description ?? '' }}</p>
        <div class="flex flex-row mt-2 items-center">
            <i class="feather icon-star-on text-yellow-400 text-xl"></i>
            <i class="feather icon-star-on text-yellow-400 text-xl"></i>
            <i class="feather icon-star-on text-yellow-400 text-xl"></i>
            <i class="feather icon-star-on text-yellow-400 text-xl"></i>
            <i class="feather icon-star text-yellow-400 text-xl"></i>
            <p class="ml-2">4.5</p>
        </div>
    </div>
    
</a>
