<?php 
/* 3 enlaces en la cabecera para movernos entre páginas*/
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
}

echo '<a href="usuario.php">Datos de usuario.</a>' ."<br>";

echo '<a href="cookies.php">Cookies.</a>'."<br>";

echo '<a href="logout.php">Cerrar sesión.</a>' ."<br>";




?>