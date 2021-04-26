<?php
/* Quand on accède au site on va automatiquement sur cette page
 * Cette page s'occupe ensuite de nous rediriger au bon endroit
 */

define("ROOT", __DIR__);

require ROOT . "/controllers/indexController.php";
require ROOT . "/controllers/admin/adminRouter.php";
require ROOT . "/controllers/doctor/doctorRouter.php";
require ROOT . "/controllers/pilote/piloteRouter.php";

if (isset($_GET["action"])) {
    // sanitizing input
    $action = htmlspecialchars($_GET["action"]);
    //echo $action;
    if ($action == "" || $action == "index") {
        seeIndex();
    } elseif ($action == "login") {
        seeLogin();
    } elseif ($action == "logout") {
        processLogout();
    } elseif ($action == "login-process") {
        processLogin();
    }elseif (substr($action, 0, 6) == "admin/") {
       adminRouter(substr($action, 6));
    }elseif (substr($action, 0, 7) == "doctor/") {
        doctorRouter(substr($action, 7));
    }elseif (substr($action, 0, 7) == "pilote/") {
        piloteRouter(substr($action, 7));
    }
    else {
        echo "Erreur 404 Not found - index <br/>" . $action;
    }

} else {
    seeIndex();
}