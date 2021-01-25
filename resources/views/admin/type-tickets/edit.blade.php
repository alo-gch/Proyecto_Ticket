@extends('layouts.app')
@section("content")
<div class="row">
  <div class="col-md-12">
    <h2 class="text-center"> Editar tipo de ticket  </h2>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    {!! Form::model($typeTicket,['route'=>['typeTickets.update',$typeTicket->id],'method'=>'post']) !!}
        {!! Form::hidden('id', $typeTicket->id, []) !!}
        @include('admin.type-tickets.partials.form')
    {!! Form::close() !!}
  </div>
</div>

@endsection
