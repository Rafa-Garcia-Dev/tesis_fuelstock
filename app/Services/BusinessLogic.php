<?php

namespace App\Services;
use App\Models\Venta;
use Carbon\Carbon;
class BusinessLogic
{
    public function idExistente($id)
    {
        
        // Verificar si el ID ya existe en la base de datos
        $venta = Venta::where('id_consolidado', $id)->first();
        return $venta !== null;
    }

    public function consumirWebService($id)
    {
        // Simular consumo de WS y procesamiento de datos
        $datos = $this->consumirDatosDesdeWebService($id);

        // Verificar si se obtuvieron datos válidos
        if ($datos !== null) {
            // Guardar los datos en la base de datos
            $resultado = $this->guardarDatosEnBaseDeDatos($id,$datos);
            return $resultado;
        } else {
            // Hubo un error al obtener los datos del WS
            return false;
        }
    }

    private function consumirDatosDesdeWebService($id)
{
    // Paso 1: Obtener el token de acceso
    $tokenResponse = $this->obtenerTokenDeAcceso();
    
    // Verificar si se obtuvo correctamente el token de acceso
    if ($tokenResponse && isset($tokenResponse['access_token'])) {
        // Paso 2: Realizar la solicitud al servicio web utilizando el token de acceso
        $accessToken = $tokenResponse['access_token'];
        $dataResponse = $this->realizarSolicitudAlWebService($accessToken, $id);
        // Retornar los datos obtenidos del servicio web o null si hubo un error
        return $dataResponse;
    } else {
        // Hubo un error al obtener el token de acceso
        return null;
    }
}

private function obtenerTokenDeAcceso()
{
    // Configurar la solicitud para obtener el token de acceso
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://dominus.iapropiada.com/oauth/v2/token',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => '{
            "client_id":"eE6fxhtUeagARQ8evqJSy8IK",
            "client_secret":"LTWGH0n+02FxwojBDKMgs9BGMPnFtiDxR6AnKfUy",
            "grant_type": "client_credentials",
            "scope":"dominus"
        }',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json'
        ),
    ));

    // Ejecutar la solicitud para obtener el token de acceso
    $response = curl_exec($curl);
    curl_close($curl);

    // Decodificar la respuesta JSON
    $responseData = json_decode($response, true);
    
    return $responseData;
}

private function realizarSolicitudAlWebService($accessToken, $id)
{
    // Configurar la solicitud para realizar la solicitud al servicio web
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://dominus.iapropiada.com/integrations/administrative/dominus/consolidated',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_POSTFIELDS => '{
            "consolidated_id":"' . $id . '"
        }',
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer ' . $accessToken,
            'Content-Type: application/json'
        ),
    ));

    // Ejecutar la solicitud para realizar la solicitud al servicio web
    $response = curl_exec($curl);
    curl_close($curl);

    // Retornar la respuesta obtenida del servicio web
    return $response;
}


private function guardarDatosEnBaseDeDatos($idConsolidado, $datosString)
{
    $datos = json_decode($datosString, true);

    // Verificamos si existe la propiedad 'data' en los datos recibidos
    // Verificamos si existe la propiedad 'data' en los datos recibidos
    if (!isset($datos['data']) || empty($datos['data']['sales'])) {
        return false;
    }
            
    // Inicializamos las variables para almacenar las ventas totales de cada tipo de producto
    $totalVentasCorriente = 0;
    $totalVentasExtra = 0;
    $totalVentasDiesel = 0;
    $contadorExtra=0;
    $contadordiesel=0;
    $contadorcorriente=0;
        // Obtener la fecha de la primera venta
        $primerVenta = reset($datos['data']['sales']);
        $fechaVenta1 = date('Y-m-d', strtotime($primerVenta['date_sale']));

    // Recorremos las ventas en el objeto 'data'
    foreach ($datos['data']['closes'] as $close) {
        // Obtenemos la fecha de la venta (sin la hora)
        $fechaVenta = date('Y-m-d', strtotime($close['date_close_ini']));
        
        // Verificamos si la fecha de la venta coincide con la fecha proporcionada
        if ($fechaVenta == $fechaVenta1) { // Cambia 'date('Y-m-d')' por la fecha deseada
            // Recorremos los productos vendidos en esta venta
            foreach ($close['closehose'] as $producto) {
                // Verificamos el código del producto y sumamos la cantidad correspondiente
                switch ($producto['productref_id']) {
                    case '758':
                        $totalVentasCorriente += $producto['volume_total'];
                        $contadorcorriente ++;
                        break;
                    case '759':
                        $totalVentasExtra += $producto['volume_total'];
                        $contadorExtra ++;
                        break;
                    case '720':
                        $totalVentasDiesel += $producto['volume_total'];
                        $contadordiesel++;
                        break;
                    default:
                        // Código de producto desconocido
                        break;
                }
            }
        }
    }

    // Ahora que tenemos las ventas totales de cada tipo de producto, creamos un nuevo objeto Venta y lo guardamos en la base de datos
    $nuevaVenta = new Venta();
    $nuevaVenta->fecha_ventas = $fechaVenta;// Fecha y hora actual
    $nuevaVenta->id_consolidado = $idConsolidado;
    $nuevaVenta->total_ventas_corriente = $totalVentasCorriente/1000;
    $nuevaVenta->total_ventas_extra = $totalVentasExtra/1000;
    $nuevaVenta->total_ventas_diesel = $totalVentasDiesel/1000;
    $nuevaVenta->save();

    // Guardar la nueva venta en la base de datos
    try {
        $nuevaVenta->save();
        // Si el guardado es exitoso, retornar true
        return true;
    } catch (\Exception $e) {
        // Si hay algún error al guardar, imprimir el mensaje de error y retornar false
        echo "Error al guardar la nueva venta: " . $e->getMessage() . "\n";
        return false;
    }
}
    

