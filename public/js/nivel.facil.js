// Variables globales para almacenar datos del juego
let pistaActual = '', imagenesMostradas = [], palabrasAdivinadas = [], totalPalabras = 0, intentos = 3;
let tiempoRestante = 60;  // Tiempo inicial (en segundos)
let temporizador;  // Variable para almacenar la referencia del setInterval
const verificar = document.getElementById('verificar');
const pista = document.getElementById('pista');
const intentoElemento = document.getElementById('intento');
const inputRespuesta = document.getElementById('respuesta');
const tiempoElemento = document.getElementById('tiempo');  // Elemento para mostrar el tiempo restante

// Función inicial que carga el juego desde el servidor y muestra las primeras imágenes y pista
async function iniciarJuego() {
    const response = await fetch('/juego-adivinanza-v2/app/controllers/nivel.facil.controller.php', { method: 'POST' });
    const data = await response.json();
    
    totalPalabras = data.totalPalabras || 0;  // Asignar el número total de palabras
    pistaActual = data.pista;  // Guardar la pista actual
    mostrarImagenes(data.imagenes);  // Mostrar imágenes iniciales
    actualizarProgreso();  // Actualizar el progreso en la interfaz
    mostrarIntentos();  // Mostrar el número de intentos disponibles
    iniciarTemporizador();  // Iniciar el temporizador
}

// Función que muestra imágenes no adivinadas
function mostrarImagenes(imagenes) {
    const contenedor = document.getElementById('imagenes');
    contenedor.innerHTML = '';  // Limpiar contenedor antes de agregar nuevas imágenes

    // Filtrar imágenes que no han sido adivinadas ni mostradas
    const imagenesFiltradas = imagenes.filter(img => !palabrasAdivinadas.includes(img.palabra) && !imagenesMostradas.includes(img.idimagen));
    
    
    // Mostrar cada imagen filtrada y guardarla como mostrada
    imagenesFiltradas.forEach(img => {
        const imagenElem = document.createElement('img');
        imagenElem.src = img.imagen_url;
        imagenElem.alt = 'Imagen de palabra';
        imagenElem.style.width = '100px';
        contenedor.appendChild(imagenElem);
        imagenesMostradas.push(img.idimagen);  // Añadir ID de imagen mostrada
    });

    // Asignar la palabra correcta a la primera imagen para verificar la respuesta
    window.palabraCorrecta = imagenesFiltradas[0].palabra;
}

// Función que muestra la pista en la interfaz
function mostrarPista() {
    pista.textContent = pistaActual;
}

// Función que actualiza el progreso del jugador
function actualizarProgreso() {
    document.getElementById('progreso').textContent = `Progreso: ${palabrasAdivinadas.length} / ${totalPalabras}`;
}

// Función que muestra los intentos restantes en la interfaz
function mostrarIntentos() {
    intentoElemento.textContent = `Intentos restantes: ${intentos}`;
}

// Función que muestra el tiempo restante en la interfaz
function mostrarTiempo() {
    tiempoElemento.textContent = `Tiempo restante: ${tiempoRestante}s`;
}

// Función que inicia el temporizador
function iniciarTemporizador() {
    temporizador = setInterval(() => {
        if (tiempoRestante > 0) {
            tiempoRestante--;
            mostrarTiempo();  // Actualizar el tiempo mostrado en pantalla
        } else {
            clearInterval(temporizador);  // Detener el temporizador
            showToast('¡El tiempo se ha agotado! Has perdido.', 'ERROR');
            // Desactivar la entrada de respuesta y el botón de verificar
            inputRespuesta.disabled = true;
            verificar.disabled = true;
        }
    }, 1000);  // Resta un segundo cada 1000ms (1 segundo)
}

// Función para verificar si la respuesta del usuario es correcta
async function verificarRespuesta() {
    if (intentos <= 0 || tiempoRestante <= 0) {
        showToast('Ya no tienes intentos disponibles o el tiempo se agotó. El juego ha terminado.', 'ERROR');
        return;
    }

    const respuesta = inputRespuesta.value;
    const formData = new URLSearchParams({ 'respuesta': respuesta, 'palabra': window.palabraCorrecta, 'imagenesMostradas': JSON.stringify(imagenesMostradas) });
    const response = await fetch('/juego-adivinanza-v2/app/controllers/nivel.facil.controller.php', { method: 'POST', body: formData });
    const data = await response.json();

    if (data.correcto) {  // Si la respuesta es correcta
        showToast(data.mensaje, 'SUCCESS');
        palabrasAdivinadas.push(window.palabraCorrecta);  // Marcar palabra como adivinada
        inputRespuesta.value = '';  // Limpiar el campo de respuesta
        mostrarImagenes(data.imagenes);  // Mostrar nuevas imágenes
        pistaActual = data.pista;  // Actualizar la pista
        pista.textContent = '';  // Limpiar pista actual
        actualizarProgreso();  // Actualizar progreso en la interfaz

        // Si todas las palabras han sido adivinadas, mostrar mensaje de finalización
        if (palabrasAdivinadas.length === totalPalabras) {
            showToast('¡Felicidades! Has completado el juego.', 'SUCCESS');
        }
    } else {
        intentos--;  // Restar un intento
        mostrarIntentos();  // Actualizar los intentos restantes
        showToast(`${data.mensaje}`, 'WARNING');

        // Restar 10 segundos por cada respuesta incorrecta
        tiempoRestante -= 10;
        if (tiempoRestante < 0 ||intentos === 0 ) tiempoRestante = 0;  // Evitar que el tiempo quede negativo
        mostrarTiempo();  // Actualizar el tiempo restante

        if (intentos === 0 || tiempoRestante === 0) {
            showToast('Ya no tienes intentos o el tiempo se agotó, has perdido. :V', 'ERROR');
            // Desactivar la entrada de respuesta y el botón de verificar
            inputRespuesta.disabled = true;
            verificar.disabled = true;
        }
    }
}

verificar.addEventListener('click', verificarRespuesta);
pista.addEventListener('click', mostrarPista);

// Iniciar el juego
iniciarJuego();
