<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login - Juego</title>
    <link rel="stylesheet" href="index.css">
    
</head>
<body>
    <section class="container">
        <div class="login-container">
            <div class="circle circle-one"></div>
            <div class="form-container">
            <img src="https://raw.githubusercontent.com/hicodersofficial/glassmorphism-login-form/master/assets/illustration.png" alt="illustration" class="illustration" />
                <h1 class="opacity">LOGIN</h1>
                <form method="POST" id="formulario-login" autocomplete="off">
                    <input type="text" id="nomuser" name="nomuser" placeholder="Usuario" required />
                    <input type="password" id="passuser" name="passuser" placeholder="Contraseña" required />
                    <button type="submit" name="operation" value="login" class="opacity">Iniciar sesión</button>
                </form>
                <div class="register-forget opacity ">
                    <a href="#">REGISTRO</a>
                   
                </div>
            </div>
            <div class="circle circle-two"></div>
        </div>
        <div class="theme-btn-container"></div>
    </section>

    <script src="/juego-adivinanza-v2/public/js/swalcustom.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="index.js"></script>
    <script src="public/js/login.js"></script>
</body>
</html>
