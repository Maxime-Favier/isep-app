<?php
require_once("models/edit-profile.php");
require("models/admin/add-doctor.php");
require('models/admin/faqManager.php');

function seeAdminIndex()
{
    require ROOT . "/views/admin/index.php";
}

function seeAdminEditProfile()
{
    require ROOT . "/views/admin/editProfile.php";
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