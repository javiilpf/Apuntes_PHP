<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplicación para getters</title>

</head>
<body>
    <a href="Aplicacion1.php?pagina=1">Home</a>
    <a href="Aplicacion1.php?pagina=2">Login</a>
    <a href="Aplicacion1.php?pagina=3">Acerca de</a>

    <?php
        if (isset($_GET['pagina']) && $_GET['pagina'] == 1){
            echo "Esta es la página home";
        }elseif (isset($_GET['pagina']) && $_GET['pagina'] == 2){
            echo "Estás en la página 2.";
        } elseif (isset($_GET['pagina']) && $_GET['pagina'] == 3){
            echo "Estás en la página 3.";
        } else {
            echo "Por favor, selecciona una página.";
        }
    ?>
</body>
</html>