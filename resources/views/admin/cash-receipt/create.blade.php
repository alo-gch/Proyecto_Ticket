@extends('layouts.app')
@section('content')
<h3>Agregar Caja</h3>
{!! Form::open(['route'=>'cajas.store','method'=>'post']) !!}
    @include('admin.cash-receipt.partials.form')
{!! Form::close() !!}
@endsection