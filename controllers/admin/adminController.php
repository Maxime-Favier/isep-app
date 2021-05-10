<?php
require_once("models/edit-profile.php");
require("models/admin/add-doctor.php");
require('models/admin/faqManager.php');
require("models/admin/search-users.php");
require("models/delete-user.php");

function seeAdminIndex()
{
    require ROOT . "/views/admin/index.php";
}

function seeAdminEditProfile()
{
    require ROOT . "/views/admin/editProfile.php";
}

function seeAdminEditUsers()
{
    require ROOT . "/views/admin/editUsers.php";
}

function seeAdminAddDoctor()
{
    require ROOT . "/views/admin/addDoctor.php";
}

function seeAdminEditFAQ()
{
    require ROOT . "/views/admin/faqManager.php";
}

function processAdminEditProfile()
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

function processAdminAddDoctor()
{
    if (isset($_POST["name"]) && isset($_POST["firstName"]) && isset($_POST["address"]) && isset($_POST["email"]) && isset($_POST["password"])) {
        $name = htmlspecialchars($_POST["name"]);
        $firstName = htmlspecialchars($_POST["firstName"]);
        $email = htmlspecialchars($_POST["email"]);
        $password = password_hash(htmlspecialchars($_POST["password"]), PASSWORD_DEFAULT);
        $address = htmlspecialchars(($_POST["address"]));
        addNewDoctor($name, $firstName, $email, $password, $address);
    }
    header('Location: index');
    die();
}

function adminProcessEditProfile()
{
    if (isset($_POST["name"]) && isset($_POST["firstName"]) && isset($_POST["address"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST['userId'])) {
        $name = htmlspecialchars($_POST["name"]);
        $firstName = htmlspecialchars($_POST["firstName"]);
        $email = htmlspecialchars($_POST["email"]);
        $password = password_hash(htmlspecialchars($_POST["password"]), PASSWORD_DEFAULT);
        $address = htmlspecialchars(($_POST["address"]));
        editProfileByOtherUser($_POST['userId'], $name, $firstName, $email, $password, $address);
    }
    header('Location: index');
    die();
}

function processAdminSearchUsers()
{
    if (isset($_POST["searchUsers"]) and isset($_POST['typeOfUser']) and ($_POST['typeOfUser'] != '')) {
        $expression = $_POST["searchUsers"];
        $users = $_POST['typeOfUser'];
        $reponse = searchUsers($expression, $users);
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
    } else {
        return [[]];
    }
}

function processAddFAQQuestion()
{
    if (isset($_POST["question"]) && isset($_POST["answer"])) {
        $question = htmlspecialchars($_POST["question"]);
        $anwser = htmlspecialchars($_POST["answer"]);
        addFaqQuestionToDB($question, $anwser);
        //echo "here";
    }
    header('Location: editfaq');
    die();
}

function processDeleteFAQQuestion()
{
    if (isset($_GET["q"])) {
        try {
            $idQuestion = intval(htmlspecialchars($_GET["q"]));
            deleteFaqQuestion($idQuestion);

        } catch (Exception $e) {
            header('Location: editfaq');
            die();
        }
    }
    header('Location: editfaq');
    die();
}

function adminSeeInforUser()
{
    if (isset($_GET["userId"])) {
        // on regarde si le medecin est bien celui du patient demandé
        try {
            $piloteId = intval(htmlspecialchars($_GET['userId']));
            if (true) {
                require ROOT . "/views/admin/adminInfoUser.php";
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

function adminSeeInforPilote()
{
    if (isset($_GET["piloteId"])) {
        // on regarde si le medecin est bien celui du patient demandé
        try {
            $piloteId = intval(htmlspecialchars($_GET['piloteId']));
            if (true) {
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

function adminSeeEditPilote()
{
    if (isset($_GET["piloteId"])) {
        // on regarde si le medecin est bien celui du patient demandé
        try {
            $piloteId = intval(htmlspecialchars($_GET['piloteId']));
            if (true) {
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

function processAdminDeleteUser()
{
    if ($_SESSION['role'] == 'admin') {
        $typeOfUser = $_GET['typeOfUser'];
        $idUser = $_GET['typeOfUser'];
        deleteUser($typeOfUser, $idUser);
        $isdelete = true;
    }
}