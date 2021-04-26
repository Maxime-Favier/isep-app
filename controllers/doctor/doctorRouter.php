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
        case "process-cgu":
            processCgu();
            break;
        case "infoPilote":
            seeInforPilote();
            break;
        default:
            echo "Erreur 404 (Not Found) - doctor<br/>" . $route;
            break;
    }
}

?>