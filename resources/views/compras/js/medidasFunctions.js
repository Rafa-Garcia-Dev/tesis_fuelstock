document.addEventListener("DOMContentLoaded", function() {
    loadMedidas();
});

function loadMedidas(){
    var ComprasTable = document.getElementById("medidasTable");
    fetch('/medidas/lista')
    .then(response => response.json())
    .then(data => {
        var tableBody = ComprasTable.getElementsByTagName("tbody")[0];
        tableBody.innerHTML = "";

        data.forEach(function(medida) {
            var newRow = tableBody.insertRow();

            var fecha_compra = newRow.insertCell();
            var fecha = new Date(medida.fecha_medida);
            var options = { year: '2-digit', month: '2-digit', day: '2-digit', hour: '2-digit', minute: '2-digit' };
            fecha_compra.textContent = fecha.toLocaleString('es-ES', options);

            var galones_al_cierre_corriente = newRow.insertCell();
            galones_al_cierre_corriente.textContent = medida.galones_al_cierre_corriente;

            var galones_al_cierre_extra = newRow.insertCell();
            galones_al_cierre_extra.textContent = medida.galones_al_cierre_extra;

            var galones_al_cierre_diesel = newRow.insertCell();
            galones_al_cierre_diesel.textContent = medida.galones_al_cierre_diesel;

            var accionesCell = newRow.insertCell();

            // Botón de Actualizar
            var actualizarBtn = document.createElement("button");
            actualizarBtn.classList.add("text-indigo-600", "hover:text-indigo-900", "mr-2");
            actualizarBtn.textContent = "Editar";
            actualizarBtn.addEventListener("click", function() {
                updateMedida(medida.id,
                    medida.fecha_medida,
                    medida.galones_al_cierre_corriente,
                    medida.galones_al_cierre_extra,
                    medida.galones_al_cierre_diesel
                   );
            });
            
            // Botón de Eliminar
            var eliminarBtn = document.createElement("button");
            eliminarBtn.classList.add("text-red-600", "hover:text-red-900");
            eliminarBtn.textContent = "Eliminar";
            eliminarBtn.addEventListener("click", function() {
                eliminarMedida(medida.id,); 
            });
            
            // Añadir botones a la celda de acciones
            // Verificar si el usuario es administrador para mostrar los botones de editar y eliminar
            var roleDiv = document.getElementById('role');
            var role = roleDiv.dataset.role;
            if (role === 'admin') {
                accionesCell.appendChild(actualizarBtn);
                accionesCell.appendChild(eliminarBtn);
            }
        });
    })
    .catch(error => {
        console.error(error);
    });
}


function eliminarMedida(id) {
    var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    fetch('/medidas/' + id, {
        method: 'DELETE',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            loadMedidas(); // Recargar la tabla después de eliminar el documento
        }
    })
    .catch(error => {
        console.error(error);
    });
}
// Función para abrir el modal y accionar la peticion de actualizacion
function updateMedida(idUpdate,
    fecha_medida,
    galones_al_cierre_corriente,
    galones_al_cierre_extra,
    galones_al_cierre_diesel) {

        console.log(idUpdate,
            fecha_medida,
            galones_al_cierre_corriente,
            galones_al_cierre_extra,
            galones_al_cierre_diesel)

    const modalUpdateMedida = document.getElementById('myModalupdateMedida');
    const modalBackdropMedida = modalUpdateMedida.querySelector('.absolute.inset-0.bg-gray-500.opacity-75');
    modalUpdateMedida.classList.remove('hidden');
  
    
    // Agregar un event listener al botón de cerrar modal
    const closeModalButtonMedida = document.getElementById('closeModalUpdateButtonMedidas');
    closeModalButtonMedida.addEventListener('click', () => {
        modalUpdateMedida.classList.add('hidden'); // Ocultar el modal al hacer clic en el botón
    });
    
    // Agregar evento de clic al fondo oscuro del modal para cerrarlo
    modalBackdropMedida.addEventListener('click', () => {
        modalUpdateMedida.classList.add('hidden'); // Ocultar el modal al hacer clic en el fondo oscuro
    });

   
    document.getElementById('medidaID').value = idUpdate ? idUpdate : '';
    document.getElementById('fecha_medida_update').value = fecha_medida ? fecha_medida : '';
    document.getElementById('galones_al_cierre_corriente_update').value = galones_al_cierre_corriente ? galones_al_cierre_corriente : '';
    document.getElementById('galones_al_cierre_extra_update').value = galones_al_cierre_extra ? galones_al_cierre_extra : '';
    document.getElementById('galones_al_cierre_diesel_update').value = galones_al_cierre_diesel ? galones_al_cierre_diesel : '';
    
    
  }


const openModalButtonMedidas = document.getElementById('openModalMedidaButton');
const modalMedidas = document.getElementById('myModalMedida');
const modalBackdropMedidas = modalMedidas.querySelector('.absolute.inset-0.bg-gray-500.opacity-75');

// Agregar evento de clic al botón para mostrar el modal
openModalButtonMedidas.addEventListener('click', function() {
    modalMedidas.classList.remove('hidden');
});

// Agregar un event listener al botón de cerrar modal
const closeModalButtonMedida = document.getElementById('closeModalButtonMedida');
closeModalButtonMedida.addEventListener('click', () => {
    modalMedidas.classList.add('hidden'); // Ocultar el modal al hacer clic en el botón
});

// Agregar evento de clic al fondo oscuro del modal para cerrarlo
modalBackdropMedidas.addEventListener('click', () => {
    modalMedidas.classList.add('hidden'); // Ocultar el modal al hacer clic en el fondo oscuro
});