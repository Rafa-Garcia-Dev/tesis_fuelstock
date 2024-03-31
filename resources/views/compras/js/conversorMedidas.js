
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
const inputGalonesAntesCorriente = document.getElementById('galones_antes_descargue_corriente');

// Seleccionar el input donde se mostrará el resultado del cálculo
const inputVolumenGalonesAntesCorriente = document.getElementById('equivalente_galones_medida_corriente-antes');

// Asignar un evento de entrada al input para manejar cambios en el valor ingresado
inputGalonesAntesCorriente.addEventListener('input', function(event) {
    // Obtener el valor ingresado por el usuario
    const valorIngresado = parseFloat(event.target.value.replace(/,/g, '')); // Convertir a número y eliminar comas como separador de miles

    // Verificar si el valor ingresado es un número válido
    if (!isNaN(valorIngresado)) {
        // Realizar el cálculo utilizando la función
        const resultadoCalculo = calcularResultadoCorreinte(valorIngresado);

        // Mostrar el resultado en el input correspondiente
        inputVolumenGalonesAntesCorriente.value = resultadoCalculo.toFixed(2); // Redondear el resultado a 2 decimales y asignarlo al input
    } else {
        // Si el valor ingresado no es válido, mostrar un mensaje de error o realizar otra acción necesaria
        console.error('El valor ingresado no es válido.');
    }
});

// Seleccionar el input donde el usuario ingresa el valor
const inputGalonesDespuesCorriente = document.getElementById('galones_despues_descargue_corriente');

// Seleccionar el input donde se mostrará el resultado del cálculo
const inputVolumenGalonesDespuesCorriente = document.getElementById('equivalente_galones_medida_corriente-despues');

// Asignar un evento de entrada al input para manejar cambios en el valor ingresado
inputGalonesDespuesCorriente.addEventListener('input', function(event) {
    // Obtener el valor ingresado por el usuario
    const valorIngresado = parseFloat(event.target.value.replace(/,/g, '')); // Convertir a número y eliminar comas como separador de miles

    // Verificar si el valor ingresado es un número válido
    if (!isNaN(valorIngresado)) {
        // Realizar el cálculo utilizando la función
        const resultadoCalculo = calcularResultadoCorreinte(valorIngresado);

        // Mostrar el resultado en el input correspondiente
        inputVolumenGalonesDespuesCorriente.value = resultadoCalculo.toFixed(2); // Redondear el resultado a 2 decimales y asignarlo al input
    } else {
        // Si el valor ingresado no es válido, mostrar un mensaje de error o realizar otra acción necesaria
        console.error('El valor ingresado no es válido.');
    }
});





// Seleccionar el input donde el usuario ingresa el valor
const inputGalonesAntesCorriente2 = document.getElementById('galones_antes_descargue_corriente2');

// Seleccionar el input donde se mostrará el resultado del cálculo
const inputVolumenGalonesAntesCorriente2 = document.getElementById('equivalente_galones_medida_corriente-antes2');

// Asignar un evento de entrada al input para manejar cambios en el valor ingresado
inputGalonesAntesCorriente2.addEventListener('input', function(event) {
    // Obtener el valor ingresado por el usuario
    const valorIngresado = parseFloat(event.target.value.replace(/,/g, '')); // Convertir a número y eliminar comas como separador de miles

    // Verificar si el valor ingresado es un número válido
    if (!isNaN(valorIngresado)) {
        // Realizar el cálculo utilizando la función
        const resultadoCalculo = calcularResultadoCorreinte(valorIngresado);

        // Mostrar el resultado en el input correspondiente
        inputVolumenGalonesAntesCorriente2.value = resultadoCalculo.toFixed(2); // Redondear el resultado a 2 decimales y asignarlo al input
    } else {
        // Si el valor ingresado no es válido, mostrar un mensaje de error o realizar otra acción necesaria
        console.error('El valor ingresado no es válido.');
    }
});

// Seleccionar el input donde el usuario ingresa el valor
const inputGalonesDespuesCorriente2 = document.getElementById('galones_despues_descargue_corriente2');

// Seleccionar el input donde se mostrará el resultado del cálculo
const inputVolumenGalonesDespuesCorriente2 = document.getElementById('equivalente_galones_medida_corriente-despues2');

// Asignar un evento de entrada al input para manejar cambios en el valor ingresado
inputGalonesDespuesCorriente2.addEventListener('input', function(event) {
    // Obtener el valor ingresado por el usuario
    const valorIngresado = parseFloat(event.target.value.replace(/,/g, '')); // Convertir a número y eliminar comas como separador de miles

    // Verificar si el valor ingresado es un número válido
    if (!isNaN(valorIngresado)) {
        // Realizar el cálculo utilizando la función
        const resultadoCalculo = calcularResultadoCorreinte(valorIngresado);

        // Mostrar el resultado en el input correspondiente
        inputVolumenGalonesDespuesCorriente2.value = resultadoCalculo.toFixed(2); // Redondear el resultado a 2 decimales y asignarlo al input
    } else {
        // Si el valor ingresado no es válido, mostrar un mensaje de error o realizar otra acción necesaria
        console.error('El valor ingresado no es válido.');
    }
});




