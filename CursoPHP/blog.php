<?php
//Comienzo de la sesión
session_start();

// Conexión con la base de datos
$db=new mysqli('localhost', 'root', '', 'blog');

$articulos=devolverArtículos($db);
foreach ($articulos as $articulo){
    echo "<img src='./img/".$articulo['imagen'] . "' width=50px'>" .$articulo['fecha']. " ".$articulo['id_user']."<br></br> ".$articulo['texto']."<br>";
}

// Programación del login de la página en php que se conecta con el formulario.
if (isset($_POST['login'])) {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $q = "SELECT * FROM login WHERE user='" . $_POST['username'] . "'";
        $result = $db->query($q);
        if ($row = $result->fetch_assoc()) {
            if ($row['password'] == $_POST['password']) {
                $_SESSION['login'] = true;
                $_SESSION['username'] = $row['user'];
                $info = "Sesión iniciada correctamente";
            } else $info = "contraseña erronea";
        } else $info = "usuario no existe";
    }
}

//Para indicar que la sesión se ha iniciado correctamente.
if (isset($info)) echo "<script>
        alert('" . $info . "')
    </script>";

// Hacer que por defecto la página se encuentre sin iniciar sesión
if (!isset($_SESSION['login'])) {
    $_SESSION['login'] = false;
    $_SESSION['username'] = 'invitado';
    
}

// Creación del logout para poder cerrar sesión
if (isset($_GET['logout'])) {
    $_SESSION['login'] = false;
    $_SESSION['username'] = "invitado";
    
}
// En caso de que inicie sesión, muestro mensaje de bienvenida con mi usuario y tengo la posibilidad de añadir nuevas entradas.
if ($_SESSION['login']){
    
    if ($_SESSION['login']) {
        echo "<form method='post' action='blog.php' enctype='multipart/form-data'>
        <input type='text' name='texto' placeHolder='Texto de la entrada'>
        <input type='date' name='fecha'>
        <input type='file' name='imagen' placeHolder='Selecciona una imagen'>
        <input type='submit' name='añadir' value='añadir'>
        <br>"."Bienvenido! ". $_SESSION['username']. " <a href='blog.php?logout=1'>Cerrar sesión</a>";
    
        if (isset($_POST['añadir']) && isset($_POST['texto']) && isset($_POST['fecha']) && isset($_FILES['imagen'])) {
            $texto = $_POST['texto'];
            $fecha = $_POST['fecha'];
            $imagen = $_FILES['imagen']['name'];
            $q2 = "INSERT INTO `articulo` (`id`, `texto`, `fecha`, `id_user`, `imagen`) VALUES (NULL, '$texto', '$fecha', 'javiilpf', '$imagen')";
            $db->query($q2);
        }
    }
    

}

// Creación de una función que permite devolver los artículos ya creados, se le pasa como parámetro 
// la conexión con la base de datos
function devolverArtículos($db){
    $q = "SELECT * FROM articulo";
    $result = $db -> query($q);
    $articulo = array();
    while ($row = $result -> fetch_assoc() ){
        $articulo[] = $row;
    }
    return $articulo;
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
</head>
<body>
    <!-- Creación de formulario para iniciar sesión en html -->
    <form method="post" action="blog.php">
        <input type="text" name="username" placeholder="nombre de usuario">
        <input type="password" name="password" placeholder="contraseña">
        <input type="submit" name="login" value="Iniciar sesión" />
    </form>
</body>
</html>