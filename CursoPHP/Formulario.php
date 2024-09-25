<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login en PHP</title>
</head>
<body>
    <a href="Formulario.php?pagina=1">Home</a>
    <a href="Formulario.php?pagina=2">Login</a>
    <a href="Formulario.php?pagina=3">Acerca de</a>

    <?php
        if (isset($_GET['pagina']) && $_GET['pagina'] == 1) {
            echo "Esta es la página home";
        } elseif (isset($_GET['pagina']) && $_GET['pagina'] == 2) {
            echo '<form action="Formulario.php" method="POST">
                Usuario:<input type="text" id="usuario" name="usuario" required>
                <br>
                Contraseña:<input type="password" id="contraseña" name="contraseña" required>
                <br>
                <input type="submit" name="enviar">
            </form>';
        } elseif (isset($_GET['pagina']) && $_GET['pagina'] == 3) {
            echo "Estás en la página 3.";
        } else {
            echo "Por favor, selecciona una página.";
        }

        // Verificación de usuario y contraseña
        if (isset($_POST["usuario"]) && $_POST["usuario"] == "admin" && isset($_POST["contraseña"]) && $_GET["contraseña"] == "admin") {
            echo "Usuario y contraseña correctos";
        } elseif (isset($_POST["usuario"]) || isset($_POST["contraseña"])) {
            echo "Usuario o contraseña incorrectos.";
        }
        
        // $users['Pepe']="Pepe";
        // $users['Maria']="Maria";
        // if (isset($_POST['username'])==$_POST['password']){
        //     if (isset ($users[$_POST['username']])&& $users[$_POST['username']]==$_POST['password']){
        //         $info="ok";
        //     }
        // }
    
    ?>


</body>
</html>
