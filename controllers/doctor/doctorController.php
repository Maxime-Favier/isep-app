<?php
require_once("models/edit-profile.php");
require_once("models/doctor/add-pilote.php");
require_once('models/doctor/process-cgu.php');
require_once('models/doctor/checkIsFromDoc.php');

function seeDoctorIndex()
{
    require ROOT . "/views/doctor/index.php";
}

function seeDoctorEditProfile()
{
    require ROOT . "/views/doctor/editProfile.php";
}

function seeDoctorAddPilote()
{
    require ROOT . "/views/doctor/addPilote.php";
}

function seeDoctorCGU()
{
    require ROOT . "/views/doctor/cgu.php";
}

function seeInforPilote()
{
    if (isset($_GET["piloteId"])) {
        // on regarde si le medecin est bien celui du patient demandé
        try {
            $piloteId = intval(htmlspecialchars($_GET['piloteId']));
            if (isfromdoc($_SESSION["id"], $piloteId)) {
                require ROOT . "/views/doctor/infoPilote.php";
            } else {
                header('Location: index');
                die();
            }

        } catch (Exception $e) {
            header('Location: index');
            die();
        }

    } else {
        header('Location: index');
        die();
    }

}

function processDoctorEditProfile()
{
    if (isset($_POST["name"]) && isset($_POST["firstName"]) && isset($_POST["address"]) && isset($_POST["email"]) && isset($_POST["password"])) {
        $name = htmlspecialchars($_POST["name"]);
        $firstName = htmlspecialchars($_POST["firstName"]);
        $email = htmlspecialchars($_POST["email"]);
        $password = password_hash(htmlspecialchars($_POST["password"]),PASSWORD_DEFAULT);
        $address = htmlspecialchars(($_POST["address"]));
        editProfile($_SESSION["id"], $name, $firstName, $email, $password, $address);
    }
    header('Location: index');
    die();
}

function processDoctorAddPilote()
{
    if (isset($_POST["name"]) && isset($_POST["firstName"]) && isset($_POST["address"]) && isset($_POST["email"]) && isset($_POST["password"])) {
        $name = htmlspecialchars($_POST["name"]);
        $firstName = htmlspecialchars($_POST["firstName"]);
        $email = htmlspecialchars($_POST["email"]);
        $password = password_hash(htmlspecialchars($_POST["password"]),PASSWORD_DEFAULT);
        $address = htmlspecialchars(($_POST["address"]));
        addPilote($_SESSION["id"], $name, $firstName, $email, $password, $address);
    }
    header('Location: index');
    die();
}

function processCgu()
{
    if (isset($_POST['cgu'])) {
        processDoctorCGU($_SESSION["id"]);
    }
    header('Location: index');
    die();
}