<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Reportes') }}
        </h2>
    </x-slot>
    @csrf
    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
               
                <h2 class="text-xl text-white font-semibold mb-4">Dilingenciar Ventas</h2>
                <label for="idConsolidado" class="block mb-2 text-white">Id del Consolidado:</label>
                <input placeholder="Ingrese el Id del Consolidado" type="text" id="idConsolidado" class="border border-gray-300 rounded px-4 py-2 mb-4 text-white w-96 mr-4" style="background-color: transparent;">
                <button id="btnWS" style="background-color: #f19d00; color: white; font-weight: bold; padding: 7px 13px; border-radius: 0.375rem; font-size: 1.125rem; cursor: pointer;">Solicitar</button>
                <div class="loader-container" style="text-align: center; display: none;">
                    <div class="spinner" id="spinner" >
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h2 class="text-xl text-white font-semibold mb-4">Opciones de Filtrado de Reportes</h2>
                <div class="loader-container2" style="text-align: left; display: none;">
                    <div class="spinner" id="spinner"></div>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                    <div class="flex flex-col">
                        <label for="mes" class="block mb-2 text-white">Mes:</label>
                        <select id="mes" class="border border-gray-300 rounded px-4 py-2 mb-4 text-white max-w-xs" style="background-color: transparent;">
                            <option style="color:#1F2937;" value="1">Enero</option>
                            <option style="color:#1F2937;" value="2">Febrero</option>
                            <option style="color:#1F2937;" value="3">Marzo</option>
                            <option style="color:#1F2937;" value="4">Abril</option>
                            <option style="color:#1F2937;" value="5">Mayo</option>
                            <option style="color:#1F2937;" value="6">Junio</option>
                            <option style="color:#1F2937;" value="7">Julio</option>
                            <option style="color:#1F2937;" value="8">Agosto</option>
                            <option style="color:#1F2937;" value="9">Septiembre</option>
                            <option style="color:#1F2937;" value="10">Octubre</option>
                            <option style="color:#1F2937;" value="11">Noviembre</option>
                            <option style="color:#1F2937;" value="12">Diciembre</option>
                            

                        </select>
                    </div>
                    <div class="flex flex-col">
                        <label for="ano" class="block mb-2 text-white">Año:</label>
                        <select id="ano" class="border border-gray-300 rounded px-4 py-2 mb-4 text-white max-w-xs" style="background-color: transparent;">
                            <option value="2023" style="color:#1F2937;">2023</option>
                            <option value="2024" style="color: #1F2937;">2024</option>
                            <option value="2025" style="color: #1F2937;">2025</option>
                            <option value="2026" style="color: #1F2937;">2026</option>
                            <option value="2027" style="color: #1F2937;">2027</option>
                            <option value="2028" style="color: #1F2937;">2028</option>
                            <option value="2029" style="color: #1F2937;">2029</option>                    
                        </select>
                    </div>
                    <div class="flex flex-col">
                        <label for="tipoReporte" class="block mb-2 text-white">Tipo de Reporte:</label>
                        <select id="tipoReporte" class="border border-gray-300 rounded px-4 py-2 mb-4 text-white max-w-xs" style="background-color: transparent;">
                            <option style="color:#1F2937;" value="1">Reporte Consolidado</option>
                            <option style="color:#1F2937;" value="2">Reporte Detallado</option>
                        </select>
                    </div>
                    <div class="flex flex-col">
                        <button id="btnGenerar"  style="background-color: #f19d00; color: white; font-weight: bold; padding: 7px 13px; border-radius: 0.375rem; font-size: 1.125rem; cursor: pointer; margin-top: 30px;">
                            Generar
                        </button>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    <div id="detallado">
        <div class="py-3">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        
                        <h2 class="text-xl text-white font-semibold mb-4">Corriente</h2>
                        <div class="overflow-x-scroll" style="overflow: auto">
                            <table class="min-w-full bg-trasparent divide-y divide-gray-200 text-xs" id="corrientetable">
                                <thead class="bg-trasparent">
                                    <tr>
                                        <th 
                                            class="px-2 py-3 text-left text-white tracking-wider">
                                            Fecha de Registro
                                        </th>
                                        <th 
                                            class="px-2 py-3 bg-transparent text-left text-white font-medium tracking-wider">
                                            Inventario inicial
                                        </th>
                                        <th scope="col"
                                            class="px-2 py-3 bg-transparent text-left text-white font-medium tracking-wider">
                                            Compras
                                        </th>
                                        <th 
                                            class="px-2 py-3 bg-transparent text-left text-white font-medium tracking-wider">
                                            Ventas
                                        </th>
                                        <th 
                                            class="px-2 py-3 bg-transparent text-left text-white font-medium tracking-wider">
                                            Medida teorica
                                        </th>
                                        <th scope="col"
                                            class="px-2 py-3 bg-transparent text-left text-white font-medium tracking-wider">
                                            Medida Fisica
                                        </th>
                                        <th scope="col"
                                            class="px-2 py-3 bg-transparent text-left text-white font-medium tracking-wider">
                                            Variación neta
                                        </th>
                                        <th scope="col"
                                            class="px-2 py-3 bg-transparent text-left text-white font-medium tracking-wider">
                                            %
                                        </th>
                                        <th scope="col"
                                            class="px-2 py-3 bg-transparent text-left text-white font-medium tracking-wider">
                                            Descargue
                                        </th>
                                        <th scope="col"
                                            class="px-2 py-3 bg-transparent text-left text-white font-medium tracking-wider">
                                            Variacion Descargue
                                        </th>                                   
                                    </tr>
                                </thead>
                                <tbody class="bg-trasparent divide-y divide-gray-200">
                                    <tr>
                                        <td class="px-2 py-4 whitespace-nowrap">01/01/2024</td>
                                        <td class="px-2 py-4 whitespace-nowrap">123456</td>
                                        <td class="px-2 py-4 whitespace-nowrap">100</td>
                                        <td class="px-2 py-4 whitespace-nowrap">50</td>
                                        <td class="px-2 py-4 whitespace-nowrap">150</td>
                                        <td class="px-2 py-4 whitespace-nowrap">10</td>
                                        <td class="px-2 py-4 whitespace-nowrap">200</td>
                                        <td class="px-2 py-4 whitespace-nowrap">100</td>
                                        <td class="px-2 py-4 whitespace-nowrap">150</td>
                                        <td class="px-2 py-4 whitespace-nowrap">20</td>                                  
                                    </tr>
                                    <!-- Aquí puedes agregar más filas según sea necesario -->
                                </tbody>
                            </table>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
        <div class="py-3">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">


                        <h2 class="text-xl text-white font-semibold mb-4">Extra</h2>
                        <div class="overflow-x-scroll" style="overflow: auto">
                            <table class="min-w-full bg-trasparent divide-y divide-gray-200 text-xs" id="extratable">
                                <thead class="bg-trasparent">
                                    <tr>
                                        <th 
                                            class="px-2 py-3 text-left text-white tracking-wider">
                                            Fecha de Registro
                                        </th>
                                        <th 
                                            class="px-2 py-3 bg-transparent text-left text-white font-medium tracking-wider">
                                            Inventario inicial
                                        </th>
                                        <th scope="col"
                                            class="px-2 py-3 bg-transparent text-left text-white font-medium tracking-wider">
                                            Compras
                                        </th>
                                        <th 
                                            class="px-2 py-3 bg-transparent text-left text-white font-medium tracking-wider">
                                            Ventas
                                        </th>
                                        <th 
                                            class="px-2 py-3 bg-transparent text-left text-white font-medium tracking-wider">
                                            Medida teorica
                                        </th>
                                        <th scope="col"
                                            class="px-2 py-3 bg-transparent text-left text-white font-medium tracking-wider">
                                            Medida Fisica
                                        </th>
                                        <th scope="col"
                                            class="px-2 py-3 bg-transparent text-left text-white font-medium tracking-wider">
                                            Variación neta
                                        </th>
                                        <th scope="col"
                                            class="px-2 py-3 bg-transparent text-left text-white font-medium tracking-wider">
                                            %
                                        </th>
                                        <th scope="col"
                                            class="px-2 py-3 bg-transparent text-left text-white font-medium tracking-wider">
                                            Descargue
                                        </th>
                                        <th scope="col"
                                            class="px-2 py-3 bg-transparent text-left text-white font-medium tracking-wider">
                                            Variacion Descargue
                                        </th>                                   
                                    </tr>
                                </thead>
                                <tbody class="bg-trasparent divide-y divide-gray-200">
                                    <tr>
                                        <td class="px-2 py-4 whitespace-nowrap">01/01/2024</td>
                                        <td class="px-2 py-4 whitespace-nowrap">123456</td>
                                        <td class="px-2 py-4 whitespace-nowrap">100</td>
                                        <td class="px-2 py-4 whitespace-nowrap">50</td>
                                        <td class="px-2 py-4 whitespace-nowrap">150</td>
                                        <td class="px-2 py-4 whitespace-nowrap">10</td>
                                        <td class="px-2 py-4 whitespace-nowrap">200</td>
                                        <td class="px-2 py-4 whitespace-nowrap">100</td>
                                        <td class="px-2 py-4 whitespace-nowrap">150</td>
                                        <td class="px-2 py-4 whitespace-nowrap">20</td>                                  
                                    </tr>
                                    <!-- Aquí puedes agregar más filas según sea necesario -->
                                </tbody>
                            </table>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
        <div class="py-3">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">

                        <h2 class="text-xl text-white font-semibold mb-4">Diesel</h2>
                        <div class="overflow-x-scroll" style="overflow: auto">
                            <table class="min-w-full bg-trasparent divide-y divide-gray-200 text-xs" id="dieseltable">
                                <thead class="bg-trasparent">
                                    <tr>
                                        <th 
                                            class="px-2 py-3 text-left text-white tracking-wider">
                                            Fecha de Registro
                                        </th>
                                        <th 
                                            class="px-2 py-3 bg-transparent text-left text-white font-medium tracking-wider">
                                            Inventario inicial
                                        </th>
                                        <th scope="col"
                                            class="px-2 py-3 bg-transparent text-left text-white font-medium tracking-wider">
                                            Compras
                                        </th>
                                        <th 
                                            class="px-2 py-3 bg-transparent text-left text-white font-medium tracking-wider">
                                            Ventas
                                        </th>
                                        <th 
                                            class="px-2 py-3 bg-transparent text-left text-white font-medium tracking-wider">
                                            Medida teorica
                                        </th>
                                        <th scope="col"
                                            class="px-2 py-3 bg-transparent text-left text-white font-medium tracking-wider">
                                            Medida Fisica
                                        </th>
                                        <th scope="col"
                                            class="px-2 py-3 bg-transparent text-left text-white font-medium tracking-wider">
                                            Variación neta
                                        </th>
                                        <th scope="col"
                                            class="px-2 py-3 bg-transparent text-left text-white font-medium tracking-wider">
                                            %
                                        </th>
                                        <th scope="col"
                                            class="px-2 py-3 bg-transparent text-left text-white font-medium tracking-wider">
                                            Descargue
                                        </th>
                                        <th scope="col"
                                            class="px-2 py-3 bg-transparent text-left text-white font-medium tracking-wider">
                                            Variacion Descargue
                                        </th>                                   
                                    </tr>
                                </thead>
                                <tbody class="bg-trasparent divide-y divide-gray-200">
                                    <tr>
                                        <td class="px-2 py-4 whitespace-nowrap">01/01/2024</td>
                                        <td class="px-2 py-4 whitespace-nowrap">123456</td>
                                        <td class="px-2 py-4 whitespace-nowrap">100</td>
                                        <td class="px-2 py-4 whitespace-nowrap">50</td>
                                        <td class="px-2 py-4 whitespace-nowrap">150</td>
                                        <td class="px-2 py-4 whitespace-nowrap">10</td>
                                        <td class="px-2 py-4 whitespace-nowrap">200</td>
                                        <td class="px-2 py-4 whitespace-nowrap">100</td>
                                        <td class="px-2 py-4 whitespace-nowrap">150</td>
                                        <td class="px-2 py-4 whitespace-nowrap">20</td>                                  
                                    </tr>
                                    <!-- Aquí puedes agregar más filas según sea necesario -->
                                </tbody>
                            </table>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
    </div>
   
    <div id="consolidado">
        <div class="py-3">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">

                        <h2 class="text-xl text-white font-semibold mb-4">Reporte consolidado</h2>
                        <div class="overflow-x-scroll" style="overflow: auto">
                            <table class="min-w-full bg-trasparent divide-y divide-gray-200 text-xs" id="consolidadoTable">
                                <thead class="bg-trasparent">
                                    <tr>
                                        <th class="px-2 py-3 text-center font-bold" style="font-size: 20px; background-color: rgb(102, 102, 168); color: white;">
                                            Fecha
                                        </th>
                                        <!-- Título que abarcará las tres columnas -->
                                        <th colspan="3" class="px-2 py-3 text-center font-bold" style="font-size: 20px; background-color: rgb(193, 193, 206); color: white;">
                                            Corriente
                                        </th>
                                        <!-- Título que abarcará las tres columnas -->
                                        <th colspan="3" class="px-2 py-3 text-center font-bold" style="font-size: 20px; background-color: rgb(102, 168, 130); color: white;">
                                            Extra
                                        </th>
                                        <!-- Título que abarcará las tres columnas -->
                                        <th colspan="3" class="px-2 py-3 text-center font-bold" style="font-size: 20px; background-color: rgb(168, 139, 102); color: white;">
                                            Diesel
                                        </th>
                                        <!-- Título que abarcará las tres columnas -->
                                        <th colspan="3" class="px-2 py-3 text-center font-bold" style="font-size: 20px; background-color: rgb(168, 102, 102); color: white;">
                                            Total
                                        </th>
                                    </tr>
                                    <tr>
                                        <!-- Las tres columnas individuales -->
                                        <th class="px-2 py-3 text-left text-white tracking-wider">
                                            Fecha
                                        </th>
                                        <!-- Las tres columnas individuales -->
                                        <th class="px-2 py-3 text-left text-white tracking-wider">
                                            Compra
                                        </th>
                                        <th class="px-2 py-3 bg-transparent text-left text-white font-medium tracking-wider">
                                            Venta
                                        </th>
                                        <th class="px-2 py-3 bg-transparent text-left text-white font-medium tracking-wider">
                                            Variacion Neta
                                        </th>
                                        <!-- Las tres columnas individuales -->
                                        <th class="px-2 py-3 text-left text-white tracking-wider">
                                            Compra
                                        </th>
                                        <th class="px-2 py-3 bg-transparent text-left text-white font-medium tracking-wider">
                                            Venta
                                        </th>
                                        <th class="px-2 py-3 bg-transparent text-left text-white font-medium tracking-wider">
                                            Variacion Neta
                                        </th>
                                        <!-- Las tres columnas individuales -->
                                        <th class="px-2 py-3 text-left text-white tracking-wider">
                                            Compra
                                        </th>
                                        <th class="px-2 py-3 bg-transparent text-left text-white font-medium tracking-wider">
                                            Venta
                                        </th>
                                        <th class="px-2 py-3 bg-transparent text-left text-white font-medium tracking-wider">
                                            Variacion Neta
                                        </th>
                                        <!-- Las tres columnas individuales -->
                                        <th class="px-2 py-3 text-left text-white tracking-wider">
                                            Total Compra
                                        </th>
                                        <th class="px-2 py-3 bg-transparent text-left text-white font-medium tracking-wider">
                                            Total Venta
                                        </th>
                                        <th class="px-2 py-3 bg-transparent text-left text-white font-medium tracking-wider">
                                            Variacion Acumulada
                                        </th>
                                    </tr>                                                                                                   
                                </thead>
                                
                                
                                <tbody class="bg-trasparent divide-y divide-gray-200">
                                    <tr>
                                        <td class="px-2 py-4 whitespace-nowrap">01/01/2024</td>
                                        <td class="px-2 py-4 whitespace-nowrap">123456</td>
                                        <td class="px-2 py-4 whitespace-nowrap">100</td>
                                        <td class="px-2 py-4 whitespace-nowrap">50</td>
                                        <td class="px-2 py-4 whitespace-nowrap">150</td>
                                        <td class="px-2 py-4 whitespace-nowrap">10</td>
                                        <td class="px-2 py-4 whitespace-nowrap">200</td>
                                        <td class="px-2 py-4 whitespace-nowrap">100</td>
                                        <td class="px-2 py-4 whitespace-nowrap">150</td>
                                        <td class="px-2 py-4 whitespace-nowrap">20</td>
                                        <td class="px-2 py-4 whitespace-nowrap">20</td>   
                                        <td class="px-2 py-4 whitespace-nowrap">20</td>   
                                        <td class="px-2 py-4 whitespace-nowrap">20</td> 

                                    </tr>
                                    <!-- Aquí puedes agregar más filas según sea necesario -->
                                </tbody>
                            </table>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
    @vite(['resources/views/reportes/js/ws.js'])
    @vite(['resources/views/reportes/js/reportes.js'])
</x-app-layout>
