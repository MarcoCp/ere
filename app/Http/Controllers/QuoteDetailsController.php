<?php

namespace App\Http\Controllers;

use App\QuoteDetails;
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
        $quotedetails = QuoteDetails::search($request->get('buscar'))->paginate(10);

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
        // Carga la vista para crear un Cliente
        return view('quotedetails.create');//
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
        $quotedetails = QuoteDetails::find($quoteDetails);

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
        return view('quotedetails.edit')
            ->with(['quotedetails' => $quoteDetails]);
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
