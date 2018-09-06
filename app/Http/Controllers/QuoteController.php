<?php

namespace App\Http\Controllers;

use App\Quote;
use App\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Obtener todos los Clientes
        $quote = Quote::orderBy('id', 'desc')->search($request->get('buscar'))->paginate(10);

        // Cargar la vista y pasar los Clientes
        return view('quote.index')
            ->with('quote', $quote);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $client = Client::orderBy('id', 'desc')->get();

        // Carga la vista para crear un Cliente
        return view('quote.create')
            ->with('client', $client);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Crear registro en base de datos con Eloquent
        Quote::create([
            'user_id' => Auth::id(),
            'client_id' => request()->client_id,
            'date' => request()->date,
            'project' => request()->project,
            'budget' => request()->budget,
        ]);

        //Retornar a la vista principal
        return redirect()->route('quotes.index')
            ->with('status', 'Nueva cotizacion creada');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\quote  $quote
     * @return \Illuminate\Http\Response
     */
    public function show(quote $quote)
    {
        $quote = Quote::find($quote)->orderBy('id', 'desc');

        return view('quote.show')
            ->with(['quote' => $quote]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\quote  $quote
     * @return \Illuminate\Http\Response
     */
    public function edit(quote $quote)
    {
        $client = Client::orderBy('id', 'desc')->get();

        return view('quote.edit')
            ->with(['quote' => $quote])
            ->with('client', $client);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\quote  $quote
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, quote $quote)
    {
        $quote->update(request()->all());

        return redirect()->route('quotes.index')
            ->with('status', 'Edicion realizada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\quote  $quote
     * @return \Illuminate\Http\Response
     */
    public function destroy(quote $quote)
    {
        $quote->delete();

        return redirect()->route('quotes.index')
            ->with('status', 'Detalle Eliminado');
    }
}
