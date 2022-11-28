<?php
session_start();
error_reporting(0);
/* Si el juegador no ha iniciado sesion no se puede jugar */
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
}
/* Inicializamos el juego y cogemos el número de preguntas que ha puesto el usuario*/
if (isset($_POST['juego'])) {
    $_SESSION['preguntas'] =  $_POST['preguntas'];
    $_SESSION['juego'] = 0;
}
if ($_SESSION['juego'] > $_SESSION['preguntas']) {
    $_SESSION["fallo"] = "He fallado que mal";
    header("Location: resultados.php");
}
/* Contador para terminar el juego.*/


if (!isset($_SESSION['tipo'])) {
    $_SESSION["tipo"] = $_POST['edad'];
    if ($_SESSION["tipo"] == "mayor_de_edad") {

        $_SESSION['rand'] = 120;
    }
    if ($_SESSION["tipo"] == "menor_de_edad") {
        $_SESSION['rand'] = 0;
    }
}
/* Asignamos un tipo para saber si es menor o mayor de y descartar números. */
if ($_SESSION["tipo"] == "mayor_de_edad") {
    if (isset($_POST['Mayor'])) {
        $_SESSION['rand'] = rand($_SESSION['rand'], 120);
        $_SESSION['juego'] += 1;
    }
    if (isset($_POST['Menor'])) {
        $_SESSION['rand'] = rand(18, $_SESSION['rand']);
        $_SESSION['juego'] += 1;
    }
    if (isset($_POST['Acertaste'])) {
        $_SESSION["Acertaste"] = "Muy bien el programa ha acertado";
        header("Location: resultados.php");
    }
}
/* Calcula en base a un número random  para que el usuario compruebe si es o no es el numero que 
corresponde con su edad, el programa siempre empieza en el máximo o el mínimo que configuramos en un principio
y en base al boton que pulsemos actúa aumentando o disminuyendo el número.*/
if ($_SESSION["tipo"] == "menor_de_edad") {


    if (isset($_POST['Mayor'])) {

        $_SESSION['rand'] = rand($_SESSION['rand'], 17);
        $_SESSION['juego'] += 1;
    }
    if (isset($_POST['Menor'])) {
        $_SESSION['rand'] = rand(0, $_SESSION['rand']);
        $_SESSION['juego'] += 1;
    }
    if (isset($_POST['Acertaste'])) {
        $_SESSION["Acertaste"] = "Muy bien el programa ha acertado";
        header("Location: resultados.php");
    }
}




?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php
    if (!isset($_SESSION['juego'])) {
        echo '<a href="cabecera.php">Puedes ir al menú de la cabecera.</a>'.'<br>';
        echo "<form action=" . htmlspecialchars($_SERVER['PHP_SELF']) . " method='post'>";
        echo "<label for=''>Edad: </label>" . "<br>";
        echo "<label for='html'>Mayor de edad</label>";
        echo "<input type='radio' name='edad' value='mayor_de_edad' checked>";
        echo "<label for='css'>Menor de edad</label>";
        echo "<input type='radio' name='edad' value='menor_de_edad'>" . "<br>";
        echo "<label for=''> ¿Cuántas preguntas nos das?</label>";
        echo "<input type='number' name='preguntas' step='1' min='1' max='10' required>" . "<br>";
        echo "<input type='submit' value='Enviar' name='juego'>";
        echo "</form>";
        /* Formulario para introducir los valores. */
    } else {

/* Número de años del usuario y botones que no salen hasta que se rellena el primer formulario. */
        echo "La edad es: " . $_SESSION['rand'];

        echo "<form action=" . htmlspecialchars($_SERVER['PHP_SELF']) . " method='post'>";
        echo "<input type='submit' value='Mayor' name='Mayor'>";
        echo "<input type='submit' value='Menor' name='Menor'>";
        echo "<input type='submit' value='Acertaste' name='Acertaste'>";
        echo "</form>";
    }
    ?>


</body>

</html>