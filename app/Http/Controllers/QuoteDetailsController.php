<?php

namespace App\Http\Controllers;

use App\QuoteDetails;
use App\Quote;
use Illuminate\Http\Request;

class QuoteDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Obtener todos los Clientes
        $quotedetails = QuoteDetails::orderBy('id', 'desc')->search($request->get('buscar'))->paginate(10);

        // Cargar la vista y pasar los Clientes
        return view('quotedetails.index')
            ->with('quotedetails', $quotedetails);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $quote = Quote::orderBy('id', 'desc')->get();

        // Carga la vista para crear un Cliente
        return view('quotedetails.create')
            ->with('quote', $quote);
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
        QuoteDetails::create([
            'quote_id' => request()->quote_id,
            'category' => request()->category,
            'name' => request()->name,
            'duration' => request()->duration,
            'pricehour' => request()->pricehour,
            'price' => request()->price
        ]);

        //Retornar a la vista principal
        return redirect()->route('quotedetails.index')
            ->with('status', 'Nuevo detalle creado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\QuoteDetails  $quoteDetails
     * @return \Illuminate\Http\Response
     */
    public function show(QuoteDetails $quoteDetails)
    {
        $quotedetails = QuoteDetails::find($quoteDetails)->orderBy('id', 'desc');

        return view('quotedetails.show')
            ->with(['quotedetails' => $quotedetails]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\QuoteDetails  $quoteDetails
     * @return \Illuminate\Http\Response
     */
    public function edit(QuoteDetails $quoteDetails)
    {
        $quote = Quote::orderBy('id', 'desc')->get();

        return view('quotedetails.edit')
            ->with('quotedetails', $quoteDetails)
            ->with('quote', $quote);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\QuoteDetails  $quoteDetails
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, QuoteDetails $quoteDetails)
    {
        $quoteDetails->update(request()->all());

        return redirect()->route('quotedetails.index')
            ->with('status', 'Edicion realizada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\QuoteDetails  $quoteDetails
     * @return \Illuminate\Http\Response
     */
    public function destroy(QuoteDetails $quoteDetails)
    {
        $quoteDetails->delete();

        return redirect()->route('quotedetails.index')
            ->with('status', 'Detalle Eliminado');
    }
}
