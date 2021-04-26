<?php
/*
 * Ce controlleur revoie vers les vues de l'arborécence ROOT du site
 */
require("models/login-process.php");
require("models/logout.php");

function seeIndex()
{
    require ROOT . "/views/index.php";
}

function seeLogin()
{
    require ROOT . "/views/login.php";
}

function processLogout()
{
    logout();
}

function processLogin()
{
    //echo $_POST["email"] . "<br/>";
    //echo $_POST["password"];

    if (isset($_POST["email"]) && isset($_POST["password"])) {
        $email = htmlspecialchars($_POST["email"]);
        $password = htmlspecialchars($_POST["password"]);

        loginUser($email, $password);
    }
}