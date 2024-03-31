// Una vez se carga el dom se llama la funcion para llenar la tabla
document.addEventListener("DOMContentLoaded", function() {
    loadCompras();

});

function loadCompras(){
    var ComprasTable = document.getElementById("comprasTable");
    fetch('/compras/lista')
    .then(response => response.json())
    .then(data => {
        var tableBody = ComprasTable.getElementsByTagName("tbody")[0];
        tableBody.innerHTML = "";

        data.forEach(function(compra) {
            var newRow = tableBody.insertRow();

            var fecha_compra = newRow.insertCell();
            var fecha = new Date(compra.fecha_compra);
            var options = { year: '2-digit', month: '2-digit', day: '2-digit', hour: '2-digit', minute: '2-digit' };
            fecha_compra.textContent = fecha.toLocaleString('es-ES', options);

            var numero_factura = newRow.insertCell();
            numero_factura.textContent = compra.numero_factura;

            var volumen_galones_factura_corriente = newRow.insertCell();
            volumen_galones_factura_corriente.textContent = compra.volumen_galones_factura_corriente;

            var galones_antes_descargue_corriente = newRow.insertCell();
            galones_antes_descargue_corriente.textContent = compra.galones_antes_descargue_corriente;

            var galones_despues_descargue_corriente = newRow.insertCell();
            galones_despues_descargue_corriente.textContent = compra.galones_despues_descargue_corriente;

            var ventas_realizas_descargue_correinte = newRow.insertCell();
            ventas_realizas_descargue_correinte.textContent = compra.ventas_realizas_descargue_correinte;

            var volumen_galones_factura_extra = newRow.insertCell();
            volumen_galones_factura_extra.textContent = compra.volumen_galones_factura_extra;

            var galones_antes_descargue_extra = newRow.insertCell();
            galones_antes_descargue_extra.textContent = compra.galones_antes_descargue_extra;

            var galones_despues_descargue_extra = newRow.insertCell();
            galones_despues_descargue_extra.textContent = compra.galones_despues_descargue_extra;

            var ventas_realizas_descargue_extra = newRow.insertCell();
            ventas_realizas_descargue_extra.textContent = compra.ventas_realizas_descargue_extra;

            var volumen_galones_factura_diesel = newRow.insertCell();
            volumen_galones_factura_diesel.textContent = compra.volumen_galones_factura_diesel;

            var galones_antes_descargue_diesel = newRow.insertCell();
            galones_antes_descargue_diesel.textContent = compra.galones_antes_descargue_diesel;

            var galones_despues_descargue_diesel = newRow.insertCell();
            galones_despues_descargue_diesel.textContent = compra.galones_despues_descargue_diesel;

            var ventas_realizas_descargue_diesel = newRow.insertCell();
            ventas_realizas_descargue_diesel.textContent = compra.ventas_realizas_descargue_diesel;



            var accionesCell = newRow.insertCell();

            // Botón de Actualizar
            var actualizarBtn = document.createElement("button");
            actualizarBtn.classList.add("text-indigo-600", "hover:text-indigo-900", "mr-2");
            actualizarBtn.textContent = "Editar";
            actualizarBtn.addEventListener("click", function() {
                updateCompra(compra.id,
                    compra.fecha_compra,
                    compra.numero_factura,
                    compra.volumen_galones_factura_corriente,
                    compra.galones_antes_descargue_corriente,
                    compra.galones_despues_descargue_corriente,
                    compra.ventas_realizas_descargue_correinte,
                    compra.volumen_galones_factura_extra,
                    compra.galones_antes_descargue_extra,
                    compra.galones_despues_descargue_extra,
                    compra.ventas_realizas_descargue_extra,
                    compra.volumen_galones_factura_diesel,
                    compra.galones_antes_descargue_diesel,
                    compra.galones_despues_descargue_diesel,
                    compra.ventas_realizas_descargue_diesel);
            });
            
            // Botón de Eliminar
            var eliminarBtn = document.createElement("button");
            eliminarBtn.classList.add("text-red-600", "hover:text-red-900");
            eliminarBtn.textContent = "Eliminar";
            eliminarBtn.addEventListener("click", function() {
                eliminarCompra(compra.id,); 
            });
            

            var roleDiv = document.getElementById('role');
            var role = roleDiv.dataset.role;
            if (role === 'admin') {
                accionesCell.appendChild(actualizarBtn);
            accionesCell.appendChild(eliminarBtn);
            }
            // Añadir botones a la celda de acciones
            
        });
    })
    .catch(error => {
        console.error(error);
    });
}