public static function procesarDatos($medidas, $compras, $ventas)
{
    // Inicializar arrays para almacenar los registros procesados
    $registrosPorDia = [];

    // Obtener la fecha máxima de las ventas
    $fechaMaximaVentas = $ventas->max('fecha_ventas');
    $fechaInicio = Carbon::parse($fechaMaximaVentas)->startOfMonth();
    $fechaFin = Carbon::parse($fechaMaximaVentas)->addMonth()->startOfMonth();

    // Iterar sobre cada día del mes
    for ($fecha = $fechaInicio; $fecha->lte($fechaFin); $fecha->addDay()) {


        // Filtrar medidas para el día actual
        $medidasDia = $medidas->filter(function ($medida) use ($fecha) {
            return Carbon::parse($medida->fecha_medida)->isSameDay($fecha);
        });

        // Filtrar ventas para el día actual y sumar sus propiedades
        $ventasDia = $ventas->filter(function ($venta) use ($fecha) {
            return Carbon::parse($venta->fecha_ventas)->isSameDay($fecha);
        });


        // Filtrar compras para el día actual y sumar sus propiedades relevantes
        // Filtrar compras para el día actual y calcular descargues
        $comprasDia = $compras->filter(function ($compra) use ($fecha) {
            return Carbon::parse($compra->fecha_compra)->isSameDay($fecha);
        })->reduce(function ($comprasAcumuladas, $compra) {       
        // Calcular descargueCorriente
        // Calcular descargueCorriente con 2 decimales
        $descargueCorriente = round(($compra->galones_despues_descargue_corriente - $compra->galones_antes_descargue_corriente + $compra->ventas_realizas_descargue_correinte), 2);
        // Calcular descargueExtra con 2 decimales
        $descargueExtra = round(($compra->galones_despues_descargue_extra - $compra->galones_antes_descargue_extra + $compra->ventas_realizas_descargue_extra), 2);
        // Calcular descargueDiesel con 2 decimales
        $descargueDiesel = round(($compra->galones_despues_descargue_diesel - $compra->galones_antes_descargue_diesel + $compra->ventas_realizas_descargue_diesel), 2);

        $comprasAcumuladas['volumen_galones_factura_corriente'] += $compra->volumen_galones_factura_corriente;
        $comprasAcumuladas['galones_antes_descargue_corriente'] += $compra->galones_antes_descargue_corriente;
        $comprasAcumuladas['galones_despues_descargue_corriente'] += $compra->galones_despues_descargue_corriente;
        $comprasAcumuladas['ventas_realizas_descargue_correinte'] += $compra->ventas_realizas_descargue_correinte;
        $comprasAcumuladas['volumen_galones_factura_extra'] += $compra->volumen_galones_factura_extra;
        $comprasAcumuladas['galones_antes_descargue_extra'] += $compra->galones_antes_descargue_extra;
        $comprasAcumuladas['galones_despues_descargue_extra'] += $compra->galones_despues_descargue_extra;
        $comprasAcumuladas['ventas_realizas_descargue_extra'] += $compra->ventas_realizas_descargue_extra;
        $comprasAcumuladas['volumen_galones_factura_diesel'] += $compra->volumen_galones_factura_diesel;
        $comprasAcumuladas['galones_antes_descargue_diesel'] += $compra->galones_antes_descargue_diesel;
        $comprasAcumuladas['galones_despues_descargue_diesel'] += $compra->galones_despues_descargue_diesel;
        $comprasAcumuladas['ventas_realizas_descargue_diesel'] += $compra->ventas_realizas_descargue_diesel;
        $comprasAcumuladas['descargueCorriente'] += $descargueCorriente;
        $comprasAcumuladas['descargueExtra'] += $descargueExtra;
        $comprasAcumuladas['descargueDiesel'] += $descargueDiesel;

            return $comprasAcumuladas;
        }, [
            'volumen_galones_factura_corriente' => 0,
            'galones_antes_descargue_corriente' => 0,
            'galones_despues_descargue_corriente' => 0,
            'ventas_realizas_descargue_correinte' => 0,
            'volumen_galones_factura_extra' => 0,
            'galones_antes_descargue_extra' => 0,
            'galones_despues_descargue_extra' => 0,
            'ventas_realizas_descargue_extra' => 0,
            'volumen_galones_factura_diesel' => 0,
            'galones_antes_descargue_diesel' => 0,
            'galones_despues_descargue_diesel' => 0,
            'ventas_realizas_descargue_diesel' => 0,
            'descargueCorriente' => 0,
            'descargueExtra' => 0,
            'descargueDiesel' => 0
        ]);

                    
            // Crear un registro combinado para el día actual
            $registroDia = [
                'fecha' => $fecha->toDateString(),
                'medidas' => $medidasDia,
                'compras' => $comprasDia,
                'ventas' => $ventasDia
            ];

            // Agregar el registro al array de registros por día
            $registrosPorDia[] = $registroDia;
        }


//::::::::::::::::::::::::::::::::::ETAPA 2:::::::::::::::::::::::::::::::::

        $diesel = [];
        $corriente = [];
        $extra = [];

    // Recorrer cada registro por día
    for ($i = 0; $i < count($registrosPorDia); $i++) {
        // Obtener las ventas, compras y medidas del registro actual
        $fechaobjeto = $registrosPorDia[$i]['fecha'];
        $ventasDia = $registrosPorDia[$i]['ventas'];
        $comprasDia = $registrosPorDia[$i]['compras'];
        $medidasDia = $registrosPorDia[$i]['medidas'];
        $primeraVenta= $ventasDia->first();    
        $primeraMedida = $medidasDia->first();  
     // Verificar que haya un siguiente registro en $registrosPorDia y que haya medidas disponibles
        if ($i + 1 < count($registrosPorDia) && isset($registrosPorDia[$i + 1]['medidas'])) {
            // Obtener las medidas del día siguiente
            $medidasDiaSiguiente = $registrosPorDia[$i + 1]['medidas'];
            $primerMedidaDiaSiguiente = $medidasDiaSiguiente->first(); // Obtiene el primer elemento de la colección $medidasDiaSiguiente
            $medidaFisicaSiguienteDiesel = isset($primerMedidaDiaSiguiente['galones_al_cierre_diesel']) ? $primerMedidaDiaSiguiente['galones_al_cierre_diesel'] : null;
            $medidaFisicaSiguienteCorriente = isset($primerMedidaDiaSiguiente['galones_al_cierre_corriente']) ? $primerMedidaDiaSiguiente['galones_al_cierre_corriente'] : null;
            $medidaFisicaSiguienteExtra = isset($primerMedidaDiaSiguiente['galones_al_cierre_extra']) ? $primerMedidaDiaSiguiente['galones_al_cierre_extra'] : null;
            // Acceder a la medida física del día siguiente si existe
        } else {
            // Manejar el caso en el que no haya un siguiente día disponible o no haya medidas disponibles
            $medidaFisicaSiguiente = 0;
        }
        
        // Crear los nuevos objetos para almacenar los datos
        $dieselObjeto = [
            'dia_diesel' => null,
            'inventario_inicial_diesel' => null,
            'compras_diesel' => null,
            'ventas_diesel' => null,
            'medida_teorica_diesel' => null,
            'medida_fisica_diesel' => null,
            'variacion_neta_diesel' => null,
            'porcentaje_diesel' => null,
            'descargue_diesel' => null,
            'variacion_descargue_diesel' => null,
       
        ];
        
        $extraObjeto = [
            'dia_extra' => null,
            'inventario_inicial_extra' => null,
            'compras_extra' => null,
            'ventas_extra' => null,
            'medida_teorica_extra' => null,
            'medida_fisica_extra' => null,
            'variacion_neta_extra' => null,
            'porcentaje_extra' => null,
            'descargue_extra' => null,
            'variacion_extra' => null,
        ];
        
        $corrienteObjeto = [
            'dia_corriente' => null,
            'inventario_inicial_corriente' => null,
            'compras_corriente' => null,
            'ventas_corriente' => null,
            'medida_teorica_corriente' => null,
            'medida_fisica_corriente' => null,
            'variacion_neta_corriente' => null,
            'porcentaje_corriente' => null,
            'descargue_corriente' => null,
            'variacion_descargue_corriente' => null,
        ];
        
            // DIESEL:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::


    $dia_diesel = $fechaobjeto;
    $inventario_inicial_diesel = isset($primeraMedida['galones_al_cierre_diesel']) ? $primeraMedida['galones_al_cierre_diesel'] : 0;
    $compras_diesel = isset($comprasDia['volumen_galones_factura_diesel']) ? $comprasDia['volumen_galones_factura_diesel'] : 0;
    $ventas_diesel = isset($primeraVenta['total_ventas_diesel']) ? $primeraVenta['total_ventas_diesel'] : 0;
    $medida_fisica_diesel = $medidaFisicaSiguienteDiesel;
    $medida_teorica_diesel = $inventario_inicial_diesel !== null && $compras_diesel !== null && $ventas_diesel !== null ? round($inventario_inicial_diesel + $compras_diesel - $ventas_diesel ,2): 0;
    $variacion_neta_diesel = $medida_teorica_diesel !== null && $medida_fisica_diesel !== null ? round($medida_teorica_diesel - $medida_fisica_diesel,2) : 0;
    $porcentaje_diesel = $ventas_diesel !== null && $variacion_neta_diesel !== null && $ventas_diesel != 0 ? round(( ($variacion_neta_diesel / $ventas_diesel) * 100),2) : 0;
    $descargue_diesel = isset($comprasDia['descargueDiesel']) ? $comprasDia['descargueDiesel'] : 0;
    $variacion_descargue_diesel = round(($compras_diesel !== null && $descargue_diesel !== null ? $compras_diesel - $descargue_diesel : 0),2);

    // Verificar que todas las propiedades necesarias no sean nulas antes de asignarlas al objeto
    if ($inventario_inicial_diesel !== null && $compras_diesel !== null && $ventas_diesel !== null && $medida_teorica_diesel !== null && $variacion_neta_diesel !== null && $porcentaje_diesel !== null && $descargue_diesel !== null && $variacion_descargue_diesel !== null) {
        // Por ejemplo:
        $dieselObjeto['dia_diesel'] = $dia_diesel;
        $dieselObjeto['inventario_inicial_diesel'] = $inventario_inicial_diesel;
        $dieselObjeto['compras_diesel'] = $compras_diesel;
        $dieselObjeto['ventas_diesel'] = $ventas_diesel;
        $dieselObjeto['medida_teorica_diesel'] = $medida_teorica_diesel;  
        $dieselObjeto['medida_fisica_diesel'] = $medida_fisica_diesel;
        $dieselObjeto['variacion_neta_diesel'] = $variacion_neta_diesel;
        $dieselObjeto['porcentaje_diesel'] = $porcentaje_diesel;
        $dieselObjeto['descargue_diesel'] = $descargue_diesel;
        $dieselObjeto['variacion_descargue_diesel'] = $variacion_descargue_diesel;
    }

    // CORRIENTE::::::::::::::::::::::::::::::::::::::::::::::::::::::::
    $dia_corriente = $fechaobjeto;
    $inventario_inicial_corriente = isset($primeraMedida['galones_al_cierre_corriente']) ? $primeraMedida['galones_al_cierre_corriente'] : 0;
    $compras_corriente = isset($comprasDia['volumen_galones_factura_corriente']) ? $comprasDia['volumen_galones_factura_corriente'] : 0;
    $ventas_corriente = isset($primeraVenta['total_ventas_corriente']) ? $primeraVenta['total_ventas_corriente'] : 0;
    $medida_teorica_corriente = $inventario_inicial_corriente !== null && $compras_corriente !== null && $ventas_corriente !== null ? round($inventario_inicial_corriente + $compras_corriente - $ventas_corriente,2) : 0;
    $medida_fisica_corriente = $medidaFisicaSiguienteCorriente;
    $variacion_neta_corriente = $medida_teorica_corriente !== null && $medida_fisica_corriente !== null ? round($medida_teorica_corriente - $medida_fisica_corriente,2) : 0;
    $porcentaje_corriente = $ventas_corriente !== null && $variacion_neta_corriente !== null && $ventas_corriente != 0 ? round((($variacion_neta_corriente / $ventas_corriente) * 100 ),2): 0;
    $descargue_corriente = isset($comprasDia['descargueCorriente']) ? $comprasDia['descargueCorriente'] : 0;
    $variacion_descargue_corriente = round(($compras_corriente !== null && $descargue_corriente !== null ? $compras_corriente - $descargue_corriente : 0),2);

    // Verificar que todas las propiedades necesarias no sean nulas antes de asignarlas al objeto
    if ($inventario_inicial_corriente !== null && $compras_corriente !== null && $ventas_corriente !== null && $medida_teorica_corriente !== null && $variacion_neta_corriente !== null && $porcentaje_corriente !== null && $descargue_corriente !== null && $variacion_descargue_corriente !== null) {
        // Crear objeto corriente
        $corrienteObjeto = [
            'dia_corriente' => $dia_corriente,
            'inventario_inicial_corriente' => $inventario_inicial_corriente,
            'compras_corriente' => $compras_corriente,
            'ventas_corriente' => $ventas_corriente,
            'medida_teorica_corriente' => $medida_teorica_corriente,
            'medida_fisica_corriente' => $medida_fisica_corriente,
            'variacion_neta_corriente' => $variacion_neta_corriente,
            'porcentaje_corriente' => $porcentaje_corriente,
            'descargue_corriente' => $descargue_corriente,
            'variacion_descargue_corriente' => $variacion_descargue_corriente
        ];
    }

    // EXTRA:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
    $dia_extra = $fechaobjeto;
    $inventario_inicial_extra = isset($primeraMedida['galones_al_cierre_extra']) ? $primeraMedida['galones_al_cierre_extra'] : 0;
    $compras_extra = isset($comprasDia['volumen_galones_factura_extra']) ? $comprasDia['volumen_galones_factura_extra'] : 0;
    $ventas_extra = isset($primeraVenta['total_ventas_extra']) ? $primeraVenta['total_ventas_extra'] : 0;
    $medida_teorica_extra = $inventario_inicial_extra !== null && $compras_extra !== null && $ventas_extra !== null ? round($inventario_inicial_extra + $compras_extra - $ventas_extra,2) : 0;
    $medida_fisica_extra = $medidaFisicaSiguienteExtra;
    $variacion_neta_extra = $medida_teorica_extra !== null && $medida_fisica_extra !== null ? round($medida_teorica_extra - $medida_fisica_extra,2) : 0;
    $porcentaje_extra = $ventas_extra !== null && $variacion_neta_extra !== null && $ventas_extra != 0 ? round(( ($variacion_neta_extra / $ventas_extra) * 100),2) : 0;
    $descargue_extra = isset($comprasDia['descargueExtra']) ? $comprasDia['descargueExtra'] : 0;
    $variacion_descargue_extra = round(($compras_extra !== null && $descargue_extra !== null ? $compras_extra - $descargue_extra : 0), 2);


    // Verificar que todas las propiedades necesarias no sean nulas antes de asignarlas al objeto
    if ($inventario_inicial_extra !== null && $compras_extra !== null && $ventas_extra !== null && $medida_teorica_extra !== null && $variacion_neta_extra !== null && $porcentaje_extra !== null && $descargue_extra !== null && $variacion_descargue_extra !== null) {
        // Crear objeto extra
        $extraObjeto = [
            'dia_extra' => $dia_extra,
            'inventario_inicial_extra' => $inventario_inicial_extra,
            'compras_extra' => $compras_extra,
            'ventas_extra' => $ventas_extra,
            'medida_teorica_extra' => $medida_teorica_extra,
            'medida_fisica_extra' => $medida_fisica_extra,
            'variacion_neta_extra' => $variacion_neta_extra,
            'porcentaje_extra' => $porcentaje_extra,
            'descargue_extra' => $descargue_extra,
            'variacion_descargue_extra' => $variacion_descargue_extra
        ];
    }

        // Llenar otras propiedades...
        
        // Asignar los objetos creados al array correspondiente
        $diesel[] = $dieselObjeto;
        $corriente[] = $corrienteObjeto;
        $extra[] = $extraObjeto;
    }




    // Devolver los registros procesados
    return [
        'diesel' => $diesel,
        'corriente' => $corriente,
        'extra' => $extra
    ];

    // return  $registrosPorDia;
}
}