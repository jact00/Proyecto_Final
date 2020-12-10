<?php

namespace App\Http\Controllers;

use App\Models\Movimiento;
use App\Models\Ejemplar;
use Illuminate\Http\Request;

class MovimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!\Auth::user()->can('viewAny', Movimiento::class))
        {
            return redirect()->back()->with([
                'mensaje-alerta' => 'La página a la que intentaste acceder no existe',
                'titulo-alerta' => 'Oops...',
                'tipo-alerta' => 'alert-info',
            ]);
        }

        $prestamos = Movimiento::All();
        return view('prestamos/prestamoIndex', compact('prestamos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Movimiento  $movimiento
     * @return \Illuminate\Http\Response
     */
    public function show(Movimiento $prestamo)
    {
        if(!\Auth::user()->can('view', Movimiento::class))
        {
            return redirect()->back()->with([
                'mensaje-alerta' => 'La página a la que intentaste acceder no existe',
                'titulo-alerta' => 'Oops...',
                'tipo-alerta' => 'alert-info',
            ]);
        }

        return view('prestamos/prestamoShow', compact('prestamo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Movimiento  $movimiento
     * @return \Illuminate\Http\Response
     */
    public function edit(Movimiento $movimiento)
    {
        return redirect()->back()->with([
            'mensaje-alerta' => 'La página a la que intentaste acceder no existe',
            'titulo-alerta' => 'Oops...',
            'tipo-alerta' => 'alert-info',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Movimiento  $movimiento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movimiento $movimiento)
    {
        return redirect()->back()->with([
            'mensaje-alerta' => 'La página a la que intentaste acceder no existe',
            'titulo-alerta' => 'Oops...',
            'tipo-alerta' => 'alert-info',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Movimiento  $movimiento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movimiento $prestamo)
    {
        if(!\Auth::user()->can('delete', $prestamo))
        {
            return redirect()->back()->with([
                'mensaje-alerta' => 'No cuenta con los permisos necesarios.',
                'titulo-alerta' => 'Acceso denegado!',
                'tipo-alerta' => 'alert-danger',
            ]);
        }

        foreach($prestamo->ejemplares_en_prestamo as $ejemplar)
        {
            $ejemplar->en_prestamo = false;
            $ejemplar->save();
        }

        $prestamo->delete();


        return redirect()->route('prestamo.index')->with([
            'mensaje-alerta' => 'Prestamo borrado exitosamente.',
            'titulo-alerta' => 'Acción exitosa!',
            'tipo-alerta' => 'alert-success',
        ]);
    }

    public function devolver_ejemplar(Movimiento $prestamo, Ejemplar $ejemplar)
    {
        if(!\Auth::user()->can('update', Movimiento::class))
        {
            return redirect()->back()->with([
                'mensaje-alerta' => 'No cuenta con los permisos necesarios.',
                'titulo-alerta' => 'Acceso denegado!',
                'tipo-alerta' => 'alert-danger',
            ]);
        }

        if(!$ejemplar->en_prestamo)
            return redirect()->back()->with([
                'mensaje-alerta' => 'El ejemplar no está en prestamo.',
                'titulo-alerta' => 'Error!',
                'tipo-alerta' => 'alert-danger',
            ]);

        $ejemplar->en_prestamo = false;
        $ejemplar->save();

        $prestamo->ejemplares()->syncWithoutDetaching([$ejemplar->id => ['fecha_devolucion' => now()] ]);

        if($prestamo->ejemplares_en_prestamo()->count() > 0)
            return redirect()->route('prestamo.show', compact('prestamo'))->with([
                'mensaje-alerta' => 'El ejemplar ha sido devuelto.',
                'titulo-alerta' => 'Acción exitosa!',
                'tipo-alerta' => 'alert-success',
            ]);
        else if(!\Auth::user()->operador->es_admin)
            return redirect()->route('prestamo.index')->with([
                'mensaje-alerta' => 'El ejemplar ha sido devuelto. Se han devuelto todos los ejemplares del prestamo.',
                'titulo-alerta' => 'Acción exitosa!',
                'tipo-alerta' => 'alert-success',
            ]);
        else
            return redirect()->route('prestamo.show', compact('prestamo'))->with([
                'mensaje-alerta' => 'El ejemplar ha sido devuelto. Se han devuelto todos los ejemplares del prestamo.',
                'titulo-alerta' => 'Acción exitosa!',
                'tipo-alerta' => 'alert-success',
            ]);
    }
}
