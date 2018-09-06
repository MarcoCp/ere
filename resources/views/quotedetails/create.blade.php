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
                    
                    <form method="post" action="{{ route('quotedetails.index') }}">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="quote_id">Proyecto</label>
                                <select name="quote_id" class="form-control">
                                    <option selected>Escojer...</option>
                                    @foreach ($quote as $key => $value)
                                        <option value="{{ $value->id }}">{{ $value->project }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="name">Nombre</label>
                                <input type="text" name="name" class="form-control @if ($errors->has('name')) is-invalid @endif" required>
                                <div class="invalid-feedback">
                                    Introduce tu nombre
                                </div>
                                @if ($errors->has('name'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('name') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label for="lastname">Categoria</label>
                                <input type="text" name="category" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="position">Duración Horas</label>
                                <input type="number" name="duration" class="form-control" onkeyup="total()">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="company">Precio Hora</label>
                                <input type="text" name="pricehour" class="form-control" onkeyup="total()">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="phone">Precio</label>
                                <input type="number" name="price" class="form-control" readonly>
                            </div>
                            <button type="submit" class="btn btn-primary">Enviar</button>                            
                        </div>
                    </form>

                    <script type="text/javascript">
                        function total() {
                                var duration = parseInt($('input[name=duration]').val())
                                var pricehour = parseInt($('input[name=pricehour]').val())
                                var total = duration * pricehour                                

                                $('input[name=price]').val(total)                                
                            }    
                    </script>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
