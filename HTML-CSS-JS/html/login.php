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
    <main class="form-login logueo hide">
        
            <div class="information">
               
               
                <div class="info-text">
                    <h4>¿Aún no tienes una cuenta?</h4>
                    <p>Regístrate para que puedas iniciar sesión</p>
                    <input type="button" class="boton" id="sign-up" value="Registrarse">
                </div>
            </div>


            </div>

            <!--Formulario de login y registro-->
            <div class="form-container">
                <form  action="http://localhost/PocketGuardian-UNICAES/HTML-CSS-JS/php/login_usuario_be.php" method="POST" class="formulario-login">
                    <h1>PocketGuardian</h1>
                    <h2>Iniciar Sesión</h2>
                    <input class="datos" type="text" placeholder="Correo Electrónico" name="correo_electronico">
                    <input class="datos" type="password" placeholder="Contraseña" name="password">
                    <button class="botones">Entrar</button>

                    <div class="socialNetworks">
                <a href="http://www.facebook.com"><img src="http://localhost/PocketGuardian-UNICAES/HTML-CSS-JS/img/facebook.png"></a>
                <a href="http://www.twitter.com"><img src="http://localhost/PocketGuardian-UNICAES/HTML-CSS-JS/img/twitter.png"></a>
                <a href="http://www.instagram.com"><img src="http://localhost/PocketGuardian-UNICAES/HTML-CSS-JS/img/instagram.png"></a>
            </div>
                <p class="copy">© 2023 PocketGuardian</p>
                <p class="lastFooter">Tecnologías Web - Universidad Católica de El Salvador</p>
            </div>

                    </div>
              

                </form>

            </div>
            
        
    </main>
    <main class="form-login register ">
        <div class="information">
               
                <div class="info-text">
                    <h4>¿Ya tienes una cuenta?</h4>
                    <p>Inicia sesión para entrar</p>
                    <input type="button" class="boton" id="sign-in" value="Iniciar Sesion">
                </div>

        </div>

        <!--Formulario de login y registro-->
        <div class="form-container">
               
            <form action="http://localhost/PocketGuardian-UNICAES/HTML-CSS-JS/php/registro_usuario_be.php" method="POST" class="formulario-login">
                <h1>PocketGuardian</h1>
                <h2>Registrarse</h2>
                <input class="datos" type="text" placeholder="Nombre"  name="nombre">
                <input class="datos" type="text" placeholder="Apellido"  name="apellido">
                <input class="datos" type="text" placeholder="Correo Electrónico"  name="correo_electronico">
                <input class="datos" type="password" placeholder="Contraseña" name="password">
                <button class="botones">Registrarse</button>

                    <div class="socialNetworks">
                        <a href="http://www.facebook.com"><img src="http://localhost/PocketGuardian-UNICAES/HTML-CSS-JS/img/facebook.png"></a>
                        <a href="http://www.twitter.com"><img src="http://localhost/PocketGuardian-UNICAES/HTML-CSS-JS/img/twitter.png"></a>
                        <a href="http://www.instagram.com"><img src="http://localhost/PocketGuardian-UNICAES/HTML-CSS-JS/img/instagram.png"></a>
                    </div>
                        <p class="copy">© 2023 PocketGuardian</p>
                        <p class="lastFooter">Tecnologías Web - Universidad Católica de El Salvador</p>
                    </div>

                
             

            </form>
        </div>



    </main>
    
    <script src="http://localhost/PocketGuardian-UNICAES/HTML-CSS-JS/js/login.js"></script>
</body>

</html>