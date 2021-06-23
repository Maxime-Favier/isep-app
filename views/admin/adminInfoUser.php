<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="/design/css/Style_page-doc.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Information utilisateur</title>
</head>
<body>

<?php
include "adminHeader.php";
?>
<div id="corps">

    <h1>Information du <?php if ($_GET['typeOfUser']=='doctor'){echo 'docteur'; }else{ echo 'pilote'; } ?></h1>

    <?php
    require_once("models/admin/InfoUser.php");
    $infoUserreq = getInfoUser($_GET["userId"]);
    $infoUser = $infoUserreq->fetch();
    ?>
    <div id="infos">
        <p>Email : <?php echo $infoUser["email"]; ?></p>
        <p>Nom : <?php echo $infoUser["name"]; ?></p>
        <p>Prénom : <?php echo $infoUser["firstName"]; ?></p>
        <p>Adresse : <?php echo $infoUser["address"]; ?></p>
        <div id="modif">
            <a href ="editUsers?userId=<?php echo $_GET["userId"];?>&typeOfUser=<?php  echo $_GET['typeOfUser'];  ?> "><img src="/design/img/edit.png" alt="edit" id="edit">Editer le profil</a>
        </div>
    </div>
    <?php

if($_GET['typeOfUser']=='doctor'){
    // L'utilisateur est un docteur
    ?>
<?php
require_once("models/doctor/get-pilotes.php");
$Userreq = getPilotes($infoUser["id"]);
$patient = $Userreq->fetch();
if($patient){
    ?> <table>
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Date</th>
            <th>Temps de réaction au son (ms)</th>
            <th>Temps de réaction à la lumière (ms)</th>
            <th>Temperature (C)</th>
            <th>Pulsations cardiaques par minute</th>
        </tr>
        <?php
        require_once("models/doctor/getLatestTest.php");
        $pilotesTests = getDocterLatestTest($infoUser["id"]);
        while ($test = $pilotesTests->fetch()) {
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
        }
        ?>
    </table> <?php
}

?>

    <?php

    if($patient){
        ?>
        <?php echo "<br/><h1>Liste des patients du docteur ".$infoUser["name"]."</h1>"?>

    <table>
        <tr>
            <th>Nom</th>
            <th>Prénon</th>
            <th>Email</th>
        </tr> <?php
        while ($patient) {
            ?>
            <tr>
                <td><a href="infoPilote?piloteId=<?php echo $patient["piloteId"]; ?>"><?php echo $patient["name"]; ?></a></td>
                <td><?php echo $patient["firstName"]; ?></td>
                <td><?php echo $patient["email"]; ?></td>
            </tr>
            <?php $patient = $Userreq->fetch();
        }
    }else{
        echo "<br/><div class = 'body'><p>Le docteur n'a pas de patients</p></div>";
    }

    ?>
    </table>
<?php }else{
    //Sinon c'est un pilote
    ?>

    <?php
    //INFO SUR LE DOCTEUR DU PILOTE
    require_once("models/pilote/get-docInfo.php");
    $docInfo = getDocteurInfo($infoUser['id']);
    $result = $docInfo->fetch();
    if ($result) {
        ?>

        <div id="infos">
            <h2>Information du Médecin associé</h2>
            <p>Email : <?php echo $result["email"]; ?></p>
            <p>Nom : <?php echo $result["name"]; ?></p>
            <p>Prénom : <?php echo $result["firstName"]; ?></p>
            <p>Adresse : <?php echo $result["address"]; ?></p>
            <div id="modif">
                <a href ="editUsers?userId=<?php echo $result["doctorId"];?>&typeOfUser=doctor"><img src="/design/img/edit.png" alt="edit" id="edit">Editer le profil</a>
            </div>
        </div>
        <?php
    }
    ?>
    <h1>Derniers tests des pilotes de <?php echo $infoUser['name'].' '.$infoUser['firstName'];?></h1>
    <table>
        <tr>
            <th>Date</th>
            <th>Temps de réaction au son (ms)</th>
            <th>Temps de réaction à la lumière (ms)</th>
            <th>Temperature (C)</th>
            <th>Pulsations cardiaques par minute</th>
        </tr>
        <?php
        require_once('models/pilote/getLastTest.php');
        $latestTest = getLatestTest($_GET['userId']);
        while ($test = $latestTest->fetch()) {
            ?>
            <tr>
                <td><?php echo $test["date"]; ?></td>
                <td><?php echo $test["reactTimeL"]; ?></td>
                <td><?php echo $test["reactTimeS"]; ?></td>
                <td><?php echo $test["temperature"]; ?></td>
                <td><?php echo $test["hearBeat"]; ?></td>
            </tr>
            <?php
        }
        ?>
    </table>
    <?php
}

?>

<br/>
    <form action = "index">
        <input name="return" type="submit" value="Retour">
    </form>
<br/>

</div>

<?php
include "views/common/footer.php";
?>
</body>

</html>