// Seleccionar el input donde el usuario ingresa el valor
const medida_galones_al_cierre_corriente = document.getElementById('medida_galones_al_cierre_corriente');

// Seleccionar el input donde se mostrará el resultado del cálculo
const galones_al_cierre_corriente = document.getElementById('galones_al_cierre_corriente');

// Asignar un evento de entrada al input para manejar cambios en el valor ingresado
medida_galones_al_cierre_corriente.addEventListener('input', function(event) {
    // Obtener el valor ingresado por el usuario
    const valorIngresado = parseFloat(event.target.value.replace(/,/g, '')); // Convertir a número y eliminar comas como separador de miles

    // Verificar si el valor ingresado es un número válido
    if (!isNaN(valorIngresado)) {
        // Realizar el cálculo utilizando la función
        const resultadoCalculo = calcularResultadoCorreinte(valorIngresado);

        // Mostrar el resultado en el input correspondiente
        galones_al_cierre_corriente.value = resultadoCalculo.toFixed(2); // Redondear el resultado a 2 decimales y asignarlo al input
    } else {
        // Si el valor ingresado no es válido, mostrar un mensaje de error o realizar otra acción necesaria
        console.error('El valor ingresado no es válido.');
    }
});

// Seleccionar el input donde el usuario ingresa el valor
const medida_galones_al_cierre_corriente2 = document.getElementById('medida_galones_al_cierre_corriente2');

// Seleccionar el input donde se mostrará el resultado del cálculo
const galones_al_cierre_corriente2 = document.getElementById('galones_al_cierre_corriente2');

