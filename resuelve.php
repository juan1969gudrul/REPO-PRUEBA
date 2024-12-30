<?php
/// Obtener el nombre del jugador desde el formulario
$nombre = $_POST['nombre'] ?? null;  // Usamos null si no existe el nombre (en caso de que el jugador haga clic en "Iniciar juego")

$numero_img =mt_rand(1,6);
$img = match($numero_img){
    1=>"dado_1.png",
    2=>"dado_2.png",
    3=>"dado_3.png",
    4=>"dado_4.png",
    5=>"dado_5.png",
    6=>"dado_6.png",
};
// Si no hay nombre (es decir, el jugador ha hecho clic en "Iniciar juego"), redirigimos a index.php
if (!$nombre) {
    header('Location: index.php');
    exit;
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>El jugador <?=$nombre?> ha obtenido</h1>
<img src="<?="images/$img"?>" alt="">
<form action="resuelve.php" method="post">
    <input type="hidden" name=nombre value="<?=$nombre?>">
    <input type="submit" value="Volver a jugar">
</form>

<!-- Formulario para iniciar un nuevo juego con un nuevo jugador -->
<form action="resuelve.php" method="POST">
        <input type="hidden" name="nombre" value=""> <!-- Vaciamos el nombre para iniciar un nuevo jugador -->
        <input type="submit" value="Iniciar juego (Nuevo jugador)">
    </form>
</body>
</html>

