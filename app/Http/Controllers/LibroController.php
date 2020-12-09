<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use App\Models\Ejemplar;
use Illuminate\Http\Request;
use App\Models\Categoria;
use Illuminate\Database\Eloquent\Builder;

class LibroController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $libros = Libro::with(['ejemplares','categoria'])->withCount([
            'ejemplares',
            'ejemplares as ejemplares_en_prestamo' => function(Builder $query) {
                $query->where('en_prestamo', true);
            },
        ])->get();
        return view('libros/libroIndex', compact('libros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!\Auth::user()->can('create', Libro::class))
        {
            return redirect()->route('libro.index')->with([
                'mensaje-alerta' => 'No cuenta con los permisos necesarios.',
                'titulo-alerta' => 'Acceso denegado!',
                'tipo-alerta' => 'alert-danger',
            ]);
        }
        $categorias = Categoria::All();
        return view('libros/libroForm', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!\Auth::user()->can('create', Libro::class))
        {
            return redirect()->route('libro.index')->with([
                'mensaje-alerta' => 'No cuenta con los permisos necesarios.',
                'titulo-alerta' => 'Acceso denegado!',
                'tipo-alerta' => 'alert-danger',
            ]);
        }

        $request->validate([
            'isbn' => 'required|unique:libros|digits_between:10,13',
            'nombre' => 'required|max:100',
            'autor' => 'nullable|max:255',
            'editorial' => 'required|max:100',
            'edicion' => 'required|digits_between:1,4',
            'anio' => 'required|integer|min:1901|max:2020',
            'paginas' => 'required|digits_between:2,4',
        ]);

        if($request->autor === null)
            $libro = $request->except('autor');
        else
            $libro = $request->all();


        $libro = Libro::create($libro);

        return redirect()->route('libro.index')->with([
            'mensaje-alerta' => 'Libro ' . $libro->nombre . '('. $libro->isbn .') agregado exitosamente.',
            'titulo-alerta' => 'Acción exitosa!',
            'tipo-alerta' => 'alert-success',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function show(Libro $libro)
    {
        if(!\Auth::user()->can('view', Libro::class))
        {
            return redirect()->route('libro.index')->with([
                'mensaje-alerta' => 'La página a la que intentaste acceder no existe',
                'titulo-alerta' => 'Oops...',
                'tipo-alerta' => 'alert-info',
            ]);
        }

        return view('libros/libroShow', compact('libro'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function edit(Libro $libro)
    {
        if(!\Auth::user()->can('update', Libro::class))
        {
            return redirect()->route('libro.index')->with([
                'mensaje-alerta' => 'No cuenta con los permisos necesarios.',
                'titulo-alerta' => 'Acceso denegado!',
                'tipo-alerta' => 'alert-danger',
            ]);
        }
        $categorias = Categoria::All();
        return view('libros/libroForm', compact('libro', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Libro $libro)
    {
        if(!\Auth::user()->can('update', Libro::class))
        {
            return redirect()->route('libro.index')->with([
                'mensaje-alerta' => 'No cuenta con los permisos necesarios.',
                'titulo-alerta' => 'Acceso denegado!',
                'tipo-alerta' => 'alert-danger',
            ]);
        }
        $request->validate([
            'nombre' => 'required|max:100',
            'autor' => 'nullable|max:255',
            'editorial' => 'required|max:100',
            'edicion' => 'required|digits_between:1,4',
            'anio' => 'required|integer|min:1901|max:2020',
            'paginas' => 'required|digits_between:2,4',
        ]);

        $libro->nombre = $request->nombre;
        $libro->autor = $request->autor ?? 'anonimo';
        $libro->editorial = $request->editorial;
        $libro->edicion = $request->edicion;
        $libro->anio = $request->anio;
        $libro->paginas = $request->paginas;
        $libro->categoria_id = $request->categoria_id;

        $libro->save();

        return redirect()->route('libro.index')->with([
            'mensaje-alerta' => 'Libro ' . $libro->nombre . '('. $libro->isbn .') editado exitosamente.',
            'titulo-alerta' => 'Acción exitosa!',
            'tipo-alerta' => 'alert-success',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function destroy(Libro $libro)
    {
        if(!\Auth::user()->can('delete', Libro::class))
        {
            return redirect()->route('libro.index')->with([
                'mensaje-alerta' => 'No cuenta con los permisos necesarios.',
                'titulo-alerta' => 'Acceso denegado!',
                'tipo-alerta' => 'alert-danger',
            ]);
        }

        $libro->delete();
        return redirect()->route('libro.index')->with([
            'mensaje-alerta' => 'Libro borrado exitosamente.',
            'titulo-alerta' => 'Acción exitosa!',
            'tipo-alerta' => 'alert-success',
        ]);
    }

    public function agregarEjemplar(Libro $libro)
    {
        if(!\Auth::user()->can('update', Libro::class))
        {
            return redirect()->route('libro.index')->with([
                'mensaje-alerta' => 'No cuenta con los permisos necesarios.',
                'titulo-alerta' => 'Acceso denegado!',
                'tipo-alerta' => 'alert-danger',
            ]);
        }

        $numero = Ejemplar::where('isbn', $libro->isbn)->max('numero');

        Ejemplar::create([
            'isbn' => $libro->isbn,
            'numero' => $numero + 1,
        ]);

        return redirect()->route('libro.show',compact('libro'))->with([
            'mensaje-alerta' => 'Ejemplar agregado exitosamente.',
            'titulo-alerta' => 'Acción exitosa!',
            'tipo-alerta' => 'alert-success',
        ]);
    }

    public function eliminarEjemplar(Libro $libro, Ejemplar $ejemplar)
    {
        if(!\Auth::user()->can('update', Libro::class))
        {
            return redirect()->route('libro.show', compact('libro'))->with([
                'mensaje-alerta' => 'No cuenta con los permisos necesarios.',
                'titulo-alerta' => 'Acceso denegado!',
                'tipo-alerta' => 'alert-danger',
            ]);
        }

        if($ejemplar->en_prestamo)
            return redirect()->route('libro.show', compact('libro'))->with([
                'mensaje-alerta' => 'Este ejemplar no se puede eliminar.',
                'titulo-alerta' => 'Error!',
                'tipo-alerta' => 'alert-danger',
            ]);
        
        $ejemplar->delete();
        $numero = $libro->loadCount('ejemplares')->ejemplares_count;

        if($numero == 0)
            return redirect()->route('libro.show', compact('libro'))->with([
                'mensaje-alerta' => 'Ejemplar eliminado exitosamente. El libro se quedo sin ejemplares!',
                'titulo-alerta' => 'Advertencia!',
                'tipo-alerta' => 'alert-warning',
            ]);

        else if($numero == 1)
            return redirect()->route('libro.show', compact('libro'))->with([
                'mensaje-alerta' => 'Ejemplar eliminado exitosamente. Unicamente queda un ejemplar!',
                'titulo-alerta' => 'Advertencia!',
                'tipo-alerta' => 'alert-warning',
            ]);
        else 
            return redirect()->route('libro.show', compact('libro'))->with([
                'mensaje-alerta' => 'Ejemplar eliminado exitosamente.',
                'titulo-alerta' => 'Acción exitosa!',
                'tipo-alerta' => 'alert-success',
            ]);
    }
}
