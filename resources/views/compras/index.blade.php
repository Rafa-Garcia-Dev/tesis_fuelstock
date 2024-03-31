<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Compras') }}
        </h2>
    </x-slot>

    <div class="py-12" id="role" data-role="{{ auth()->user()->hasRole('admin') ? 'admin' : 'no-admin' }}">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- Botón para agregar un nuevo registro -->
                    <button id="openModalButton" style="background-color: #f19d00; color: white; font-weight: bold; padding: 10px 20px; margin: 10px 20px; border-radius: 0.375rem; font-size: 1.125rem; cursor: pointer;" >Descargue</button>


                    <div class="overflow-x-scroll" style="overflow: auto">
                        <table class="min-w-full bg-trasparent divide-y divide-gray-200 text-xs" id="comprasTable">
                        <thead class="bg-trasparent">
                            <tr>
                                <th 
                                    class="px-2 py-3 text-left text-white tracking-wider">
                                    Fecha de Compra
                                </th>
                                <th 
                                    class="px-2 py-3 bg-transparent text-left text-white font-medium tracking-wider">
                                    Número de Factura
                                </th>
                                <th scope="col"
                                    class="px-2 py-3 bg-transparent text-left text-white font-medium tracking-wider">
                                    Volumen Galones Factura Corriente
                                </th>
                                <th 
                                    class="px-2 py-3 bg-transparent text-left text-white font-medium tracking-wider">
                                    Galones Antes Descargue Corriente
                                </th>
                                <th 
                                    class="px-2 py-3 bg-transparent text-left text-white font-medium tracking-wider">
                                    Galones Después Descargue Corriente
                                </th>
                                <th scope="col"
                                    class="px-2 py-3 bg-transparent text-left text-white font-medium tracking-wider">
                                    Ventas Realizadas Descargue Corriente
                                </th>
                                <th scope="col"
                                    class="px-2 py-3 bg-transparent text-left text-white font-medium tracking-wider">
                                    Volumen Galones Factura Extra
                                </th>
                                <th scope="col"
                                    class="px-2 py-3 bg-transparent text-left text-white font-medium tracking-wider">
                                    Galones Antes Descargue Extra
                                </th>
                                <th scope="col"
                                    class="px-2 py-3 bg-transparent text-left text-white font-medium tracking-wider">
                                    Galones Después Descargue Extra
                                </th>
                                <th scope="col"
                                    class="px-2 py-3 bg-transparent text-left text-white font-medium tracking-wider">
                                    Ventas Realizadas Descargue Extra
                                </th>
                                <th scope="col"
                                    class="px-2 py-3 bg-transparent text-left text-white font-medium tracking-wider">
                                    Volumen Galones Factura Diesel
                                </th>
                                <th scope="col"
                                    class="px-2 py-3 bg-transparent text-left text-white font-medium tracking-wider">
                                    Galones Antes Descargue Diesel
                                </th>
                                <th scope="col"
                                    class="px-2 py-3 bg-transparent text-left text-white font-medium tracking-wider">
                                    Galones Después Descargue Diesel
                                </th>
                                <th scope="col"
                                    class="px-2 py-3 bg-transparent text-left text-white font-medium tracking-wider">
                                    Ventas Realizadas Descargue Diesel
                                </th>
                                <th scope="col"
                                class="px-2 py-3 bg-transparent text-left text-white font-medium tracking-wider">
                                    Acciones
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-trasparent divide-y divide-gray-200">                            
                        </tbody>
                    </table>
                    </div>  
                    <div id="myModal" class="fixed z-10 inset-0 overflow-y-auto hidden">
                        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                            </div>
                            
                            <!-- Contenido del modal -->
                            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                                    <div class="p-6 text-gray-900 dark:text-gray-100">
                                        <button id="closeModalButton" class="absolute top-0 right-0  text-gray-600 hover:text-gray-900 focus:outline-none" aria-label="Cerrar modal">
                                            <!-- Ícono de "x" para el botón de cierre -->
                                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="red">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </button>
                                        @include('compras.formCompras')
                                      
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="myModalupdate" class="fixed z-10 inset-0 overflow-y-auto hidden">
                        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                            </div>
                            
                            <!-- Contenido del modal -->
                            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                                    <div class="p-6 text-gray-900 dark:text-gray-100">
                                        <button id="closeModalUpdateButton" class="absolute top-0 right-0  text-gray-600 hover:text-gray-900 focus:outline-none" aria-label="Cerrar modal">
                                            <!-- Ícono de "x" para el botón de cierre -->
                                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="red">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </button>
                                        @include('compras.formUpdateCompras')
                                      
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- Botón para agregar un nuevo registro -->
                    <button id="openModalMedidaButton" style="background-color: #f19d00; color: white; font-weight: bold; padding: 10px 20px; margin: 10px 20px; border-radius: 0.375rem; font-size: 1.125rem; cursor: pointer;" >Inventario final</button>


                    <div class="overflow-x-scroll" style="overflow: auto">
                        <table class="min-w-full bg-trasparent divide-y divide-gray-200 text-xs" id="medidasTable">
                        <thead class="bg-trasparent">
                            <tr>
                                <th 
                                    class="px-2 py-3 text-left text-white tracking-wider">
                                    Fecha de Cierre
                                </th>
                                <th 
                                    class="px-2 py-3 bg-transparent text-left text-white font-medium tracking-wider">
                                    Galones al cierre corriente
                                </th>   
                                <th 
                                    class="px-2 py-3 bg-transparent text-left text-white font-medium tracking-wider">
                                    Galones al cierre extra
                                </th>  
                                <th 
                                    class="px-2 py-3 bg-transparent text-left text-white font-medium tracking-wider">
                                    Galones al cierre diesel
                                </th>                              
                                <th scope="col"
                                class="px-2 py-3 bg-transparent text-left text-white font-medium tracking-wider">
                                    Acciones
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-trasparent divide-y divide-gray-200" id="tbody_medidas">
                                                     
                        </tbody>
                    </table>
                    </div>  
                    <div id="myModalMedida" class="fixed z-10 inset-0 overflow-y-auto hidden">
                        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                            </div>
                            
                            <!-- Contenido del modal -->
                            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                                    <div class="p-6 text-gray-900 dark:text-gray-100">
                                        <button id="closeModalButtonMedida" class="absolute top-0 right-0  text-gray-600 hover:text-gray-900 focus:outline-none" aria-label="Cerrar modal">
                                            <!-- Ícono de "x" para el botón de cierre -->
                                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="red">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </button>
                                        @include('compras.formMedidas')
                                      
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="myModalupdateMedida" class="fixed z-10 inset-0 overflow-y-auto hidden">
                        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                            </div>
                            
                            <!-- Contenido del modal -->
                            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                                    <div class="p-6 text-gray-900 dark:text-gray-100">
                                        <button id="closeModalUpdateButtonMedidas" class="absolute top-0 right-0  text-gray-600 hover:text-gray-900 focus:outline-none" aria-label="Cerrar modal">
                                            <!-- Ícono de "x" para el botón de cierre -->
                                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="red">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </button>
                                        @include('compras.formMedidasUpdate')
                                      
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @vite(['resources/views/compras/js/comprasFunctions.js'])
    @vite(['resources/views/compras/js/medidasFunctions.js'])
</x-app-layout>
