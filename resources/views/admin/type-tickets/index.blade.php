@extends('layouts.app')
@section('content')

@if(Session()->has("ok"))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Tipo de ticket guardado</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif

@if(Session()->has("editok"))
<div class="alert alert-info alert-dismissible fade show" role="alert">
  <strong>Tipo de ticket actualizado</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif

@if(Session()->has("deleteok"))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Tipo de ticket eliminado</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif



    <h3>Tipos de tickets <a href="{{ route('typeTickets.create') }}" class="btn btn-info float-right">agregar</a></h3>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($typeTickets as $ticket)
                <tr class="text-center">
                    <td>{{ $ticket->id }}</td>
                    <td>{{ $ticket->name }}</td>
                    <td style="width: 10%;">
                        <a href="{{ route('typeTickets.edit',$ticket->id) }}" class="btn btn-warning">editar</a>
                        <a href="{{ route('typeTickets.delete', $ticket->id) }}" class="btn btn-danger mt-4">Eliminar</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $typeTickets->render() }}
    </div>
@endsection
