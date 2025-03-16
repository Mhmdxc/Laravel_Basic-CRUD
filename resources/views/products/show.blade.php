@extends('layouts.app')

@section('title', 'Product')

@section('content')
    <x-product-table :products="$products" />
@endsection
