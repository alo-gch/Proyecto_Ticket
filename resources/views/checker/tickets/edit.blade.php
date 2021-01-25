@extends('layouts.app')
@section('content')
    <h3>Validar Tickets</h3>
    {!! Form::model($ticket, ['route'=>['tickets.update',$ticket->id],'method'=>'put']) !!}
        @include('checker.tickets.partials.form')
    {!! Form::close() !!}
@endsection