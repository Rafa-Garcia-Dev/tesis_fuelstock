<?php

namespace App\Http\Controllers;

use App\Models\Medida;
use Illuminate\Http\Request;

class MedidaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function returnMedidas()
    {
        $valores = Medida::all();
        
        return response()->json($valores);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $galones1 = $request->get('galones_al_cierre_corriente');
        $galones2 = $request->get('galones_al_cierre_corriente2');
        $sumaGalones = $galones1 + $galones2 ;
        Medida::create([
            'fecha_medida'=>$request->get('fecha_medida'),
            'galones_al_cierre_corriente'=> $sumaGalones,
            'galones_al_cierre_extra'=> $request->get('galones_al_cierre_extra'),
            'galones_al_cierre_diesel'=> $request->get('galones_al_cierre_diesel'),
        ]);

        
        return redirect()->route('compras');
    }

    /**
     * Display the specified resource.
     */
    public function show(Medida $medida)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Medida $medida)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        try {
            
            $Medida = Medida::findOrFail($request->get('id'));
    
            $Medida -> fecha_medida = $request->get('fecha_medida');
            $Medida -> galones_al_cierre_corriente=$request->get('galones_al_cierre_corriente');
            $Medida -> galones_al_cierre_extra= $request->get('galones_al_cierre_extra');
            $Medida -> galones_al_cierre_diesel= $request->get('galones_al_cierre_diesel');   
            $Medida->save();
            
            return redirect()->route('compras');
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $typeDoc = Medida::findOrFail($id);
            $typeDoc->delete();
            
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }
}
