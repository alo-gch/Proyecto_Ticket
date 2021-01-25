@extends('layouts.app')
@section('content')
    <h3>Cajeros <a href="{{ route('cajeros.create') }}" class="btn btn-info float-right">agregar</a></h3>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Matricula</th>
                    <th>Caja</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr class="text-center">
                    <td>
                        {{ $user->people->first_name }}
                        {{ $user->people->second_name }}
                        {{ $user->people->first_surname }}
                        {{ $user->people->second_surname }}
                    </td>
                    <td>{{ $user->enrollment }}</td>
                    <td>{{ $user->people->cashReceipt->name }}</td>
                    <td style="width: 10%;">
                        <a href="{{ route('cajeros.edit',$user->id) }}" class="btn btn-warning">editar</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $users->render() }}
    </div>
@endsection