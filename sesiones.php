<?php
$fecha=date('Y-m-d');
$nav=get_browser_name($_SERVER['HTTP_USER_AGENT']);


function get_browser_name($user_agent)
{
    if (strpos($user_agent, 'Opera') || strpos($user_agent, 'OPR/')) return 'Opera';
    elseif (strpos($user_agent, 'Edge')) return 'Edge';
    elseif (strpos($user_agent, 'Chrome')) return 'Chrome';
    elseif (strpos($user_agent, 'Safari')) return 'Safari';
    elseif (strpos($user_agent, 'Firefox')) return 'Firefox';
    elseif (strpos($user_agent, 'MSIE') || strpos($user_agent, 'Trident/7')) return 'Internet Explorer';
   
    return 'Other';
}



echo get_browser_name($_SERVER['HTTP_USER_AGENT']);

if(preg_match('/^([a-z0-9_\.-]+)@educa\.madrid\.org$/', $_POST['email']) ){
    session_start();
    // Gua
     
    setcookie('Fecha', $fecha, time() + 365 * 24 * 60 * 60);    
    setcookie('nombre_nav', $nav, time() + 365 * 24 * 60 * 60);  
    setcookie('SO', PHP_OS, time() + 365 * 24 * 60 * 60);
/* header('Location: index.html'); */
}

header("Location: login.php");


?>