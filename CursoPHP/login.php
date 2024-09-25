<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login PHP</title>
</head>
<body>
    <form method="post" action="login.php">
        Usuario: <input type="text" name="usuario" name="usuario" required>
        Contraseña: <input type="password" name="contraseña" name="contraseña" required>
        <input type="submit" name="enviar">
    </form>
    <?php
        if (isset($_POST['enviar'])){
            $db=new mysqli("localhost", "root", "", "login");
            $q="SELECT * FROM users WHERE user='".$_POST['usuario']."'";
            $result=$db->query($q);
            if ($user=$result->fetch_assoc())
                if ($user['user'] == $_POST['usuario'] && $user['password'] == $_POST['contraseña']){
                    echo "Usuario y contraseña correctos";
                }
            }else{
                echo "eres un mierda";
            }
    ?>
</body>
</html>