function eliminarCompra(id) {
    var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    fetch('/compras/' + id, {
        method: 'DELETE',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            loadCompras(); // Recargar la tabla después de eliminar el documento
        }
    })
    .catch(error => {
        console.error(error);
    });
}
// Función para abrir el modal y accionar la peticion de actualizacion
function updateCompra(id,
    fecha_compra,
    numero_factura,
    volumen_galones_factura_corriente,
    galones_antes_descargue_corriente,
    galones_despues_descargue_corriente,
    ventas_realizas_descargue_correinte,
    volumen_galones_factura_extra,
    galones_antes_descargue_extra,
    galones_despues_descargue_extra,
    ventas_realizas_descargue_extra,
    volumen_galones_factura_diesel,
    galones_antes_descargue_diesel,
    galones_despues_descargue_diesel,
    ventas_realizas_descargue_diesel) {

        console.log(id,
            fecha_compra,
            numero_factura,
            volumen_galones_factura_corriente,
            galones_antes_descargue_corriente,
            galones_despues_descargue_corriente,
            ventas_realizas_descargue_correinte,
            volumen_galones_factura_extra,
            galones_antes_descargue_extra,
            galones_despues_descargue_extra,
            ventas_realizas_descargue_extra,
            volumen_galones_factura_diesel,
            galones_antes_descargue_diesel,
            galones_despues_descargue_diesel,
            ventas_realizas_descargue_diesel)


    const modalUpdate = document.getElementById('myModalupdate');
    const modalBackdrop = modalUpdate.querySelector('.absolute.inset-0.bg-gray-500.opacity-75');
    modalUpdate.classList.remove('hidden');
  
    
    // Agregar un event listener al botón de cerrar modal
    const closeModalButton = document.getElementById('closeModalUpdateButton');
    closeModalButton.addEventListener('click', () => {
        modalUpdate.classList.add('hidden'); // Ocultar el modal al hacer clic en el botón
    });
    
    // Agregar evento de clic al fondo oscuro del modal para cerrarlo
    modalBackdrop.addEventListener('click', () => {
        modalUpdate.classList.add('hidden'); // Ocultar el modal al hacer clic en el fondo oscuro
    });

    document.getElementById('compraId').value = id ? id : '';
    document.getElementById('numero_factura_update').value = numero_factura ? numero_factura : '';
    document.getElementById('fecha_compra_update').value = fecha_compra ? fecha_compra : '';
    document.getElementById('volumen_galones_factura_corriente_update').value = volumen_galones_factura_corriente ? volumen_galones_factura_corriente : '';
    document.getElementById('equivalente_galones_medida_corriente-antes_update').value = galones_antes_descargue_corriente ? galones_antes_descargue_corriente : '';
    document.getElementById('equivalente_galones_medida_corriente-despues_update').value = galones_despues_descargue_corriente ? galones_despues_descargue_corriente : '';
    document.getElementById('ventas_realizas_descargue_correinte_update').value = ventas_realizas_descargue_correinte ? ventas_realizas_descargue_correinte : '';
    document.getElementById('volumen_galones_factura_extra_update').value = volumen_galones_factura_extra ? volumen_galones_factura_extra : '';
    document.getElementById('equivalente_galones_medida_extra_antes_update').value = galones_antes_descargue_extra ? galones_antes_descargue_extra : '';
    document.getElementById('equivalente_galones_medida_extra_despues_update').value = galones_despues_descargue_extra ? galones_despues_descargue_extra : '';
    document.getElementById('ventas_realizas_descargue_extra_update').value = ventas_realizas_descargue_extra ? ventas_realizas_descargue_extra : '';
    document.getElementById('volumen_galones_factura_diesel_update').value = volumen_galones_factura_diesel ? volumen_galones_factura_diesel : '';
    document.getElementById('equivalente_galones_medida_diesel_antes_update').value = galones_antes_descargue_diesel ? galones_antes_descargue_diesel : '';
    document.getElementById('equivalente_galones_medida_diesel_despues_update').value = galones_despues_descargue_diesel ? galones_despues_descargue_diesel : '';
    document.getElementById('ventas_realizas_descargue_diesel_update').value = ventas_realizas_descargue_diesel ? ventas_realizas_descargue_diesel : '';
    

//   var guardarCambiosBtn = document.getElementById('saveChangesBtn');
//     guardarCambiosBtn.addEventListener("click", function() {
//         saveChangesDocType();
//     });
  }

const openModalButton = document.getElementById('openModalButton');
const modal = document.getElementById('myModal');
const modalBackdrop = modal.querySelector('.absolute.inset-0.bg-gray-500.opacity-75');

// Agregar evento de clic al botón para mostrar el modal
openModalButton.addEventListener('click', function() {
    modal.classList.remove('hidden');
});

// Agregar un event listener al botón de cerrar modal
const closeModalButton = document.getElementById('closeModalButton');
closeModalButton.addEventListener('click', () => {
    modal.classList.add('hidden'); // Ocultar el modal al hacer clic en el botón
});

// Agregar evento de clic al fondo oscuro del modal para cerrarlo
modalBackdrop.addEventListener('click', () => {
    modal.classList.add('hidden'); // Ocultar el modal al hacer clic en el fondo oscuro
});