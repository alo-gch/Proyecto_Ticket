@extends('layouts.app')
@section('content')
<h3>Editar Cajero</h3>
{!! Form::model($user,['route'=>['cajeros.update',$user->id],'method'=>'put']) !!}
    {!! Form::hidden('id', $user->id, []) !!}
    @include('admin.checkers.partials.form')
{!! Form::close() !!}
@endsection