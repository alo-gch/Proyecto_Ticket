@extends('layouts.app')
@section('content')
    <h3>Tickets</h3>
    <div class="row">
        @foreach ($tickets as $ticket)
            <div class="col-sm-3">
                <div class="card" style="width: 100%;">
                    <div class="card-body">
                        <h5 class="card-title">Numero: {{ $ticket->id }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Tipo: {{ $ticket->type->name }}</h6>
                        <a href="{{ route('tickets.edit',$ticket->id) }}" class="btn btn-warning">Aceptar</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    {!! $tickets->links() !!}
@endsection