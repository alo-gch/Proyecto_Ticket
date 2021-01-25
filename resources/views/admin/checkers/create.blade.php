@extends('layouts.app')
@section('content')
<h3>Agregar Cajero</h3>
{!! Form::open(['route'=>'cajeros.store','method'=>'post']) !!}
    @include('admin.checkers.partials.form')
{!! Form::close() !!}
@endsection