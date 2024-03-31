
<form action= "{{  route('compras.store')}}"method="POST">
    @csrf
    <section class="p-4" style="background-color: #18202b;"> 
        <h2 class="text-xl font-semibold mb-2">Detalles de Compra</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label for="fecha_compra" class="block">Fecha de Compra</label>
                <input type="datetime-local" name="fecha_compra" id="fecha_compra" class="block w-full rounded-md border-gray-300" style="background-color: transparent; ">
            </div>
            <div>
                <label for="numero_factura" class="block">Número de Factura</label>
                <input type="number" name="numero_factura" id="numero_factura" class="block w-full rounded-md border-gray-300" style="background-color: transparent; ">
            </div>
        </div>
    </section>
    <section class="bg-gray-200 p-4 mt-4" style="background-color: #18202b;">
        <h2 class="text-xl font-semibold mb-2 text-white">Detalles para corriente</h2>
        <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-1 xl:grid-cols-1 gap-1">

            <div>
                <label for="volumen_galones_factura_corriente" class="block text-white">Volumen Galones Factura Corriente</label>
                <input type="text" name="volumen_galones_factura_corriente" id="volumen_galones_factura_corriente" class="block w-full rounded-md border-gray-300 bg-transparent">
            </div>

            <div class="flex justify-center w-full"> <!-- Modificación aquí -->
                <div class="mr-2 w-full"> <!-- Modificación aquí -->
                    <label for="galones_antes_descargue_corriente" class="block text-white">Medida en pulgadas antes del descargue</label>
                    <input placeholder="Ingresa el valor en pulgadas" type="text" name="galones_antes_descargue_corriente" id="galones_antes_descargue_corriente" class="block w-full rounded-md border-gray-300 bg-transparent">
                </div>
                <div class="w-full"> <!-- Modificación aquí -->
                    <label for="volumen_galones_factura_corriente" class="block text-white">Equivalente de medida en galones</label>
                    <input placeholder="Galones equivalentes" type="text" name="equivalente_galones_medida_corriente" id="equivalente_galones_medida_corriente-antes" class="block w-full rounded-md border-gray-300 bg-transparent" readonly>
                </div>
            </div>

            <div class="flex justify-center w-full"> <!-- Modificación aquí -->
                <div class="mr-2 w-full"> <!-- Modificación aquí -->
                    <label for="galones_despues_descargue_corriente" class="block text-white">Medida en pulgadas después del descargue</label>
                <input placeholder="Ingresa el valor en pulgadas" type="text" name="galones_despues_descargue_corriente" id="galones_despues_descargue_corriente" class="block w-full rounded-md border-gray-300 bg-transparent">
                </div>
                <div class="w-full"> <!-- Modificación aquí -->
                    <label for="volumen_galones_factura_corriente" class="block text-white">Equivalente de medida en galones</label>
                <input placeholder="Galones equivalentes" type="text" name="equivalente_galones_medida_corriente-despues" id="equivalente_galones_medida_corriente-despues" class="block w-full rounded-md border-gray-300 bg-transparent" readonly>
                </div>
            </div>




            <div class="flex justify-center w-full"> <!-- Modificación aquí -->
                <div class="mr-2 w-full"> <!-- Modificación aquí -->
                    <label for="galones_antes_descargue_corriente" class="block text-white">Medida en pulgadas antes del descargue 2</label>
                    <input placeholder="Ingresa el valor en pulgadas" type="text" name="galones_antes_descargue_corriente2" id="galones_antes_descargue_corriente2" class="block w-full rounded-md border-gray-300 bg-transparent">
                </div>
                <div class="w-full"> <!-- Modificación aquí -->
                    <label for="volumen_galones_factura_corriente" class="block text-white">Equivalente de medida en galones</label>
                    <input placeholder="Galones equivalentes" type="text" name="equivalente_galones_medida_corriente2" id="equivalente_galones_medida_corriente-antes2" class="block w-full rounded-md border-gray-300 bg-transparent" readonly>
                </div>
            </div>

            <div class="flex justify-center w-full"> <!-- Modificación aquí -->
                <div class="mr-2 w-full"> <!-- Modificación aquí -->
                    <label for="galones_despues_descargue_corriente" class="block text-white">Medida en pulgadas después del descargue 2</label>
                <input placeholder="Ingresa el valor en pulgadas" type="text" name="galones_despues_descargue_corriente2" id="galones_despues_descargue_corriente2" class="block w-full rounded-md border-gray-300 bg-transparent">
                </div>
                <div class="w-full"> <!-- Modificación aquí -->
                    <label for="volumen_galones_factura_corriente" class="block text-white">Equivalente de medida en galones</label>
                <input placeholder="Galones equivalentes" type="text" name="equivalente_galones_medida_corriente-despues2" id="equivalente_galones_medida_corriente-despues2" class="block w-full rounded-md border-gray-300 bg-transparent" readonly>
                </div>
            </div>


            <div>
                <label for="ventas_realizas_descargue_correinte" class="block text-white">Ventas realizadas durante el descargue</label>
                <input type="text" name="ventas_realizas_descargue_correinte" id="ventas_realizas_descargue_correinte" class="block w-full rounded-md border-gray-300 bg-transparent">
            </div>
        </div>
    </section>
    <section class="bg-gray-200 p-4 mt-4" style="background-color: #18202b;">
        <h2 class="text-xl font-semibold mb-2 text-white">Detalles para gasolina extra</h2>
        <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-1 xl:grid-cols-1 gap-1">
            <div>
                <label for="volumen_galones_factura_extra" class="block text-white">Volumen Galones Factura Extra</label>
                <input type="text" name="volumen_galones_factura_extra" id="volumen_galones_factura_extra" class="block w-full rounded-md border-gray-300 bg-transparent">
            </div>
            <div class="flex justify-center w-full"> <!-- Modificación aquí -->
                <div class="mr-2 w-full"> <!-- Modificación aquí -->
                    <label for="galones_antes_descargue_extra" class="block text-white">Medida en pulgadas antes del descargue</label>
                    <input placeholder="Ingresa el valor en pulgadas" type="text" name="galones_antes_descargue_extra" id="galones_antes_descargue_extra" class="block w-full rounded-md border-gray-300 bg-transparent">
                </div>
                <div class="w-full"> <!-- Modificación aquí -->
                    <label for="volumen_galones_factura_extra" class="block text-white">Equivalente de medida en galones</label>
                    <input placeholder="Galones equivalentes" type="text" name="equivalente_galones_medida_extra_antes" id="equivalente_galones_medida_extra_antes" class="block w-full rounded-md border-gray-300 bg-transparent" readonly>
                </div>
            </div>
            <div class="flex justify-center w-full"> <!-- Modificación aquí -->
                <div class="mr-2 w-full"> <!-- Modificación aquí -->
                    <label for="galones_despues_descargue_extra" class="block text-white">Medida en pulgadas después del descargue</label>
                    <input placeholder="Ingresa el valor en pulgadas" type="text" name="galones_despues_descargue_extra" id="galones_despues_descargue_extra" class="block w-full rounded-md border-gray-300 bg-transparent">
                </div>
                <div class="w-full"> <!-- Modificación aquí -->
                    <label for="volumen_galones_factura_extra" class="block text-white">Equivalente de medida en galones</label>
                    <input placeholder="Galones equivalentes" type="text" name="equivalente_galones_medida_extra_despues" id="equivalente_galones_medida_extra_despues" class="block w-full rounded-md border-gray-300 bg-transparent" readonly>
                </div>
            </div>
            <div>
                <label for="ventas_realizas_descargue_extra" class="block text-white">Ventas realizadas durante el descargue de gasolina extra</label>
                <input type="text" name="ventas_realizas_descargue_extra" id="ventas_realizas_descargue_extra" class="block w-full rounded-md border-gray-300 bg-transparent">
            </div>
        </div>
    </section>
    <section class="bg-gray-200 p-4 mt-4" style="background-color: #18202b;">
        <h2 class="text-xl font-semibold mb-2 text-white">Detalles para diesel</h2>
        <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-1 xl:grid-cols-1 gap-1">
            <div>
                <label for="volumen_galones_factura_diesel" class="block text-white">Volumen Galones Factura Diesel</label>
                <input type="text" name="volumen_galones_factura_diesel" id="volumen_galones_factura_diesel" class="block w-full rounded-md border-gray-300 bg-transparent">
            </div>
            <div class="flex justify-center w-full">
                <div class="mr-2 w-full">
                    <label for="galones_antes_descargue_diesel" class="block text-white">Medida en pulgadas antes del descargue</label>
                    <input placeholder="Ingresa el valor en pulgadas" type="text" name="galones_antes_descargue_diesel" id="galones_antes_descargue_diesel" class="block w-full rounded-md border-gray-300 bg-transparent">
                </div>
                <div class="w-full">
                    <label for="volumen_galones_factura_diesel" class="block text-white">Equivalente de medida en galones</label>
                    <input placeholder="Galones equivalentes" type="text" name="equivalente_galones_medida_diesel_antes" id="equivalente_galones_medida_diesel_antes" class="block w-full rounded-md border-gray-300 bg-transparent" readonly>
                </div>
            </div>
            <div class="flex justify-center w-full">
                <div class="mr-2 w-full">
                    <label for="galones_despues_descargue_diesel" class="block text-white">Medida en pulgadas después del descargue</label>
                    <input placeholder="Ingresa el valor en pulgadas" type="text" name="galones_despues_descargue_diesel" id="galones_despues_descargue_diesel" class="block w-full rounded-md border-gray-300 bg-transparent">
                </div>
                <div class="w-full">
                    <label for="volumen_galones_factura_diesel" class="block text-white">Equivalente de medida en galones</label>
                    <input placeholder="Galones equivalentes" type="text" name="equivalente_galones_medida_diesel_despues" id="equivalente_galones_medida_diesel_despues" class="block w-full rounded-md border-gray-300 bg-transparent" readonly>
                </div>
            </div>
            <div>
                <label for="ventas_realizas_descargue_diesel" class="block text-white">Ventas realizadas durante el descargue de diesel</label>
                <input type="text" name="ventas_realizas_descargue_diesel" id="ventas_realizas_descargue_diesel" class="block w-full rounded-md border-gray-300 bg-transparent">
            </div>
        </div>
    </section>
   
    <div class="mt-4 text-center"> <!-- Añadir clase text-center para centrar horizontalmente -->
        <button type="submit" style="background-color: #f19d00; color: white; font-weight: bold; padding: 10px 20px; border-radius: 0.375rem; font-size: 1.125rem; cursor: pointer;">Guardar</button> <!-- Aplicar estilos CSS directamente en el botón -->
    </div>

</form>
@vite(['resources/views/compras/js/conversorMedidas.js'])