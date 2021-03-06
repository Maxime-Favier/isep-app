<?php

require ROOT . "/controllers/doctor/doctorController.php";

function doctorRouter($route)
{
    session_start();

    if (!isset($_SESSION['id']) || $_SESSION['role'] != 'doctor') {
        header('Location: ../');
        die();
    }
    switch ($route) {
        case "index":
            seeDoctorIndex();
            break;
        case "editProfile":
            seeDoctorEditProfile();
            break;
        case "submit-profile":
            processDoctorEditProfile();
            break;
        case "addPilote":
            seeDoctorAddPilote();
            break;
        case "submit-addPilote":
            processDoctorAddPilote();
            break;
        case "cgu":
            seeDoctorCGU();
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
        case "process-cgu":
            processCgu();
            break;
        case "infoPilote":
            seeInforPilote();
            break;
        case "editUsers":
            seeDoctorEditUsers();
            break;
        case "editPilot":
            doctorSeeEditPilote();
            break;
        case    "submit-profile-pilot":
            doctorProcessEditProfile();
            break;
        default:
            echo "Erreur 404 (Not Found) - doctor<br/>" . $route;
            break;
    }
}

?>