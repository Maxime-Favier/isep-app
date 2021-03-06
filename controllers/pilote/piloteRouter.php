<?php

require ROOT . "/controllers/pilote/piloteController.php";

function piloteRouter($route)
{
    session_start();

    if (!isset($_SESSION['id']) || $_SESSION['role'] != 'pilote') {
        header('Location: ../');
        die();
    }
    switch ($route) {
        case "index":
            seePiloteIndex();
            break;
        case "editProfile":
            seePiloteEditProfile();
            break;
        case "submit-profile":
            processPiloteEditProfile();
            break;
        case "faq":
            seeFAQ();
            break;
        case "cgu":
            seePiloteCgu();
            break;
        case "CGU":
            seeCGU();
            break;
        case "contact":
            seeContact();
            break;
        case "process-cgu":
            processPiloteCgu();
            break;
        case "addTest":
            seeAddTest();
            break;
        case "submit-addTest":
            processAddTest();
            break;
        case "submit-getpasserelle":
            processSubmitGetpasserelle();
            break;
        case "submit-passerelle":
            processSubmitPasserelle();
            break;
        default:
            echo "Erreur 404 (Not Found) - pilote<br/>" . $route;
            break;
    }
}