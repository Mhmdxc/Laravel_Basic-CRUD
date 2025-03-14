@extends('layouts.app')

@section('title', 'Create Product')

@section('content')
    <x-product-form :method="'POST'" :routeName="'products.store'" />
@endsection
