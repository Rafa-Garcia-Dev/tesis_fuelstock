
// Ahora puedes usar la función desde cualquier parte del código
$(document).ready(function() {

    var fechaActual = new Date();
    var mesActual = fechaActual.getMonth() + 1; // Se suma 1 porque los meses van de 0 a 11
    var añoActual = fechaActual.getFullYear();
    
    document.getElementById("consolidado").style.display = "none";
    document.getElementById("detallado").style.display = "block";
    document.getElementById("tipoReporte").value =2;
    

    // Seleccionar la opción correspondiente al mes actual
    document.getElementById("mes").value = mesActual;

    // Seleccionar la opción correspondiente al año actual
    document.getElementById("ano").value = añoActual;

    var corrienteTable = $('#corrientetable').DataTable();
    var dieselTable = $('#dieseltable').DataTable();
    var extraTable = $('#extratable').DataTable();
    var consolidadoTable = $('#consolidadoTable').DataTable();

    var monthSeleted = document.getElementById("mes").value;
    var yearSelected = document.getElementById("ano").value;

    fillReportTableDetallado(monthSeleted, yearSelected, corrienteTable, dieselTable, extraTable);

    // Define la función fillReportTableDetallado fuera del $(document).ready()
    function fillReportTableDetallado(monthSeleted, yearSelected, corrienteTable, dieselTable, extraTable) {
        var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        showLoader()
        fetch('/ventas/report', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken
            },
            body: JSON.stringify({ monthSeleted: monthSeleted, yearSelected: yearSelected }) 
        })
        .then(response => response.json())
        .then(data => {
            hideLoader();
            Swal.fire({
                icon: 'success',
                title: 'Actulizada',
                text: data.message,
                showConfirmButton: false,
                timer: 1500
            });
            // Limpia las tablas antes de agregar nuevos datos
            corrienteTable.clear().draw();
            dieselTable.clear().draw();
            extraTable.clear().draw();

            // Llenar tabla corriente
            data.data.corriente.forEach(function(registro) {
                corrienteTable.row.add([
                    registro.dia_corriente,
                    registro.inventario_inicial_corriente,
                    registro.compras_corriente,
                    registro.ventas_corriente,
                    registro.medida_teorica_corriente,
                    registro.medida_fisica_corriente,
                    registro.variacion_neta_corriente,
                    registro.porcentaje_corriente,
                    registro.descargue_corriente,
                    registro.variacion_descargue_corriente
                ]).draw();
            });

            // Llenar tabla diesel
            data.data.diesel.forEach(function(registro) {
                dieselTable.row.add([
                    registro.dia_diesel,
                    registro.inventario_inicial_diesel,
                    registro.compras_diesel,
                    registro.ventas_diesel,
                    registro.medida_teorica_diesel,
                    registro.medida_fisica_diesel,
                    registro.variacion_neta_diesel,
                    registro.porcentaje_diesel,
                    registro.descargue_diesel,
                    registro.variacion_descargue_diesel
                ]).draw();
            });

            // Llenar tabla extra
            data.data.extra.forEach(function(registro) {
                extraTable.row.add([
                    registro.dia_extra,
                    registro.inventario_inicial_extra,
                    registro.compras_extra,
                    registro.ventas_extra,
                    registro.medida_teorica_extra,
                    registro.medida_fisica_extra,
                    registro.variacion_neta_extra,
                    registro.porcentaje_extra,
                    registro.descargue_extra,
                    registro.variacion_descargue_extra
                ]).draw();
            });
        });
    }

    // Define la función fillReportTableDetallado fuera del $(document).ready()
    function fillReportTableConsolidado(monthSeleted, yearSelected, consolidadoTable) {
        var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        showLoader()
        fetch('/ventas/report', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken
            },
            body: JSON.stringify({ monthSeleted: monthSeleted, yearSelected: yearSelected }) 
        })
        .then(response => response.json())
        .then(data => {
            hideLoader();
            Swal.fire({
                icon: 'success',
                title: 'Actulizada',
                text: data.message,
                showConfirmButton: false,
                timer: 1500
            });
            // Limpia las tablas antes de agregar nuevos datos
            consolidadoTable.clear().draw();

            for (var i = 0; i < data.data.corriente.length; i++) {
                var registroCorriente = data.data.corriente[i];
                var registroDiesel = data.data.diesel[i];
                var registroExtra = data.data.extra[i];

                consolidadoTable.row.add([
                    registroCorriente.dia_corriente,
                    registroCorriente.compras_corriente,
                    registroCorriente.ventas_corriente,
                    registroCorriente.variacion_neta_corriente,
                    registroExtra.compras_extra,
                    registroExtra.ventas_extra,
                    registroExtra.variacion_neta_extra,
                    registroDiesel.compras_diesel,
                    registroDiesel.ventas_diesel,
                    registroDiesel.variacion_neta_diesel,
                    // Suma de compras
                    (Math.abs(registroCorriente.compras_corriente) + Math.abs(registroExtra.compras_extra) + Math.abs(registroDiesel.compras_diesel)).toFixed(2),
                    // Suma de ventas
                    (Math.abs(registroCorriente.ventas_corriente) + Math.abs(registroExtra.ventas_extra) + Math.abs(registroDiesel.ventas_diesel)).toFixed(2),
                    // Suma de variación neta
                    (Math.abs(registroCorriente.variacion_neta_corriente) + Math.abs(registroExtra.variacion_neta_extra) + Math.abs(registroDiesel.variacion_neta_diesel)).toFixed(2)
                ]).draw();
                
                


            }
         
        });
    }
// Código fuera del $(document).ready())...
document.getElementById("btnGenerar").addEventListener("click", function() {
    var monthSeleted = document.getElementById("mes").value;
    var yearSelected = document.getElementById("ano").value;
    var selectedOption = document.getElementById("tipoReporte").value;

    if (selectedOption == 1) {
        document.getElementById("consolidado").style.display = "block";
        document.getElementById("detallado").style.display = "none";
        fillReportTableConsolidado(monthSeleted, yearSelected,consolidadoTable)
    } else if (selectedOption == 2) {
        document.getElementById("consolidado").style.display = "none";
        document.getElementById("detallado").style.display = "block";
        fillReportTableDetallado(monthSeleted, yearSelected, corrienteTable, dieselTable, extraTable);
    } else {
        // Haz algo más si es necesario
    }
});
function showLoader() {
    // Muestra tu cargador aquí (por ejemplo, un div con una animación CSS)
    document.querySelector(".loader-container2").style.display = "block";
}

function hideLoader() {
    // Oculta tu cargador aquí
    document.querySelector(".loader-container2").style.display = "none";
}
});


