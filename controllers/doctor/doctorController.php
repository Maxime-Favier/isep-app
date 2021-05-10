<?php
require_once("models/edit-profile.php");
require_once("models/doctor/add-pilote.php");
require_once('models/doctor/process-cgu.php');
require_once('models/doctor/checkIsFromDoc.php');
require_once('models/doctor/search-users.php');

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

function seeDoctorEditUsers()
{
    require ROOT . "/views/doctor/editPilot.php";
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

function doctorSeeEditPilote()
{
    if (isset($_GET["piloteId"])) {
        // on regarde si le medecin est bien celui du patient demandé
        try {
            $piloteId = intval(htmlspecialchars($_GET['piloteId']));
            if (isfromdoc($_SESSION["id"], $piloteId)) {
                require ROOT . "/views/doctor/editPilot.php";
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
        $password = password_hash(htmlspecialchars($_POST["password"]), PASSWORD_DEFAULT);
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
        $password = password_hash(htmlspecialchars($_POST["password"]), PASSWORD_DEFAULT);
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

function processDoctorSearchUsers()
{
    if (isset($_POST["searchUsers"])) {
        $expression = $_POST["searchUsers"];
        $reponse = docSearchUsers($expression, $_SESSION['id']);
        $compteur = 1;
        $tableau = [[]];
        while ($result = $reponse->fetch()) {
            $tableau[$compteur][1] = $result['name'];
            $tableau[$compteur][2] = $result['firstName'];
            $tableau[$compteur][3] = $result['email'];
            $tableau[$compteur][4] = $result['address'];
            $tableau[$compteur][5] = $result['id'];
            $compteur = $compteur + 1;
        }

        return $tableau;
        header('Location:index');
        die();
    } else {
        return [[]];
    }
}

function doctorProcessEditProfile()
{
    if (isset($_POST["name"]) && isset($_POST["firstName"]) && isset($_POST["address"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST['piloteId'])) {
        $name = htmlspecialchars($_POST["name"]);
        $firstName = htmlspecialchars($_POST["firstName"]);
        $email = htmlspecialchars($_POST["email"]);
        $password = password_hash(htmlspecialchars($_POST["password"]), PASSWORD_DEFAULT);
        $address = htmlspecialchars(($_POST["address"]));
        editProfileByOtherUser($_POST['piloteId'], $name, $firstName, $email, $password, $address);
    }
    header('Location: index');
    die();
}