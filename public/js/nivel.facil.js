// Variables globales para almacenar datos del juego
let pistaActual = '', imagenesMostradas = [], palabrasAdivinadas = [], totalPalabras = 0;

// Función inicial que carga el juego desde el servidor y muestra las primeras imágenes y pista
async function iniciarJuego() {
    const response = await fetch('/juego-v2/app/controllers/nivel.facil.controller.php', { method: 'POST' });
    const data = await response.json();
    
    totalPalabras = data.totalPalabras || 0;  // Asignar el número total de palabras
    pistaActual = data.pista;  // Guardar la pista actual
    mostrarImagenes(data.imagenes);  // Mostrar imágenes iniciales
    actualizarProgreso();  // Actualizar el progreso en la interfaz
}

// Función que muestra imágenes no adivinadas
function mostrarImagenes(imagenes) {
    const contenedor = document.getElementById('imagenes');
    contenedor.innerHTML = '';  // Limpiar contenedor antes de agregar nuevas imágenes

    // Filtrar imágenes no adivinadas
    const imagenesFiltradas = imagenes.filter(img => !palabrasAdivinadas.includes(img.palabra));
    
    if (imagenesFiltradas.length === 0) {  // Mostrar mensaje si no hay más imágenes o se terminó el juego
        showToast(palabrasAdivinadas.length === totalPalabras ? '¡Felicidades! Has completado el juego.' : 'No hay más imágenes disponibles.', palabrasAdivinadas.length === totalPalabras ? 'SUCCESS' : 'INFO');
        return;
    }

    // Mostrar cada imagen filtrada y guardarla como mostrada
    imagenesFiltradas.forEach(img => {
        const imagenElem = document.createElement('img');
        imagenElem.src = img.imagen_url;
        imagenElem.alt = 'Imagen de palabra';
        imagenElem.style.width = '100px';
        contenedor.appendChild(imagenElem);
        imagenesMostradas.push(img.idimagen);
    });

    // Asignar la palabra correcta a la primera imagen para verificar la respuesta
    window.palabraCorrecta = imagenesFiltradas[0].palabra;
}

// Función que muestra la pista en la interfaz
function mostrarPista() {
    document.getElementById('pista').textContent = pistaActual;
}

// Función que actualiza el progreso del jugador
function actualizarProgreso() {
    document.getElementById('progreso').textContent = `Progreso: ${palabrasAdivinadas.length} / ${totalPalabras}`;
}

// Función para verificar si la respuesta del usuario es correcta
async function verificarRespuesta() {
    const respuesta = document.getElementById('respuesta').value;
    const formData = new URLSearchParams({ 'respuesta': respuesta, 'palabra': window.palabraCorrecta, 'imagenesMostradas': JSON.stringify(imagenesMostradas) });
    const response = await fetch('/juego-v2/app/controllers/nivel.facil.controller.php', { method: 'POST', body: formData });
    const data = await response.json();

    if (data.correcto) {  // Si la respuesta es correcta
        showToast(data.mensaje, 'SUCCESS');
        palabrasAdivinadas.push(window.palabraCorrecta);  // Marcar palabra como adivinada
        document.getElementById('respuesta').value = '';  // Limpiar el campo de respuesta
        mostrarImagenes(data.imagenes);  // Mostrar nuevas imágenes
        pistaActual = data.pista;  // Actualizar la pista
        document.getElementById('pista').textContent = '';  // Limpiar pista actual
        actualizarProgreso();  // Actualizar progreso en la interfaz

        // Si todas las palabras han sido adivinadas, mostrar mensaje de finalización
        if (palabrasAdivinadas.length === totalPalabras - 1) {
            showToast('¡Felicidades! Has completado el juego.', 'SUCCESS');
        }
    } else {
        showToast(data.mensaje, 'WARNING');  // Mensaje si la respuesta es incorrecta
    }
}

// Asignar evento para mostrar pista al hacer clic
function handlePistaClick() {
    mostrarPista();
}

// Iniciar el juego al cargar el script
iniciarJuego();
