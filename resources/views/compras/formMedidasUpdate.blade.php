
<form action= "{{  route('medidas.update') }}"method="POST">
    @csrf
    @method('PUT')
    <input type="number" name="id" id="medidaID" style="display: none;">
    
    <section class="p-4" style="background-color: #18202b;"> 
        <h2 class="text-xl font-semibold mb-2">Detalles de Medida de Cierre</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label for="fecha_medida" class="block">Fecha de medida de cierre</label>
                <input type="datetime-local" name="fecha_medida" id="fecha_medida_update" class="block w-full rounded-md border-gray-300" style="background-color: transparent; ">
            </div>
        </div>

        <div class="flex justify-center w-full mt-4">
            <div class="mr-2 w-full">
                <label for="medida_galones_al_cierre_corriente" class="block text-white">Medida al cierre corriente</label>
                <input placeholder="Ingresa el valor en pulgadas" type="text" name="medida_galones_al_cierre_corriente" id="medida_galones_al_cierre_corriente_update" class="block w-full rounded-md border-gray-300 bg-transparent">
            </div>
            <div class="w-full">
                <label for="galones_al_cierre_corriente" class="block text-white">Equivalente en galones</label>
                <input placeholder="Galones equivalentes" type="text" name="galones_al_cierre_corriente" id="galones_al_cierre_corriente_update" class="block w-full rounded-md border-gray-300 bg-transparent" readonly>
            </div>
        </div>

        <div class="flex justify-center w-full mt-4">
            <div class="mr-2 w-full">
                <label for="medida_galones_al_cierre_extra" class="block text-white">Medida al cierre extra</label>
                <input placeholder="Ingresa el valor en pulgadas" type="text" name="medida_galones_al_cierre_extra" id="medida_galones_al_cierre_extra_update" class="block w-full rounded-md border-gray-300 bg-transparent">
            </div>
            <div class="w-full">
                <label for="galones_al_cierre_extra" class="block text-white">Equivalente en galones</label>
                <input placeholder="Galones equivalentes" type="text" name="galones_al_cierre_extra" id="galones_al_cierre_extra_update" class="block w-full rounded-md border-gray-300 bg-transparent" readonly>
            </div>
        </div>

        <div class="flex justify-center w-full mt-4">
            <div class="mr-2 w-full">
                <label for="medida_galones_al_cierre_diesel" class="block text-white">Medida al cierre diesel</label>
                <input placeholder="Ingresa el valor en pulgadas" type="text" name="medida_galones_al_cierre_diesel" id="medida_galones_al_cierre_diesel_update" class="block w-full rounded-md border-gray-300 bg-transparent">
            </div>
            <div class="w-full">
                <label for="galones_al_cierre_diesel" class="block text-white">Equivalente en galones</label>
                <input placeholder="Galones equivalentes" type="text" name="galones_al_cierre_diesel" id="galones_al_cierre_diesel_update" class="block w-full rounded-md border-gray-300 bg-transparent" readonly>
            </div>
        </div>
    </section>
    <div class="mt-4 text-center"> <!-- Añadir clase text-center para centrar horizontalmente -->
        <button type="submit" style="background-color: #f19d00; color: white; font-weight: bold; padding: 10px 20px; border-radius: 0.375rem; font-size: 1.125rem; cursor: pointer;">Guardar</button> <!-- Aplicar estilos CSS directamente en el botón -->
    </div>

</form>
@vite(['resources/views/compras/js/conversorMedidasUpdate.js'])