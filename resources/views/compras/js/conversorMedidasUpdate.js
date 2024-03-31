
//::::::::::::::::::::::::::CORREINTE::::::::::::::::::::::

function calcularResultadoCorreinte(valorIngresado) {
    return 0.966258748143327 + 
        8.58799961973156 * valorIngresado +
        0.737039401943706 * Math.pow(valorIngresado, 2) +
        -0.0101450671101731 * Math.pow(valorIngresado, 3) +
        0.000125639730016237 * Math.pow(valorIngresado, 4) +
        -0.00000104568300799461 * Math.pow(valorIngresado, 5) +
        0.0000000046082650453 * Math.pow(valorIngresado, 6) +
        -3.58401118E-12 * Math.pow(valorIngresado, 7) +
        -5.909511E-14 * Math.pow(valorIngresado, 8) +
        2.4917E-16 * Math.pow(valorIngresado, 9) +
        -3.2E-19 * Math.pow(valorIngresado, 10);
}

// Seleccionar el input donde el usuario ingresa el valor
const inputGalonesAntesCorrienteUpdate = document.getElementById('galones_antes_descargue_corriente_update');

// Seleccionar el input donde se mostrará el resultado del cálculo
const inputVolumenGalonesAntesCorrienteUpdate = document.getElementById('equivalente_galones_medida_corriente-antes_update');

// Asignar un evento de entrada al input para manejar cambios en el valor ingresado
inputGalonesAntesCorrienteUpdate.addEventListener('input', function(event) {
    // Obtener el valor ingresado por el usuario
    const valorIngresado = parseFloat(event.target.value.replace(/,/g, '')); // Convertir a número y eliminar comas como separador de miles

    // Verificar si el valor ingresado es un número válido
    if (!isNaN(valorIngresado)) {
        // Realizar el cálculo utilizando la función
        const resultadoCalculo = calcularResultadoCorreinte(valorIngresado);

        // Mostrar el resultado en el input correspondiente
        inputVolumenGalonesAntesCorrienteUpdate.value = resultadoCalculo.toFixed(2); // Redondear el resultado a 2 decimales y asignarlo al input
    } else {
        // Si el valor ingresado no es válido, mostrar un mensaje de error o realizar otra acción necesaria
        console.error('El valor ingresado no es válido.');
    }
});

// Seleccionar el input donde el usuario ingresa el valor
const inputGalonesDespuesCorrienteUpdate = document.getElementById('galones_despues_descargue_corriente_update');

// Seleccionar el input donde se mostrará el resultado del cálculo
const inputVolumenGalonesDespuesCorrienteUpdate = document.getElementById('equivalente_galones_medida_corriente-despues_update');

// Asignar un evento de entrada al input para manejar cambios en el valor ingresado
inputGalonesDespuesCorrienteUpdate.addEventListener('input', function(event) {
    // Obtener el valor ingresado por el usuario
    const valorIngresado = parseFloat(event.target.value.replace(/,/g, '')); // Convertir a número y eliminar comas como separador de miles

    // Verificar si el valor ingresado es un número válido
    if (!isNaN(valorIngresado)) {
        // Realizar el cálculo utilizando la función
        const resultadoCalculo = calcularResultadoCorreinte(valorIngresado);

        // Mostrar el resultado en el input correspondiente
        inputVolumenGalonesDespuesCorrienteUpdate.value = resultadoCalculo.toFixed(2); // Redondear el resultado a 2 decimales y asignarlo al input
    } else {
        // Si el valor ingresado no es válido, mostrar un mensaje de error o realizar otra acción necesaria
        console.error('El valor ingresado no es válido.');
    }
});

// Seleccionar el input donde el usuario ingresa el valor
const medida_galones_al_cierre_corriente_update = document.getElementById('medida_galones_al_cierre_corriente_update');

// Seleccionar el input donde se mostrará el resultado del cálculo
const galones_al_cierre_corriente_update = document.getElementById('galones_al_cierre_corriente_update');

// Asignar un evento de entrada al input para manejar cambios en el valor ingresado
medida_galones_al_cierre_corriente_update.addEventListener('input', function(event) {
    // Obtener el valor ingresado por el usuario
    const valorIngresado = parseFloat(event.target.value.replace(/,/g, '')); // Convertir a número y eliminar comas como separador de miles

    // Verificar si el valor ingresado es un número válido
    if (!isNaN(valorIngresado)) {
        // Realizar el cálculo utilizando la función
        const resultadoCalculo = calcularResultadoCorreinte(valorIngresado);

        // Mostrar el resultado en el input correspondiente
        galones_al_cierre_corriente_update.value = resultadoCalculo.toFixed(2); // Redondear el resultado a 2 decimales y asignarlo al input
    } else {
        // Si el valor ingresado no es válido, mostrar un mensaje de error o realizar otra acción necesaria
        console.error('El valor ingresado no es válido.');
    }
});




