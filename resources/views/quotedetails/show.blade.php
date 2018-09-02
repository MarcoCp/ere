@extends('layouts.app')

@section('title', 'Clientes')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @include('partials.sidebar')
        <div class="col-md-9">
            <div class="card text-center">
                @foreach ($quotedetails as $key => $value)
                <div class="card-header">
                    Cliente N° {{ $value->id }}
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h5 class="card-title"><b>{{ $value->name }} {{ $value->category }}</b></h5>
                    <p class="card-text"><b>{{ $value->duration }}</b> en <b>{{ $value->pricehour }}</b></p>                    
                    <form action="{{ route('quotedetails.destroy', $value) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <a href="{{ route('quotedetails.edit', $value) }}" class="btn btn-primary">Editar</a>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{ $value->id }}">
                            Eliminar
                        </button>
                    </form>
                </div>
                <div class="card-footer text-muted">
                    <b>Teléfono:</b>{{ $value->price }}
                </div>
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
                                <form action="{{ route('quotedetails.destroy', $value) }}" method="POST">
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
@endsection
