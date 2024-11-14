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
            max-width: 600px;
            margin-top: 50px;
            padding: 30px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #007bff;
        }
        #imagenes img {
            margin: 10px;
            width: 100px;
            height: 100px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }
        #imagenes img:hover {
            transform: scale(1.1);
        }
        .btn-custom {
            background-color: #007bff;
            color: white;
            border-radius: 30px;
            width: 100%;
            font-size: 1.1em;
        }
        .btn-custom:hover {
            background-color: #0056b3;
        }
        .input-group {
            margin-bottom: 20px;
        }
        #progreso {
            text-align: center;
            font-size: 1.2em;
            font-weight: bold;
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

        
        <div class="input-group mb-4">
            <input type="text" id="respuesta" class="form-control" placeholder="Escribe tu respuesta aquí" aria-label="Respuesta">
        </div>

        <div class="d-flex justify-content-between">
            <button class="btn btn-custom" onclick="verificarRespuesta()">Verificar</button>
            <button class="btn btn-outline-info" onclick="mostrarPista()">Pista</button>
        </div>

        <p id="pista"></p> 
    </div>


    <script src="/juego-v2/public/js/swalcustom.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="/juego-v2/public/js/nivel.facil.js"></script>
</body>
</html>
