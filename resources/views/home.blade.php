@extends('layouts.app')

@section('title', 'Home Page')

@section('content')
    <div class="min-h-96 flex items-center justify-center">
        <!-- Main Content Container -->
        <div class="text-center p-4 w-full max-w-4xl">
            <h1 class="text-5xl text-white font-bold mb-4">Welcome to the Home Page</h1>
            <p class="text-3xl text-white font-semibold mb-7">This is a basic crud app.</p>

            <!-- Your other content goes here -->
            <a href="{{ route('products.index') }}" class="bg-blue-600 font-semibold ring-2 ring-blue-700 text-white py-3 px-4 rounded-lg hover:bg-blue-500 shadow-black hover:drop-shadow-xl focus:bg-white focus:text-blue-800 focus:drop-shadow-2xl">View Products</a>
        </div>
    </div>
@endsection
