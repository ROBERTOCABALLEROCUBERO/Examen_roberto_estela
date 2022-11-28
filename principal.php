<?php
session_start();;
/* $_SESSION["menor_de_edad"] = 17; */
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
}

if (isset($_POST['juego'])) {
    $_SESSION['preguntas'] =  $_POST['preguntas'];
    $_SESSION['Juego'] = 0;
}
if ($_SESSION['Juego'] > $_SESSION['preguntas']) {
    $_SESSION["fallo"] = "He fallado que mal";
    header("Location: resultados.php");
}
switch ($_POST['edad']) {
    case 'mayor':
        if (isset($_POST['Mayor'])) {
            $_SESSION['rand'] = rand($_SESSION['rand'], 120);
            $_SESSION['preguntas'] += 1;
        }
        if (isset($_POST['Menor'])) {
            $_SESSION['rand'] = rand(18, $_SESSION['rand']);
            $_SESSION['preguntas'] += 1;
        }
        if (isset($_POST['Acertaste'])) {
            $_SESSION["Acertaste"] = "Muy bien el programa ha acertado";
            header("Location: resultados.php");
        }

        break;
    case 'menor':
        if (isset($_POST['Mayor'])) {
            $_SESSION['rand'] = rand($_SESSION['rand'], 17);
            $_SESSION['preguntas'] += 1;
        }
        if (isset($_POST['Menor'])) {
            $_SESSION['rand'] = rand(0, $_SESSION['rand']);
            $_SESSION['preguntas'] += 1;
        }
        if (isset($_POST['Acertaste'])) {
            $_SESSION["Acertaste"] = "Muy bien el programa ha acertado";
            header("Location: resultados.php");
        }

        break;
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
    if (!isset($_SESSION['Juego'])) {
        echo "<form action=" . htmlspecialchars($_SERVER['PHP_SELF']) . " method='post'>";
        echo "<label for=''>Edad: </label>" . "<br>";
        echo "<label for='html'>Mayor de edad</label>";
        echo "<input type='radio' name='edad' value='mayor_de_edad' checked>";
        echo "<label for='css'>Menor de edad</label>";
        echo "<input type='radio' name='edad' value='menor_de_edad'>" . "<br>";
        echo "<label for=''> ¿Cuántas preguntas nos das?</label>";
        echo "<input type='number' name='preguntas' step='2' min='1' max='10'>" . "<br>";
        echo "<input type='submit' value='Enviar' name='juego'>";
        echo "</form>";
    } else {



        echo "La edad es: " . $_SESSION['rand'];

        echo "<form action='' method='post'>";
        echo "<input type='submit' value='Mayor' name='Mayor'>";
        echo "<input type='submit' value='Menor' name='Menor'>";
        echo "<input type='submit' value='Acertaste' name='Acertaste'>";
        echo "</form>";
    }
    ?>


</body>

</html>