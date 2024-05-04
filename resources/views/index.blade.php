@extends('layouts.app')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/homeIndex.css') }}">
    <div class="container">
        <div class="row">
            @include('products.slide')
            @include('products.cpu')
            @include('products.case')
            @include('products.mainboard')
        </div>
    </div>

@endsection
