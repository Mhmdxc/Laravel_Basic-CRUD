@extends('layouts.app')

@section('title', 'Edit Product')

@section('content')
    <x-product-form :routeName="'products.update'" :method="'PUT'" :product="$product" />
@endsection
