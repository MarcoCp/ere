@extends('layouts.app')

@section('title', 'Clientes')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @include('partials.sidebar')
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <form method="post" action="{{ route('clients.update', $clients) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="name">Nombre</label>
                                <input type="text" name="name" class="form-control @if ($errors->has('name')) is-invalid @endif" value="{{ old('name', $clients->name) }}">
                                @if ($errors->has('name'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('name') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label for="lastname">Apellido</label>
                                <input type="text" name="lastname" class="form-control" value="{{ old('name', $clients->lastname) }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="position">Cargo</label>
                                <input type="text" name="position" class="form-control" value="{{ old('name', $clients->position) }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="company">Empresa</label>
                                <input type="text" name="company" class="form-control" value="{{ old('name', $clients->company) }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="phone">Teléfono</label>
                                <input type="text" name="phone" class="form-control" value="{{ old('name', $clients->phone) }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" value="{{ old('name', $clients->email) }}">
                            </div>
                            <button type="submit" class="btn btn-primary">Enviar</button>                            
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
