

document.getElementById("btnWS").addEventListener("click", function() {
    var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    // Obtener el valor del input del ID del consolidado
    var idConsolidado = document.getElementById("idConsolidado").value;
    showLoader()
    // Realizar la solicitud al controlador de Laravel
    fetch('/ventas', {
        method: 'POST', // Cambiar a POST
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken
        },
        body: JSON.stringify({ idConsolidado: idConsolidado }) // Pasar el ID en el cuerpo de la solicitud
    })
    .then(response => {
        if (response.ok) {
            // Si la respuesta es exitosa, parsea el JSON
            response.json().then(data => {
                hideLoader();
                if (response.status === 200) {
                    // Si el estado es 200, muestra el mensaje de éxito y accede a los datos
                    Swal.fire({
                        icon: 'success',
                        title: 'Éxito',
                        text: data.message,
                        showConfirmButton: false,
                        timer: 1500
                    });
                    console.log('Datos recibidos:', data);
                } else if (response.status === 201) {
                    // Si el estado es 200, muestra el mensaje de éxito y accede a los datos
                    Swal.fire({
                        icon: 'warning',
                       
                        text: data.message,
                        showConfirmButton: false,
                        timer: 1500
                    });
                    console.log('Datos recibidos:', data);
                }else {
                    // Para cualquier otro código de estado, muestra el mensaje de error
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Error: ' + data.message
                    });
                }
            });
        } else {
            // Si la respuesta no es exitosa, muestra el mensaje de error genérico
            alert('Error en la solicitud');
        }
    })
    .catch(error => {
        // Captura y maneja errores de red u otros errores
        console.error('Error de red:', error);
    });
  
});


function showLoader() {
    // Muestra tu cargador aquí (por ejemplo, un div con una animación CSS)
    document.querySelector(".loader-container").style.display = "block";
}

function hideLoader() {
    // Oculta tu cargador aquí
    document.querySelector(".loader-container").style.display = "none";
}