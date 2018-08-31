@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <td>ID</td>
                                <td>Nombres</td>
                                <td>Apellidos</td>
                                <td>Cargo</td>
                                <td>Empresa</td>
                                <td>Teléfono</td>
                                <td>Email</td>
                                <td>Acciones</td>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($clients as $key => $value)
                            <tr>
                                <td>{{ $value->id }}</td>
                                <td>{{ $value->name }}</td>
                                <td>{{ $value->lastname }}</td>
                                <td>{{ $value->position }}</td>
                                <td>{{ $value->company }}</td>
                                <td>{{ $value->phone }}</td>
                                <td>{{ $value->email }}</td>
                                <td>
                                    <a class="btn btn-small btn-success" href="{{ route('clients.show', $value) }}">Ver</a>
                                    <a class="btn btn-small btn-info" href="{{ route('clients.edit', $value) }}">Editar</a>
                                    <form action="{{ route('clients.destroy', $value) }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button class="btn btn-small btn-danger" type="submit">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