// Asignar un evento de entrada al input para manejar cambios en el valor ingresado
medida_galones_al_cierre_corriente2.addEventListener('input', function(event) {
    // Obtener el valor ingresado por el usuario
    const valorIngresado = parseFloat(event.target.value.replace(/,/g, '')); // Convertir a número y eliminar comas como separador de miles

    // Verificar si el valor ingresado es un número válido
    if (!isNaN(valorIngresado)) {
        // Realizar el cálculo utilizando la función
        const resultadoCalculo = calcularResultadoCorreinte(valorIngresado);

        // Mostrar el resultado en el input correspondiente
        galones_al_cierre_corriente2.value = resultadoCalculo.toFixed(2); // Redondear el resultado a 2 decimales y asignarlo al input
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
const inputGalonesAntesExtra = document.getElementById('galones_antes_descargue_extra');

// Seleccionar el input donde se mostrará el resultado del cálculo
const inputVolumenGalonesAntesExtra = document.getElementById('equivalente_galones_medida_extra_antes');

// Asignar un evento de entrada al input para manejar cambios en el valor ingresado
inputGalonesAntesExtra.addEventListener('input', function(event) {
    // Obtener el valor ingresado por el usuario
    const valorIngresado = parseFloat(event.target.value.replace(/,/g, '')); // Convertir a número y eliminar comas como separador de miles

    // Verificar si el valor ingresado es un número válido
    if (!isNaN(valorIngresado)) {
        // Realizar el cálculo utilizando la función
        const resultadoCalculo = calcularResultadoExtra(valorIngresado);

        // Mostrar el resultado en el input correspondiente
        inputVolumenGalonesAntesExtra.value = resultadoCalculo.toFixed(2); // Redondear el resultado a 2 decimales y asignarlo al input
    } else {
        // Si el valor ingresado no es válido, mostrar un mensaje de error o realizar otra acción necesaria
        console.error('El valor ingresado no es válido.');
    }
});

// Seleccionar el input donde el usuario ingresa el valor
const inputGalonesDespuesExtra = document.getElementById('galones_despues_descargue_extra');

// Seleccionar el input donde se mostrará el resultado del cálculo
const inputVolumenGalonesDespuesExtra = document.getElementById('equivalente_galones_medida_extra_despues');

// Asignar un evento de entrada al input para manejar cambios en el valor ingresado
inputGalonesDespuesExtra.addEventListener('input', function(event) {
    // Obtener el valor ingresado por el usuario
    const valorIngresado = parseFloat(event.target.value.replace(/,/g, '')); // Convertir a número y eliminar comas como separador de miles

    // Verificar si el valor ingresado es un número válido
    if (!isNaN(valorIngresado)) {
        // Realizar el cálculo utilizando la función
        const resultadoCalculo = calcularResultadoExtra(valorIngresado);

        // Mostrar el resultado en el input correspondiente
        inputVolumenGalonesDespuesExtra.value = resultadoCalculo.toFixed(2); // Redondear el resultado a 2 decimales y asignarlo al input
    } else {
        // Si el valor ingresado no es válido, mostrar un mensaje de error o realizar otra acción necesaria
        console.error('El valor ingresado no es válido.');
    }
});

// Seleccionar el input donde el usuario ingresa el valor
const medida_galones_al_cierre_extra = document.getElementById('medida_galones_al_cierre_extra');

// Seleccionar el input donde se mostrará el resultado del cálculo
const galones_al_cierre_extra = document.getElementById('galones_al_cierre_extra');

// Asignar un evento de entrada al input para manejar cambios en el valor ingresado
medida_galones_al_cierre_extra.addEventListener('input', function(event) {
    // Obtener el valor ingresado por el usuario
    const valorIngresado = parseFloat(event.target.value.replace(/,/g, '')); // Convertir a número y eliminar comas como separador de miles

    // Verificar si el valor ingresado es un número válido
    if (!isNaN(valorIngresado)) {
        // Realizar el cálculo utilizando la función
        const resultadoCalculo = calcularResultadoExtra(valorIngresado);

        // Mostrar el resultado en el input correspondiente
        galones_al_cierre_extra.value = resultadoCalculo.toFixed(2); // Redondear el resultado a 2 decimales y asignarlo al input
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
const inputGalonesAntesDiesel = document.getElementById('galones_antes_descargue_diesel');

// Seleccionar el input donde se mostrará el resultado del cálculo
const inputVolumenGalonesAntesDiesel = document.getElementById('equivalente_galones_medida_diesel_antes');

// Asignar un evento de entrada al input para manejar cambios en el valor ingresado
inputGalonesAntesDiesel.addEventListener('input', function(event) {
    // Obtener el valor ingresado por el usuario
    const valorIngresado = parseFloat(event.target.value.replace(/,/g, '')); // Convertir a número y eliminar comas como separador de miles

    // Verificar si el valor ingresado es un número válido
    if (!isNaN(valorIngresado)) {
        // Realizar el cálculo utilizando la función
        const resultadoCalculo = calcularResultadoDiesel(valorIngresado);

        // Mostrar el resultado en el input correspondiente
        inputVolumenGalonesAntesDiesel.value = resultadoCalculo.toFixed(2); // Redondear el resultado a 2 decimales y asignarlo al input
    } else {
        // Si el valor ingresado no es válido, mostrar un mensaje de error o realizar otra acción necesaria
        console.error('El valor ingresado no es válido.');
    }
});

// Seleccionar el input donde el usuario ingresa el valor
const inputGalonesDespuesDiesel = document.getElementById('galones_despues_descargue_diesel');

// Seleccionar el input donde se mostrará el resultado del cálculo
const inputVolumenGalonesDespuesDiesel = document.getElementById('equivalente_galones_medida_diesel_despues');

// Asignar un evento de entrada al input para manejar cambios en el valor ingresado
inputGalonesDespuesDiesel.addEventListener('input', function(event) {
    // Obtener el valor ingresado por el usuario
    const valorIngresado = parseFloat(event.target.value.replace(/,/g, '')); // Convertir a número y eliminar comas como separador de miles

    // Verificar si el valor ingresado es un número válido
    if (!isNaN(valorIngresado)) {
        // Realizar el cálculo utilizando la función
        const resultadoCalculo = calcularResultadoDiesel(valorIngresado);

        // Mostrar el resultado en el input correspondiente
        inputVolumenGalonesDespuesDiesel.value = resultadoCalculo.toFixed(2); // Redondear el resultado a 2 decimales y asignarlo al input
    } else {
        // Si el valor ingresado no es válido, mostrar un mensaje de error o realizar otra acción necesaria
        console.error('El valor ingresado no es válido.');
    }
});
// Seleccionar el input donde el usuario ingresa el valor
const medida_galones_al_cierre_diesel = document.getElementById('medida_galones_al_cierre_diesel');

// Seleccionar el input donde se mostrará el resultado del cálculo
const galones_al_cierre_diesel = document.getElementById('galones_al_cierre_diesel');

// Asignar un evento de entrada al input para manejar cambios en el valor ingresado
medida_galones_al_cierre_diesel.addEventListener('input', function(event) {
    // Obtener el valor ingresado por el usuario
    const valorIngresado = parseFloat(event.target.value.replace(/,/g, '')); // Convertir a número y eliminar comas como separador de miles

    // Verificar si el valor ingresado es un número válido
    if (!isNaN(valorIngresado)) {
        // Realizar el cálculo utilizando la función
        const resultadoCalculo = calcularResultadoDiesel(valorIngresado);

        // Mostrar el resultado en el input correspondiente
        galones_al_cierre_diesel.value = resultadoCalculo.toFixed(2); // Redondear el resultado a 2 decimales y asignarlo al input
    } else {
        // Si el valor ingresado no es válido, mostrar un mensaje de error o realizar otra acción necesaria
        console.error('El valor ingresado no es válido.');
    }
});


















