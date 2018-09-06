@extends('layouts.app')

@section('title', 'Clientes')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @include('partials.sidebar')
        <div class="col-md-9">
            <div class="card">
                <div class="card-header clearfix">
                    <a href="{{ route('quotes.create') }}" class="btn btn-primary float-left" role="button" aria-pressed="true">Nuevo</a>
                    <div class="input-group col-md-4 px-0 float-right">                        
                        <form class="form-inline my-lg-0" method="get" action="{{ route('quotes.index') }}">
                            <input class="form-control mr-sm-2" type="search" placeholder="Buscar..." name="buscar" value="{{ request()->input('buscar') }}">
                            <button class="btn btn-primary my-sm-0" type="submit">Buscar</button>
                        </form>
                    </div>
                </div>

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
                                <td>Proyecto</td>
                                <td>Fecha</td>
                                <td>Cliente</td>
                                <td>Presupuesto</td>
                                <td>Acciones</td>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($quote as $key => $value)
                            <tr>
                                <td>{{ $value->id }}</td>
                                <td>{{ $value->project }}</td>
                                <td>{{ $value->date }}</td>
                                <td>{{ $value->client->name }} {{ $value->client->lastname }}</td>
                                <td>{{ $value->budget }}</td>
                                <td>
                                    <a class="btn btn-small btn-success" href="{{ route('quotes.show', $value) }}">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a class="btn btn-small btn-info" href="{{ route('quotes.edit', $value) }}">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{ $value->id }}">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </td>
                            </tr>                            
                        @endforeach
                        </tbody>                        
                    </table>
                    {{ $quote->appends(request()->input())->links() }}
                    @foreach($quote as $key => $value)
                        <!-- deleteModal -->
                        <div class="modal fade" id="deleteModal{{ $value->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Eliminar</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        ¿Esta seguro que desea eliminar este elemento?
                                    </div>
                                    <div class="modal-footer">
                                        <form action="{{ route('quotes.destroy', $value) }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                            <button class="btn btn-small btn-danger" type="submit">Eliminar</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
