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
        case "faq":
            seeFAQ();
            break;
        case "CGU":
            seeCGU();
            break;
        case "contact":
            seeContact();
            break;
        case 'addQuestion':
            processAddFAQQuestion();
            break;
        case "deleteQuestion":
            processDeleteFAQQuestion();
            break;
        case "adminInfoUser":
            adminSeeInforUser();
            break;
        case "infoPilote":
            adminSeeInforPilote();
            break;
        case "editUsers":
            seeAdminEditUsers();
            break;
        case "submit-profile-user":
            adminProcessEditProfile();
            break;
        case "editPilot":
            adminSeeEditPilote();
            break;
        case "submit-profile-pilot":
            doctorProcessEditProfile();
            break;
        default:
            echo "Erreur 404 (Not Found) - admin<br/>" . $route;
            break;
    }
}