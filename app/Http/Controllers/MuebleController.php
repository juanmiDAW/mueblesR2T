<?php

namespace App\Http\Controllers;

use App\Models\Fabricado;
use App\Models\Mueble;
use App\Models\Prefabricado;
use Illuminate\Http\Request;

class MuebleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('muebles.index', ['muebles' => Mueble::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('muebles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        

        if ($request->fabricable_type == 'App\Models\Fabricado') {
            $validate = $request->validate([
                'alto' => 'required|integer',
                'ancho' => 'required|integer',
            ]);
            
            //creacion del fabricado para despues poderasociarlo al mueble
            $fabricado = Fabricado::create($validate);

            //creacion de la instacia de mueble para despues añadirle la denominacion, el precio y ademas asociarle el fabricado
            $mueble = new Mueble();
            $mueble -> denominacion = $request -> denominacion;
            $mueble -> precio = $request->precio;
            //se utiliza la relacion del objeto mueble y se con el associate se encarga de preparar los campos que le hagan falta
            $mueble -> fabricable()->associate($fabricado);
            //se guarda en la base de datos
            $mueble -> save();
        }

        if ($request->fabricable_type == 'App\Models\Prefabricado') {

            $prefabricado = Prefabricado::create();
            $mueble = new Mueble();
            $mueble -> denominacion = $request -> denominacion;
            $mueble -> precio = $request->precio;
            $mueble ->fabricable()-> associate($prefabricado);
            $mueble -> save();
        }


        session()->flash('exito', 'Mueble creado correctamente.');
        return redirect()->route('muebles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Mueble $mueble)
    {

        return view('muebles.show', ['mueble' => $mueble]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mueble $mueble)
    {
        return view('muebles.edit', ['mueble' => $mueble]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mueble $mueble)
    {
        // dd($request);
        $validated = $request->validate([
            'denominacion' => 'required|string|max:255',
            'precio' => 'required|integer',

        ]);
        $mueble->fill($validated);
        $mueble->save();
        session()->flash('exito', 'Mueble modificado correctamente.');
        return redirect()->route('muebles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mueble $mueble)
    {
        $mueble->delete();
        return redirect()->route('muebles.index');
    }
}
