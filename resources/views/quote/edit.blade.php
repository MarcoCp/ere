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
                    
                    <form method="post" action="{{ route('quotes.update', $quote) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="client_id">Cliente</label>
                                <select name="client_id" class="form-control">
                                    <option>Escojer...</option>
                                    @foreach ($client as $key => $value)
                                        <option value="{{ $value->id }}" @if(old('client_id', $value->id) == $quote->client_id) {{ 'selected' }} @endif>{{ $value->name }} {{ $value->lastname }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="date">Fecha</label>
                                <input type="date" name="date" class="form-control"  value="{{ old('date', $quote->date) }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="project">Nombre del Proyecto</label>
                                <input type="text" name="project" class="form-control"  value="{{ old('project', $quote->project) }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="budget">Presupuesto</label>
                                <input type="number" name="budget" class="form-control"  value="{{ old('budget', $quote->budget) }}">
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
