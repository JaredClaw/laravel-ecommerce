@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Products</h1>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            @foreach ($products as $product)
                <div class="p-4 border rounded shadow">
                    <h2 class="text-xl font-semibold">{{ $product->name }}</h2>
                    <p>{{ $product->description }}</p>
                    <p class="text-green-500 font-bold">${{ $product->price }}</p>
                </div>
            @endforeach
        </div>
    </div>
@endsection
