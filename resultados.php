<?php
session_start();
/* Pagina intermedia para mostrar el resultado del usuario */
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
}
if (isset($_SESSION['fallo'])) {
echo $_SESSION['fallo'] ."<br>";
echo '<a href="cabecera.php">Puedes ir al menú de la cabecera.</a>';

}
if ( isset($_SESSION["Acertaste"])) {
    echo $_SESSION["Acertaste"] ."<br>";
    echo '<a href="cabecera.php">Puedes ir al menú de la cabecera.</a>';

}

?>