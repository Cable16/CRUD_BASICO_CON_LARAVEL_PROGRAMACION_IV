<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use Illuminate\Http\Request;

class ProyectoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //  
        $proyectos = Proyecto::all();
        return view('proyectos.index', compact('proyectos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('proyectos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nombre' => 'required',
            'fecha_inicio' => 'required|date',
        ]);
    
        Proyecto::create($request->all());
        return redirect()->route('proyectos.index')->with('success', 'Proyecto creado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Proyecto $proyecto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Proyecto $proyecto)
    {
        //
        return view('proyectos.edit', compact('proyecto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Proyecto $proyecto)
    {
        //
        $request->validate([
            'nombre' => 'required',
            'fecha_inicio' => 'required|date',
        ]);
    
        $proyecto->update($request->all());
        return redirect()->route('proyectos.index')->with('success', 'Proyecto actualizado exitosamente');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Proyecto $proyecto)
    {
        //
        $proyecto->delete();
        return redirect()->route('proyectos.index')->with('success', 'Proyecto eliminado exitosamente');
    
    }
}
