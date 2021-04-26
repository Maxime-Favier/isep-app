<?php
require_once("models/edit-profile.php");
require("models/admin/add-doctor.php");

function seeAdminIndex()
{
    require ROOT . "/views/admin/index.php";
}

function seeAdminEditProfile()
{
    require ROOT . "/views/admin/editProfile.php";
}

function seeAdminAddDoctor(){
    require ROOT . "/views/admin/addDoctor.php";
}

function processAdminEditProfile()
{
    if (isset($_POST["name"]) && isset($_POST["firstName"]) && isset($_POST["address"]) && isset($_POST["email"]) && isset($_POST["password"])) {
        $name = htmlspecialchars($_POST["name"]);
        $firstName = htmlspecialchars($_POST["firstName"]);
        $email = htmlspecialchars($_POST["email"]);
        $password = password_hash(htmlspecialchars($_POST["password"]),PASSWORD_DEFAULT);//SAM
        $address = htmlspecialchars(($_POST["address"]));
        editProfile($_SESSION["id"], $name, $firstName, $email, $password, $address);
    }
    header('Location: index');
    die();
}

function processAdminAddDoctor(){
    if (isset($_POST["name"]) && isset($_POST["firstName"]) && isset($_POST["address"]) && isset($_POST["email"]) && isset($_POST["password"])) {
        $name = htmlspecialchars($_POST["name"]);
        $firstName = htmlspecialchars($_POST["firstName"]);
        $email = htmlspecialchars($_POST["email"]);
        $password = password_hash(htmlspecialchars($_POST["password"]),PASSWORD_DEFAULT);//SAM
        $address = htmlspecialchars(($_POST["address"]));
        addNewDoctor($name, $firstName, $email, $password, $address);
    }
    header('Location: index');
    die();
}