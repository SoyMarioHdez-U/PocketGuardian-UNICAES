<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido - PocketGuardian</title>
    <link rel="stylesheet" href="http://localhost/PocketGuardian-UNICAES/HTML-CSS-JS/css/login-provisional.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inria+Sans:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">
</head>
<body>
    <main>
        <div class="contenedor__todo">
            <div class="caja__trasera">
                <h1>FORMULARIO SÓLO PARA PRUEBAS, NO ES EL DEFINITIVO</h1>
                <div class="caja__trasera-login">
                    <h3>¿Ya tienes una cuenta?</h3>
                    <p>Inicia sesión para entrar</p>
                    <button class="botones" id="btn_iniciar-sesion">Iniciar sesión</button>
                </div>

                <div class="caja__trasera-register">
                    <h3>¿Aún no tienes una cuenta?</h3>
                    <p>Regístrate para que puedas iniciar sesión</p>
                    <button class="botones" id="btn__registrarse">Registrarse</button>
                </div>

            </div>

            <!--Formulario de login y registro-->
            <div class="contenedor__login-register">
                <form  action="http://localhost/PocketGuardian-UNICAES/HTML-CSS-JS/php/login_usuario_be.php" method="POST" class="formulario__login">
                    <h2>Iniciar Sesión</h2>
                    <input class="datos" type="text" placeholder="Correo Electrónico" name="correo_electronico">
                    <input class="datos" type="password" placeholder="Contraseña" name="password">
                    <button class="botones">Entrar</button>

                </form>

                <form action="http://localhost/PocketGuardian-UNICAES/HTML-CSS-JS/php/registro_usuario_be.php" method="POST" class="formulario__register">
                    <h2>Registrarse</h2>
                    <input class="datos" type="text" placeholder="Nombre"  name="nombre">
                    <input class="datos" type="text" placeholder="Apellido"  name="apellido">
                    <input class="datos" type="text" placeholder="Correo Electrónico"  name="correo_electronico">
                    <input class="datos" type="password" placeholder="Contraseña" name="password">
                    <button class="botones">Registrarse</button>

                </form>
            </div>
            
        </div>
    </main>
    <script src="/HTML-CSS-JS/js/login.js"></script>
</body>

</html>