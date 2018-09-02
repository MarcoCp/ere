<div class="col-md-3">
    <div class="card">
        <div class="card-header">@yield('title')</div>
        <div class="card-body">
			<div class="list-group">
				<a href="{{ route('clients.index') }}" class="list-group-item list-group-item-action">Clientes</a>
				<a href="#" class="list-group-item list-group-item-action">Cotizaciones</a>
				<a href="{{ route('quotedetails.index') }}" class="list-group-item list-group-item-action">Detalles de Cotizaciones</a>
				<a href="#" class="list-group-item list-group-item-action">Ventas</a>
			</div>
        </div>
    </div>
</div>
