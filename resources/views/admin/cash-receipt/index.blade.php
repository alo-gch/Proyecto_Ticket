@extends('layouts.app')
@section('content')
    <h3>Cajas <a href="{{ route('cajas.create') }}" class="btn btn-info float-right">agregar</a></h3>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Caja</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cashReceipt as $receipt)
                <tr class="text-center">
                    <td>{{ $receipt->id }}</td>
                    <td>{{ $receipt->name }}</td>
                    <td style="width: 10%;">
                        <a href="{{ route('cajas.edit',$receipt->id) }}" class="btn btn-warning">editar</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $cashReceipt->render() }}
    </div>
@endsection