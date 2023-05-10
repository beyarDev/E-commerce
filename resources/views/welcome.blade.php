<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    @vite('resources/css/app.css')
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
</head>

<body>
    <div>
        <h1 class="mt-10 mx-auto w-fit items-center text-stone-600">Welcome To Beyar E-Commerce Website</h1>
        <x-header title="Hiiiiiiiiiii" />
        <form action="search" class="mx-auto my-8  flex w-96 justify-around items-center">
            <input name="searchItem" placeholder="Looking for something?" class="p-1 rounded focus:" />
            <button class="bg-orange-300 text-gray-600 p-0.5 hover:bg-orange-500 hover:shadow-zinc-500 hover:shadow-md  border-2 rounded border-blue-400">Search</button>
        </form>

        <div class="grid grid-cols-5 gap-5 m-6 my-8">
            @foreach ($products as $product)
            <a class="w-52 items-center cursor-pointer flex flex-col" href="{{ url('/products/'. $product->product_id) }}">
                <span>{{$product->name}}</span>
                <img src="{{$product->image_url}}" alt="pic">
                <span>Price: {{$product->price}}</span>
            </a>
            @endforeach
        </div>
    </div>
</body>

</html>