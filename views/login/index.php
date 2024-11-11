<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Katari | Welcome</title>
    <!-- Estilos foundation -->
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/foundation/css/foundation.css">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/foundation/css/foundation-float.css">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/foundation/css/foundation-prototype.css">
    <!-- If you are using the gem version, you need this only -->
    <!-- Motion UI -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/motion-ui@1.2.3/dist/motion-ui.min.css" />
    <!-- Motion UI end -->
    <!-- Pre-conexion fonts y fuentes -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@200;400&display=swap" rel="stylesheet">
    <!-- Pre-conexion fonts y fuentes -->
    <!-- iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- iconos -->
    <!-- jquery -->
    <script src="<?php echo constant('URL'); ?>public/foundation/js/jquery.js"></script>
    <!-- plugins  -->
    <script src="<?php echo constant('URL'); ?>public/js/plugins/validador/validation.js"></script>
    <!-- style -->
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/login.css">
</head>

<body>
    <div class="grid-container full login-container">
        <div class="grid-x login">
            <form method="POST" action="<?php echo constant('URL') ?>login/user" class="form-login">
                <h1>Iniciar Sesión</h1>
                <div class="cell">
                    <label for="username">Usuario</label>
                    <input type="text" name="username" id="username">
                </div>
                <div class="cell">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password">
                </div>
                <div class="cell">
                    <button class="btn-login">Ingresar</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>

<?php require('views/footer.php'); ?>