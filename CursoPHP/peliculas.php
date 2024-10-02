<?php

session_start();
$db = new mysqli('localhost', 'root', '', 'login');

function showMovies($db)
{
    $q = "SELECT * FROM películas";
    $result = $db->query($q);
    $películas = array();
    while ($row = $result->fetch_assoc()) {
        $películas[] = $row;
    }
    return $películas;
}

if (!isset($_SESSION['login'])) {
    $_SESSION['login'] = false;
    $_SESSION['username'] = 'invitado';
}


if (isset($_GET['logout'])) {
    $_SESSION['login'] = false;
    $_SESSION['username'] = "invitado";
}

if (isset($_POST['login'])) {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $q = "SELECT * FROM users WHERE user='" . $_POST['username'] . "'";
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

if (isset($_GET['del'])) {
    $q = "DELETE FROM películas WHERE id=" . $_GET['del'];
    $db->query($q);
    $info = "Pelicula borrada correctamente";
}

if (isset($_POST['addMovie'])) {
    if (isset($_POST['Titulo']) && isset($_POST['año'])) {

        if ($_FILES['póster']['name'] != "") {
            $img = $_FILES['póster']['name'];

            move_uploaded_file($_FILES['póster']['tmp_name'], 'img/' . $img);
        } else $img = "defecto.jpg";

        $q = "INSERT INTO películas VALUES (NULL, '" . $_POST['Titulo'] . "', " . $_POST['año'] . ", '" . $img . "',0)";
        if ($db->query($q)) {
            $info = "Pelicula " . $_POST['Titulo'] . " añadida";
        }
    }
}

if (isset($_GET['like'])) {
    $q = "UPDATE películas SET likes = likes+1 WHERE id= " . $_GET['like'];
    $db->query($q);
    header('location: peliculas.php');
}
?>

<html>

<body>
    <h1>peliculas</h1><br>
    <?php
    if ($_SESSION['login']) {
        echo "hola " . $_SESSION['username'] . " <a href='peliculas.php?logout=1'>Salir</a><br><br>";

        $movies = showMovies($db);

        foreach ($movies as $movie) {
            echo "<img src='img/" . $movie['poster'] . "' width='50px'>" . $movie['Titulo'] . " " . $movie['likes'] . "♥
            <a href='peliculas.php?like=" . $movie['id'] . "'>LIKE</a>
            <a href='peliculas.php?del=" . $movie['id'] . "'>X</a><br>";
        }
    } else {
    ?>

        <form method="post" action="peliculas.php">
            <input type="text" name="username" placeholder="nombre de usuario">
            <input type="password" name="password" placeholder="contraseña">
            <input type="submit" name="login" value="Login" />
        </form>

    <?php

    }
    ?>

    <h2>crear pelicula</h2>
    <form method="post" action="peliculas.php" enctype="multipart/form-data">
        <input type="text" name="title" placeholder="nombre de la pelicula">
        <input type="number" name="year" placeholder="año">
        <input type="file" name="poster" placeholder="imagen">
        <input type="submit" name="addMovie" value="Añadir pelicula" />
    </form>

    <?php
    if (isset($info)) echo "<script>
        alert('" . $info . "')
    </script>";
    ?>

</body>

</html>