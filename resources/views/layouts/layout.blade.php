@extends('layouts.app')
@section('content')
    <h3 class="text-center">
        Bienvenido {{ auth()->user()->people->first_name }}
        {{ auth()->user()->people->second_name }}
        {{ auth()->user()->people->first_surname }}
        {{ auth()->user()->people->second_surname }}
    </h3>
@endsection