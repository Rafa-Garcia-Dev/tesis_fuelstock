<?php

namespace App\Http\Controllers;

use App\Services\BusinessLogic;
use App\Models\Venta;
use App\Models\Medida;
use App\Models\Compra;
use Illuminate\Http\Request;
use Carbon\Carbon;

class VentaController extends Controller
{


    protected $BusinessLogic;

    public function __construct(BusinessLogic $BusinessLogic)
    {
        $this->BusinessLogic = $BusinessLogic;
       
    }
  /**
     * Display a listing of the resource.
     */
    public function updateVentas(Request $request)
    {
        $idConsolidado = $request->input('idConsolidado');
         // Verificar si el ID ya existe en la base de datos
    if ($this->BusinessLogic->idExistente($idConsolidado)) {
        // El ID ya existe en la base de datos, no es necesario consumir el WS nuevamente
        return response()->json(['message' => 'El ID ya existe en la base de datos'], 201);
    }
    // return response()->json(['message' => 'vamos bien'], 200);
    // Consumir el WS y procesar los datos
    $resultado = $this->BusinessLogic->consumirWebService($idConsolidado);

    // Verificar el resultado de consumir el WS
    if ($resultado === true) {
        // Los datos se procesaron correctamente y se guardaron en la base de datos
        return response()->json(['message' => 'Los datos se procesaron y guardaron correctamente', 'data' => $resultado], 200);
    } elseif ($resultado === false) {
        // Hubo un error al procesar los datos o guardarlos en la base de datos
        return response()->json(['message' => 'Error al procesar los datos o guardarlos en la base de datos'], 400);
    } else {
        // Otro tipo de respuesta
        return response()->json(['message' => 'Otra respuesta']);
    }
    }


    public function fillData(Request $request)
    {
        $mes = $request->input('monthSeleted');
        $ano = $request->input('yearSelected');
    
        // Obtener el primer día del mes siguiente
        if ($mes == 12) {
            // Si el mes es diciembre, obtener el primer día del siguiente año
            $primerDiaMesSiguiente = Carbon::create($ano + 1, 1, 1)->startOfDay();
        } else {
            // Si no es diciembre, obtener el primer día del siguiente mes
            $primerDiaMesSiguiente = Carbon::create($ano, $mes + 1, 1)->startOfDay();
        }
    
        // Obtener registros del mes actual para cada modelo
        $medidas = Medida::whereMonth('fecha_medida', $mes)
                          ->whereYear('fecha_medida', $ano)
                          ->get();
        $compras = Compra::whereMonth('fecha_compra', $mes)
                         ->whereYear('fecha_compra', $ano)
                         ->get();
        $ventas = Venta::whereMonth('fecha_ventas', $mes)
                       ->whereYear('fecha_ventas', $ano)
                       ->get();
    
        // Obtener registros del primer día del mes siguiente para cada modelo
        $medidaMesSiguiente = Medida::whereDate('fecha_medida', $primerDiaMesSiguiente)
                                     ->get();
        $compraMesSiguiente = Compra::whereDate('fecha_compra', $primerDiaMesSiguiente)
                                     ->get();
        $ventaMesSiguiente = Venta::whereDate('fecha_ventas', $primerDiaMesSiguiente)
                                   ->get();
    
        // Combinar los resultados en un solo array
        $medidas = $medidas->merge($medidaMesSiguiente);
        $compras = $compras->merge($compraMesSiguiente);
        $ventas = $ventas->merge($ventaMesSiguiente);
    

        $datosProcesados = $this->BusinessLogic->procesarDatos($medidas, $compras, $ventas);
       
        // Devolver los datos en formato JSON
        return response()->json(['data' => $datosProcesados], 200);
    }
    

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

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Venta $venta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Venta $venta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Venta $venta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Venta $venta)
    {
        //
    }
}
