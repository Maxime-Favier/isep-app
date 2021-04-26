<?php
require_once("models/edit-profile.php");
require_once("models/pilote/process-cgu.php");
require_once('models/pilote/add-test.php');

function seePiloteIndex()
{
    require ROOT . "/views/pilote/index.php";
}

function seePiloteEditProfile()
{
    require ROOT . "/views/pilote/editProfile.php";
}

function seePiloteCgu()
{
    require ROOT . "/views/pilote/cqu.php";
}

function seeAddTest()
{
    require ROOT . "/views/pilote/addTest.php";
}

function processPiloteEditProfile()
{
    if (isset($_POST["name"]) && isset($_POST["firstName"]) && isset($_POST["address"]) && isset($_POST["email"]) && isset($_POST["password"])) {
        $name = htmlspecialchars($_POST["name"]);
        $firstName = htmlspecialchars($_POST["firstName"]);
        $email = htmlspecialchars($_POST["email"]);
        $password = password_hash(htmlspecialchars($_POST["password"]));
        $address = htmlspecialchars(($_POST["address"]));
        editProfile($_SESSION["id"], $name, $firstName, $email, $password, $address);
    }
    header('Location: index');
    die();
}

function processPiloteCgu()
{
    if (isset($_POST['cgu'])) {
        processPiloteCGUDb($_SESSION['id']);
    }
    header('Location: index');
    die();
}

function processAddTest()
{
    if (isset($_POST["RTimeL"]) && isset($_POST['RTimeS']) && isset($_POST["Tempe"]) && isset($_POST["HB"])) {
        //echo "ok";
        $RTimeL = htmlspecialchars($_POST["RTimeL"]);
        $RTimeS = htmlspecialchars($_POST['RTimeS']);
        $tempe = htmlspecialchars($_POST["Tempe"]);
        $HB = htmlspecialchars($_POST["HB"]);
        processPiloteAddTest($_SESSION['id'], $RTimeL, $RTimeS, $tempe, $HB);
    }
    header('Location: index');
    die();
}

?>