@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <ul>
                        @foreach ($clients as $key => $value)
                            <li>{{ $value->id }}</li>
                            <li>{{ $value->name }}</li>
                            <li>{{ $value->lastname }}</li>
                            <li>{{ $value->position }}</li>
                            <li>{{ $value->company }}</li>
                            <li>{{ $value->phone }}</li>
                            <li>{{ $value->email }}</li>
                        @endforeach                        
                    </ul>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
