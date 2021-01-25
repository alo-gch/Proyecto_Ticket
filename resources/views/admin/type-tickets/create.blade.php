@extends("layouts.app")


@section("content")
<div class="row">
  <div class="col-md-12">
    <h2 class="text-center"> Añadir tipo de ticket  </h2>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
      {!! Form::open(['route'=>'typeTickets.store','method'=>'post','class'=> "col-md-12"]) !!}
        @include("admin.type-tickets.partials.form")
      {!! Form::close() !!}
  </div>
</div>

@endsection