//::::::::::::::::::::::::::EXTRA::::::::::::::::::::::

function calcularResultadoExtra(valorIngresado) {
    return 0.508081667682875 + 
    3.69443788559244 * valorIngresado +
    0.367849982155866 * Math.pow(valorIngresado, 2) +
    -0.00459213106580676 * Math.pow(valorIngresado, 3) +
    0.0000573501249243053 * Math.pow(valorIngresado, 4) +
    -0.00000051070349019029 * Math.pow(valorIngresado, 5) +
    0.00000000261801129374 * Math.pow(valorIngresado, 6) +
    -5.54575546E-12 * Math.pow(valorIngresado, 7) +
    -1.033746E-14 * Math.pow(valorIngresado, 8) +
    7.585E-17 * Math.pow(valorIngresado, 9) +
    -1.1E-19 * Math.pow(valorIngresado, 10);
}

// Seleccionar el input donde el usuario ingresa el valor
const inputGalonesAntesExtraUpdate = document.getElementById('galones_antes_descargue_extra_update');

// Seleccionar el input donde se mostrará el resultado del cálculo
const inputVolumenGalonesAntesExtraUpdate = document.getElementById('equivalente_galones_medida_extra_antes_update');

// Asignar un evento de entrada al input para manejar cambios en el valor ingresado
inputGalonesAntesExtraUpdate.addEventListener('input', function(event) {
    // Obtener el valor ingresado por el usuario
    const valorIngresado = parseFloat(event.target.value.replace(/,/g, '')); // Convertir a número y eliminar comas como separador de miles

    // Verificar si el valor ingresado es un número válido
    if (!isNaN(valorIngresado)) {
        // Realizar el cálculo utilizando la función
        const resultadoCalculo = calcularResultadoExtra(valorIngresado);

        // Mostrar el resultado en el input correspondiente
        inputVolumenGalonesAntesExtraUpdate.value = resultadoCalculo.toFixed(2); // Redondear el resultado a 2 decimales y asignarlo al input
    } else {
        // Si el valor ingresado no es válido, mostrar un mensaje de error o realizar otra acción necesaria
        console.error('El valor ingresado no es válido.');
    }
});

// Seleccionar el input donde el usuario ingresa el valor
const inputGalonesDespuesExtraUpdate = document.getElementById('galones_despues_descargue_extra_update');

// Seleccionar el input donde se mostrará el resultado del cálculo
const inputVolumenGalonesDespuesExtraUpdate = document.getElementById('equivalente_galones_medida_extra_despues_update');

// Asignar un evento de entrada al input para manejar cambios en el valor ingresado
inputGalonesDespuesExtraUpdate.addEventListener('input', function(event) {
    // Obtener el valor ingresado por el usuario
    const valorIngresado = parseFloat(event.target.value.replace(/,/g, '')); // Convertir a número y eliminar comas como separador de miles

    // Verificar si el valor ingresado es un número válido
    if (!isNaN(valorIngresado)) {
        // Realizar el cálculo utilizando la función
        const resultadoCalculo = calcularResultadoExtra(valorIngresado);

        // Mostrar el resultado en el input correspondiente
        inputVolumenGalonesDespuesExtraUpdate.value = resultadoCalculo.toFixed(2); // Redondear el resultado a 2 decimales y asignarlo al input
    } else {
        // Si el valor ingresado no es válido, mostrar un mensaje de error o realizar otra acción necesaria
        console.error('El valor ingresado no es válido.');
    }
});

// Seleccionar el input donde el usuario ingresa el valor
const medida_galones_al_cierre_extra_update = document.getElementById('medida_galones_al_cierre_extra_update');

// Seleccionar el input donde se mostrará el resultado del cálculo
const galones_al_cierre_extra_update = document.getElementById('galones_al_cierre_extra_update');

// Asignar un evento de entrada al input para manejar cambios en el valor ingresado
medida_galones_al_cierre_extra_update.addEventListener('input', function(event) {
    // Obtener el valor ingresado por el usuario
    const valorIngresado = parseFloat(event.target.value.replace(/,/g, '')); // Convertir a número y eliminar comas como separador de miles

    // Verificar si el valor ingresado es un número válido
    if (!isNaN(valorIngresado)) {
        // Realizar el cálculo utilizando la función
        const resultadoCalculo = calcularResultadoExtra(valorIngresado);

        // Mostrar el resultado en el input correspondiente
        galones_al_cierre_extra_update.value = resultadoCalculo.toFixed(2); // Redondear el resultado a 2 decimales y asignarlo al input
    } else {
        // Si el valor ingresado no es válido, mostrar un mensaje de error o realizar otra acción necesaria
        console.error('El valor ingresado no es válido.');
    }
});


