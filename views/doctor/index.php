<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="/design/css/Style_page-doc.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Docteur</title>
</head>
<body>
<?php
    include("views/doctor/doctorHeader.php");
?>
<br/>

<br/>

<div id="body">
    <?php
    echo "<p><h1>Bienvenue ".$_SESSION['name'] . " " . $_SESSION["firstName"] . " </h1></p>" ;
    ?>
    <a id="add" href="addPilote"><img src="/design/img/plus.png" class="plus">Créer un nouveau profil Pilote</a>
<table>
    <h1> Liste de mes patients</h1>
    <tr>
        <th>Nom</th>
        <th>Prénon</th>
        <th>Email</th>
    </tr>
    <?php
    require_once("models/doctor/get-pilotes.php");
    $pilotereq = getPilotes($_SESSION["id"]);
    while ($patient = $pilotereq->fetch()) {
        ?>
        <tr>
            <td><a href="infoPilote?piloteId=<?php echo $patient["piloteId"]; ?>"><?php echo $patient["name"]; ?></a>
            </td>
            <td><?php echo $patient["firstName"]; ?></td>
            <td><?php echo $patient["email"]; ?></td>
        </tr>
        <?php
    }
    ?>
</table>

    <table>


        <?php
        require_once("models/doctor/getLatestTest.php");
        $pilotesTests = getDocterLatestTest($_SESSION["id"]);
        if($test = $pilotesTests->fetch()){
            ?>

            <h1>Derniers tests de mes pilotes</h1>

            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Date</th>
                <th>Temps de réaction à la lumière (ms)</th>
                <th>Temps de réaction au son (ms)</th>
                <th>Temperature (C)</th>
                <th>Pulsations cardiaques par minute</th>
            </tr>

            <?php
            while ($test) {
                ?>
                <tr>
                    <td><a href="infoPilote?piloteId=<?php echo $test["id"]; ?>"> <?php echo $test["name"]; ?></a></td>
                    <td><?php echo $test["firstName"]; ?></td>
                    <td><?php echo $test["date"]; ?></td>
                    <td><?php echo $test["reactTimeL"]; ?></td>
                    <td><?php echo $test["reactTimeS"]; ?></td>
                    <td><?php echo $test["temperature"]; ?></td>
                    <td><?php echo $test["hearBeat"]; ?></td>

                </tr>
                <?php

                $test = $pilotesTests->fetch();
            }

        }else{
            echo "<h1>Vos pilotes n'ont encore effectué aucun test<h1>";
        } ?>


    </table>


<form method="post" action="index">
    <h1>Rechercher un patient</h1>
    <label for="searchUsers">Nom ou prénom:</label>
    <input type="search" name="searchUsers" id="searchUsers"/><input name ="search" type="Submit" class="button" value="Rechercher">

</form>

<table>

    <?php
    if (isset($_POST['searchUsers'])) {

        require_once('controllers/doctor/doctorController.php');
        $tableau = processDoctorSearchUsers();
        $compteur = count($tableau);//count return n+1 ou n est le nombre d'élément du tableau
        if ($compteur != 1) {
            ?>

            <tr>
                <th>Nom</th>
                <th>Prénom</th>
            </tr>

            <?php
            for ($i = 1; $i < $compteur; $i++) {

                ?>

                <tr>
                    <td><a href="infoPilote?piloteId=<?php echo $tableau[$i][5]; ?>"><?php echo $tableau[$i][1]; ?></a>
                    </td>
                    <td><a href="infoPilote?piloteId=<?php echo $tableau[$i][5]; ?>"><?php echo $tableau[$i][2]; ?></a>
                    </td>
                </tr>

            <?php }
        } else {
            echo "Aucun de résultat";
        }

    } else {

    }

    ?>

</table>

</div>
<?php
include "views/common/footer.php";
?>
</body>

</html>
