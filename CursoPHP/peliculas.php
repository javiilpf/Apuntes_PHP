<?php
   session_start();
?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Películas</title>
    </head>
    <body>
        <form method="post" action="peliculas.php">
            Usuario: <input type="text" name="usuario" name="usuario" required>
            Contraseña: <input type="password" name="contraseña" name="contraseña" required>
            <input type="submit" name="enviar">
        </form>

        <?php
            $db=new mysqli("localhost", "root", "", "login");
            $q="SELECT * FROM películas";
            $q2="SELECT * FROM users WHERE user='".$_POST['usuario']."'";
            $result2=$db->query($q2);
            $result = $db->query($q);
        
            if ($user=$result2->fetch_assoc()){
                if ($user['user'] == $_POST['usuario'] && $user['password'] == $_POST['contraseña']){
                    while($fila=$result->fetch_assoc()){
                        echo $fila["Título"];
                        ?>
                        <form method="post" action="peliculas.php">
                            <input type="submit" name="borrar"<?php echo $fila['id'];?></input>
                        </form>
                        <?php
                        
                    }
                }
            }else{
                echo "eres un mierda";
            }
            if (isset($_POST['borrar'])){
                $id=(int)$_POST['id'];
                $q3="DELETE FROM películas WHERE id=$id";
                $result3=$db->query($q3);
            }
            if ($_POST['nombrePel'] && $_POST['director'] && $_POST['año']){
                $q3="INSERT into películas ('Titulo', 'Director', 'Año') VALUES ('$nombrePel', '$director', '$año')";
                $db->query(q3);
            };
        ?>
        <form method="post" action="peliculas.php">
            <h1>Crear películas</h1>
            Título: <input type="text" name="nombrePel" required>
            Director: <input type="text" name="director" required>
            año: <input type="number" name=año required>
            <input type="submit" name="enviar">
        </form>
    </body>
</html>