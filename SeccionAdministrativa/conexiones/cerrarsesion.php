<?php
// Inicializar la sesión.
session_start();
// Destruir todas las variables de sesión.
$helper = array_keys($_SESSION);
foreach ($helper as $key){
    unset($_SESSION[$key]);
}
// Si se desea destruir la sesión completamente, borre también la cookie de sesión.
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 100,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );

}
// Finalmente, destruir la sesión.
session_destroy();
session_write_close();
setcookie(session_name(),'',0,'/');
header("location:../");
exit;
?>