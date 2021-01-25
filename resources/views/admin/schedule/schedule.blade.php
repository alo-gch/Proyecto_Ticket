@extends("layouts.app")


@section("content")

@if(Session()->has("ok"))
<div class="alert alert-info alert-dismissible fade show" role="alert">
  <strong>Horario actualizado</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif


<div class="row">
  <div class="clas col-md-6">
    <h2>Hora de Apertura</h2>
    <p>{{$horario->start}}</p>
  </div>

  <div class="col-md-6">
    <h2>Hora de cierre</h2>
    {{$horario->end}}
    <p></p>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <h2 class="text-center"> Cambiar horario</h2>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
      {!! Form::open(['route'=>'schedule.store','method'=>'post','class'=> "col-md-12"]) !!}
        @include("admin.schedule.partials.form")
      {!! Form::close() !!}
  </div>
</div>




@endsection
