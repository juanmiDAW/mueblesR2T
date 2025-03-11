<?php

namespace App\Http\Controllers;

use App\Models\Fabricado;
use Illuminate\Http\Request;
use Livewire\Mechanisms\HandleComponents\ViewContext;

class FabricadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('fabricados.index',['fabricados' => Fabricado::all()] );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('fabricados.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'alto'=>'required|integer',
            'ancho'=>'required|integer',
        ]);

        Fabricado::create($validate);

        return redirect()->route('fabricados.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Fabricado $fabricado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fabricado $fabricado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Fabricado $fabricado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fabricado $fabricado)
    {
        //
    }
}
