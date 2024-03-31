<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use Illuminate\Http\Request;

class CompraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('compras.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    public function returnCompras()
    {
        $valores = Compra::all();
        
        return response()->json($valores);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $galonesAntesDescargue1 = $request->get('equivalente_galones_medida_corriente');
        $galonesAntesDescargue2 = $request->get('equivalente_galones_medida_corriente2');
        $galonesDespuesDescargue1 = $request->get('equivalente_galones_medida_corriente-despues');
        $galonesDespuesDescargue2 = $request->get('equivalente_galones_medida_corriente-despues2');
        $sumaAntes = $galonesAntesDescargue1+$galonesAntesDescargue2;
        $sumaDespues =  $galonesDespuesDescargue1+  $galonesDespuesDescargue2;


        Compra::create([
            'fecha_compra'=>$request->get('fecha_compra'),
            'numero_factura'=> $request->get('numero_factura'),
            'volumen_galones_factura_corriente'=> $request->get('volumen_galones_factura_corriente'),
            'galones_antes_descargue_corriente'=> $sumaAntes,
            'galones_despues_descargue_corriente'=> $sumaDespues,
            'ventas_realizas_descargue_correinte'=> $request->get('ventas_realizas_descargue_correinte'),
            'volumen_galones_factura_extra'=> $request->get('volumen_galones_factura_extra'),
            'galones_antes_descargue_extra'=> $request->get('equivalente_galones_medida_extra_antes'),
            'galones_despues_descargue_extra'=> $request->get('equivalente_galones_medida_extra_despues'),
            'ventas_realizas_descargue_extra'=> $request->get('ventas_realizas_descargue_extra'),
            'volumen_galones_factura_diesel'=> $request->get('volumen_galones_factura_diesel'),
            'galones_antes_descargue_diesel'=> $request->get('equivalente_galones_medida_diesel_antes'),
            'galones_despues_descargue_diesel'=> $request->get('equivalente_galones_medida_diesel_despues'),
            'ventas_realizas_descargue_diesel'=> $request->get('ventas_realizas_descargue_diesel'),
        ]);

        
        return redirect()->route('compras');
    }

    /**
     * Display the specified resource.
     */
    public function show(Compra $compra)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Compra $compra)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        try {
            
            $compra = Compra::findOrFail($request->get('id'));
    
            $compra -> fecha_compra = $request->get('fecha_compra');
            $compra -> numero_factura=$request->get('numero_factura');
            $compra -> volumen_galones_factura_corriente= $request->get('volumen_galones_factura_corriente');
            $compra -> galones_antes_descargue_corriente= $request->get('equivalente_galones_medida_corriente');
            $compra -> galones_despues_descargue_corriente= $request->get('equivalente_galones_medida_corriente-despues');
            $compra -> ventas_realizas_descargue_correinte= $request->get('ventas_realizas_descargue_correinte');
            $compra -> volumen_galones_factura_extra= $request->get('volumen_galones_factura_extra');
            $compra -> galones_antes_descargue_extra= $request->get('equivalente_galones_medida_extra_antes');
            $compra -> galones_despues_descargue_extra= $request->get('equivalente_galones_medida_extra_despues');
            $compra -> ventas_realizas_descargue_extra= $request->get('ventas_realizas_descargue_extra');
            $compra -> volumen_galones_factura_diesel= $request->get('volumen_galones_factura_diesel');
            $compra -> galones_antes_descargue_diesel= $request->get('equivalente_galones_medida_diesel_antes');
            $compra -> galones_despues_descargue_diesel= $request->get('equivalente_galones_medida_diesel_despues');
            $compra -> ventas_realizas_descargue_diesel= $request->get('ventas_realizas_descargue_diesel');
            $compra->save();
            
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
            $typeDoc = Compra::findOrFail($id);
            $typeDoc->delete();
            
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }
}
