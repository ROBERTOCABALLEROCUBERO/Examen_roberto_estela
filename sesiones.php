<?php
$fecha=date('Y-m-d');
$nav=get_browser_name($_SERVER['HTTP_USER_AGENT']);
/* Para crear la cookie de  la informacion del navegador hemos hecho una funcion
con todos los tipos de navegadores. Recibimos la información de la función a 
través del $_SERVER['HTTP_USER_AGENT']. En la función irá pasando al siguiente
si no se corresponde con esa opción. */
/* Para la fecha hemos usado el date. */
function get_browser_name($user_agent)
{
    /* strpos compara strings */
    if (strpos($user_agent, 'Opera') || strpos($user_agent, 'OPR/')) return 'Opera';
    elseif (strpos($user_agent, 'Edge')) return 'Edge';
    elseif (strpos($user_agent, 'Chrome')) return 'Chrome';
    elseif (strpos($user_agent, 'Safari')) return 'Safari';
    elseif (strpos($user_agent, 'Firefox')) return 'Firefox';
    elseif (strpos($user_agent, 'MSIE') || strpos($user_agent, 'Trident/7')) return 'Internet Explorer';
   
    return 'Other';
}




if(preg_match('/^([a-z0-9_\.-]+)@educa\.madrid\.org$/', $_POST['email']) ){
    session_start();
/* Creo las cookies y las sessions */     
    setcookie('Fecha', $fecha, time() + 365 * 24 * 60 * 60);    
    setcookie('nombre_nav', $nav, time() + 365 * 24 * 60 * 60);  
    setcookie('SO', PHP_OS, time() + 365 * 24 * 60 * 60);
    $_SESSION["user"] = $_POST["usuario"];
    $_SESSION["mail"] = $_POST["email"];
header('Location: principal.php');
}else{

header("Location: login.php");

}
