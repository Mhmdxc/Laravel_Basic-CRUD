@extends('layouts.app')

@section('title', "Product List")

@section('content')
    @if(session('success'))
        <div class="w-fit mx-auto mt-8 py-3 px-4 text-xl bg-green-600 border border-white text-white font-semibold rounded-3xl text-center shadow-xs shadow-white">
            {{ session('success') }}
        </div>
    @endif
    <x-product-table :products="$products" />
@endsection
