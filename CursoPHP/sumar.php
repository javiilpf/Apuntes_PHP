<?php
session_start();

if (!isset($_SESSION['valorInicial'])) {
    $_SESSION['valorInicial'] = 0;
}

if (isset($_POST['uno'])) {
    $_SESSION['valorInicial'] += 2;
} elseif (isset($_POST['dos'])) {
    $_SESSION['valorInicial'] -= 2;
}elseif(isset($_POST['mult'])) {
    $_SESSION['valorInicial'] *= 2;
}elseif(isset($_POST['div'])) {
    $_SESSION['valorInicial'] /= 2;
}elseif (isset($_POST['res'])){
    $_SESSION['valorInicial']=0;

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sumar</title>
</head>
<body>
    <form method="post" action="sumar.php">´
        <input type="text" id="numero" name="numero">
        <input type="submit" id="uno" name="uno" value="+2" />
        <input type="submit" id="dos" name="dos" value="-2" />
        <input type="submit" id="mult" name="mult" value="x2" />
        <input type="submit" id="div" name="div" value="/2" />
        <input type="submit" id="res" name="res" value="Restablecer" />
    </form>
    <?php
        echo "Valor actual: " . $_SESSION['valorInicial'];
    ?>
</body>
</html>