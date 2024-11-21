<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seleccionar Nivel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background: linear-gradient(135deg, #00b4d8, #ffafcc);
            font-family: 'Arial', sans-serif;
            overflow-x: hidden;
        }

        h1 {
            color: #ffffff;
            text-align: center;
            margin-top: 50px;
            font-size: 3rem;
            font-weight: bold;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 80vh;
            flex-direction: column;
            position: relative;
        }

        .list-group {
            max-width: 500px;
            margin-top: 20px;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.1);
            animation: fadeIn 1.5s ease-in-out;
            text-align: center;
            position: relative;
            z-index: 2;
        }

        .list-group-item {
            font-size: 1.5rem;
            font-weight: bold;
            border-radius: 10px;
            margin-bottom: 30px;
            padding: 20px;
            transition: all 0.3s ease;
            background-color: #6f42c1;
            color: white;
        }

        .list-group-item:hover {
            transform: scale(1.1);
        }

        .list-group-item:active {
            transform: scale(0.98);
        }

        .image-left, .image-right {
            position: absolute;
            top: 20%;
            width: 200px;
            height: 200px;
            border-radius: 50%;
            opacity: 0.6;
            animation: floatImage 5s infinite;
            z-index: 1;
        }

        .image-left {
            left: -10%;
            animation-delay: 0s;
        }

        .image-right {
            right: -10%;
            animation-delay: 2.5s;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes floatImage {
            0% {
                transform: translateY(0);
                opacity: 0.3;
            }
            50% {
                transform: translateY(10px);
                opacity: 1;
            }
            100% {
                transform: translateY(0);
                opacity: 0.3;
            }
        }

    </style>
</head>

<body>

<h1 class="text-center">Empieza a jugar 😂</h1>

    <div class="container">
        <div class="list-group">
            <a href="../facil/juego.php" class="list-group-item list-group-item-action">
                Jugar
            </a>
        </div>

        <img src="https://exitocol.vtexassets.com/arquivos/ids/2471225/Hedbanz-Juego-De-Mesa-Ninos-596978_c.jpg?v=637298919814500000" class="image-left" alt="Imagen izquierda">
        <img src="https://th.bing.com/th/id/R.06c76d8101c37f4ff87804094c74728a?rik=sAZJrky5gxuepw&pid=ImgRaw&r=0" class="image-right" alt="Imagen derecha">
    </div>

</body>

</html>
