<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
}
echo 'el nombre de usuario es: ' ."<br>";
echo  $_SESSION['user'] ."<br>"; 
echo "El mail del usuario es: ". $_SESSION["mail"] ."<br>" ;
echo '<a href="cabecera.php">Puedes ir al menú de la cabecera.</a>';

/* Imprimimos datos del usuario. */

?>
