<?php
/* Imprimimos la cookies- */
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
}
echo "La última fecha en la que te conectaste " .$_COOKIE['Fecha']."<br>";
echo "Tu navegador es: ". $_COOKIE['nombre_nav'] ."<br>";
echo "Tu sistema operativo es: ". $_COOKIE['SO'] ."<br>";

echo '<a href="cabecera.php">Puedes ir al menú de la cabecera.</a>';
?>