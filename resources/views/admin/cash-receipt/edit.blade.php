@extends('layouts.app')
@section('content')
<h3>Editar Cajero</h3>
{!! Form::model($caja,['route'=>['cajas.update',$caja->id],'method'=>'put']) !!}
    @include('admin.cash-receipt.partials.form')
{!! Form::close() !!}
@endsection