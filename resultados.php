<?php
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
}
if (isset($_SESSION['fallo'])) {
echo $_SESSION['fallo'];

}
if ( isset($_SESSION["Acertaste"])) {
    $_SESSION["Acertaste"];
}

?>