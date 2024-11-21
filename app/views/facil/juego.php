<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juego de Adivinanza</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
    background-color: #f8f9fa;
    font-family: 'Arial', sans-serif;
}

.container {
    max-width: 700px;
    margin-top: 50px;
    padding: 30px;
    background-color: #ffffff;
    border-radius: 10px;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
}

h1 {
    text-align: center;
    color: #007bff;
    font-size: 2.5em;
    margin-bottom: 30px;
}

#imagenes img {
    margin: 10px;
    width: 120px;
    height: 120px;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

#imagenes img:hover {
    transform: scale(1.1);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
}

.btn-custom {
    background-color: #007bff;
    color: white;
    border-radius: 30px;
    font-size: 1.1em;
    width: 48%;
    transition: background-color 0.3s ease;
}

.btn-custom:hover {
    background-color: #0056b3;
}

.input-group {
    margin-bottom: 20px;
}

#progreso, #intento, #tiempo {
    text-align: center;
    font-size: 1.2em;
    font-weight: bold;
    margin-top: 10px;
}

#progreso {
    color: #28a745;
}

#intento {
    color: #dc3545;
}

#tiempo {
    color: #ffc107;
    font-size: 1.2em;
}

#pista {
    font-style: italic;
    color: #6c757d;
    text-align: center;
    margin-top: 20px;
}

    </style>
</head>
<body>

    <div class="container">
        <h1>Juego de Adivinanza</h1>

        <div id="imagenes" class="d-flex justify-content-center flex-wrap mb-4"></div>

        <div id="progreso" class="mb-4"></div>
        <p id="intento"></p>
        <p id="tiempo"></p> 
        
        <div class="input-group mb-4">
            <input type="text" id="respuesta" class="form-control" placeholder="Escribe tu respuesta aquí" aria-label="Respuesta">
        </div>

        <div class="d-flex justify-content-between">
            <button class="btn btn-custom" id="verificar">Verificar</button>
            <button class="btn btn-outline-info" id="pista">Pista</button>
        </div>

        <p id="pista"></p> 
    </div>

    <script src="/juego-adivinanza-v2/public/js/swalcustom.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="/juego-adivinanza-v2/public/js/nivel.facil.js"></script>
</body>
</html>