//::::::::::::::::::::::::::DIESEL::::::::::::::::::::::

function calcularResultadoDiesel(valorIngresado) {
    return 0.498940722639064 + 
        4.84717455781572 * valorIngresado +
        0.367305216938171 * Math.pow(valorIngresado, 2) +
        -0.0055887036557496 * Math.pow(valorIngresado, 3) +
        0.0000705189342185936 * Math.pow(valorIngresado, 4) +
        -0.0000005826650616538 * Math.pow(valorIngresado, 5) +
        0.00000000254341092232 * Math.pow(valorIngresado, 6) +
        -1.80835287E-12 * Math.pow(valorIngresado, 7) +
        -3.367351E-14 * Math.pow(valorIngresado, 8) +
        1.405E-16 * Math.pow(valorIngresado, 9) +
        -1.8E-19 * Math.pow(valorIngresado, 10);
}

// Seleccionar el input donde el usuario ingresa el valor
const inputGalonesAntesDieselUpdate = document.getElementById('galones_antes_descargue_diesel_update');

// Seleccionar el input donde se mostrará el resultado del cálculo
const inputVolumenGalonesAntesDieselUpdate = document.getElementById('equivalente_galones_medida_diesel_antes_update');

// Asignar un evento de entrada al input para manejar cambios en el valor ingresado
inputGalonesAntesDieselUpdate.addEventListener('input', function(event) {
    // Obtener el valor ingresado por el usuario
    const valorIngresado = parseFloat(event.target.value.replace(/,/g, '')); // Convertir a número y eliminar comas como separador de miles

    // Verificar si el valor ingresado es un número válido
    if (!isNaN(valorIngresado)) {
        // Realizar el cálculo utilizando la función
        const resultadoCalculo = calcularResultadoDiesel(valorIngresado);

        // Mostrar el resultado en el input correspondiente
        inputVolumenGalonesAntesDieselUpdate.value = resultadoCalculo.toFixed(2); // Redondear el resultado a 2 decimales y asignarlo al input
    } else {
        // Si el valor ingresado no es válido, mostrar un mensaje de error o realizar otra acción necesaria
        console.error('El valor ingresado no es válido.');
    }
});

// Seleccionar el input donde el usuario ingresa el valor
const inputGalonesDespuesDieselUpdate = document.getElementById('galones_despues_descargue_diesel_update');

// Seleccionar el input donde se mostrará el resultado del cálculo
const inputVolumenGalonesDespuesDieselUpdate = document.getElementById('equivalente_galones_medida_diesel_despues_update');

// Asignar un evento de entrada al input para manejar cambios en el valor ingresado
inputGalonesDespuesDieselUpdate.addEventListener('input', function(event) {
    // Obtener el valor ingresado por el usuario
    const valorIngresado = parseFloat(event.target.value.replace(/,/g, '')); // Convertir a número y eliminar comas como separador de miles

    // Verificar si el valor ingresado es un número válido
    if (!isNaN(valorIngresado)) {
        // Realizar el cálculo utilizando la función
        const resultadoCalculo = calcularResultadoDiesel(valorIngresado);

        // Mostrar el resultado en el input correspondiente
        inputVolumenGalonesDespuesDieselUpdate.value = resultadoCalculo.toFixed(2); // Redondear el resultado a 2 decimales y asignarlo al input
    } else {
        // Si el valor ingresado no es válido, mostrar un mensaje de error o realizar otra acción necesaria
        console.error('El valor ingresado no es válido.');
    }
});

// Seleccionar el input donde el usuario ingresa el valor
const medida_galones_al_cierre_diesel_update = document.getElementById('medida_galones_al_cierre_diesel_update');

// Seleccionar el input donde se mostrará el resultado del cálculo
const galones_al_cierre_diesel_update = document.getElementById('galones_al_cierre_diesel_update');

// Asignar un evento de entrada al input para manejar cambios en el valor ingresado
medida_galones_al_cierre_diesel_update.addEventListener('input', function(event) {
    // Obtener el valor ingresado por el usuario
    const valorIngresado = parseFloat(event.target.value.replace(/,/g, '')); // Convertir a número y eliminar comas como separador de miles

    // Verificar si el valor ingresado es un número válido
    if (!isNaN(valorIngresado)) {
        // Realizar el cálculo utilizando la función
        const resultadoCalculo = calcularResultadoDiesel(valorIngresado);

        // Mostrar el resultado en el input correspondiente
        galones_al_cierre_diesel_update.value = resultadoCalculo.toFixed(2); // Redondear el resultado a 2 decimales y asignarlo al input
    } else {
        // Si el valor ingresado no es válido, mostrar un mensaje de error o realizar otra acción necesaria
        console.error('El valor ingresado no es válido.');
    }
});


















