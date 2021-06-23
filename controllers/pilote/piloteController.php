<?php
require_once("models/edit-profile.php");
require_once("models/pilote/process-cgu.php");
require_once('models/pilote/add-test.php');
require_once('models/pilote/search-test.php');
require_once("models/pilote/getPasserelleTrames.php");

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
        $password = password_hash(htmlspecialchars($_POST["password"]), PASSWORD_DEFAULT);
        $address = htmlspecialchars(($_POST["address"]));
        editProfile($_SESSION["id"], $name, $firstName, $email, $password, $address);
    }
    header('Location: index');
    //die();
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

function processPilotSearchTest()
{
    if (isset($_POST["searchUsers"])) {
        $expression = $_POST["searchUsers"];
        $reponse = pilotSearchTest($expression, $_SESSION['id']);
        $compteur = 1;
        $tableau = [[]];
        while ($result = $reponse->fetch()) {
            $tableau[$compteur][1] = $result['date'];
            $tableau[$compteur][2] = $result['reactTimeL'];
            $tableau[$compteur][3] = $result['reactTimeS'];
            $tableau[$compteur][5] = $result['hearBeat'];
            $tableau[$compteur][4] = $result['temperature'];
            $compteur = $compteur + 1;
        }

        return $tableau;
        header('Location:index');
    } else {
        return [[]];
    }
}

function processSubmitGetpasserelle()
{
    if (isset($_POST["neq"])) {
        //echo $_POST["neq"];
        requestTramesFromServer(intval($_POST["neq"]));
    }
    header('Location:addTest');
}

function processSubmitPasserelle()
{
    if (isset($_POST["trames"])) {
        $postTrame = str_replace(' ', '', $_POST["trames"]);
        $postTrame = str_replace('\n', '', $postTrame);
        $postTrame = str_replace('\r', '', $postTrame);
        $postTrame = str_replace('\t', '', $postTrame);
        $postTrame = str_replace('\0', '', $postTrame);
        $postTrame = str_replace('\x0B', '', $postTrame);

        $data_tab = str_split($postTrame, 33);
        //echo "Tabular Data:<br />";
        /*for ($i = 0, $size = count($data_tab); $i < $size; $i++) {
            echo "Trame $i: $data_tab[$i]<br />";
        }*/

        addTestBulkOpti($data_tab, $_SESSION["id"]);
        $_SESSION["trames"] = "";
        header('Location:index');
        /*for ($i = 0, $size = count($data_tab) - 1; $i < $size; $i++) {
            $trame = $data_tab[$i];// décodage avec des substring
            // ...// décodage avec sscanf
            list($t, $o, $r, $c, $n, $v, $a, $x, $year, $month, $day, $hour, $min, $sec) = sscanf($trame, "%1s%4s%1s%1s%2s%4s%4s%2s%4s%2s%2s%2s%2s%2s");
            $dateTime = strtotime($year . "/" . $month . "/" . $day . " " . $hour . ":" . $min . ":" . $sec);
            echo("<br/>type: $t, num obj: $o, rqtype: $r, typecapt: $c, numcapt: $n, valeur: $v, numTrame: $a, chk: $x, date: $year,$month,$day,$hour,$min,$sec<br/>");
            //echo "<br/>$year";
            if ($c == 3) {
                // trame de température
                //echo date('d/M/Y h:i:s', $dateTime);
                addTestBulkPilote($_SESSION["id"], 0, 0, $v/100, 0, $dateTime);
            }
        }*/

    }
}

?>