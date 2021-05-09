<?php

require ROOT . "/controllers/admin/adminController.php";

function adminRouter($route)
{
    session_start();

    if (!isset($_SESSION['id']) || $_SESSION['role'] != 'admin') {
        header('Location: ../');
        die();
    }

    switch ($route) {
        case "index":
            //echo "here";
            seeAdminIndex();
            break;
        case "editProfile":
            seeAdminEditProfile();
            break;
        case "submit-profile":
            processAdminEditProfile();
            break;
        case "addDoctor":
            seeAdminAddDoctor();
            break;
        case "submit-addDoctor":
            processAdminAddDoctor();
            break;
        case "editfaq":
            seeAdminEditFAQ();
            break;
        case 'addQuestion':
            processAddFAQQuestion();
            break;
        case "deleteQuestion":
            processDeleteFAQQuestion();
            break;
        default:
            echo "Erreur 404 (Not Found) - admin<br/>" . $route;
            break;
    }
}