<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Information pilote</title>
</head>
<body>
Information du <?php if ($_GET['typeOfUser']=='doctor'){echo 'docteur'; }else{ echo 'pilote'; } ?>
<br/>
<a href="index">Retour</a>
<br/>

<?php
require_once("models/admin/InfoUser.php");
$infoUserreq = getInfoUser($_GET["userId"]);
$infoUser = $infoUserreq->fetch();
echo $infoUser["name"] . " - " . $infoUser['firstName'] . " - " . $infoUser["email"] . " - " . $infoUser["address"]."<br/>";

?>
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
            <th>React Time L</th>
            <th>React Time S</th>
            <th>temperature</th>
            <th>HB</th>
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


<table>

    <?php

    if($patient){
        ?>
        <?php echo "<br/>Liste des patients du docteur ".$infoUser["name"]?>
        Les derniers test des patients du docteur <?php echo $infoUser["name"]?>


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
        echo "<br/>Le docteur n'a pas de patients";
    }

    ?>
<a href ="editUsers?userId=<?php echo $_GET["userId"];?>&typeOfUser=<?php  echo $_GET['typeOfUser'];  ?> ">gestion du profil</a>

<?php }else{
    //Sinon c'est un pilote
    ?>

    <?php
    //INFO SUR LE DOCTEUR DU PILOTE
    require_once("models/pilote/get-docInfo.php");
    $docInfo = getDocteurInfo($infoUser['id']);
    $result = $docInfo->fetch();
    if ($result) {
        echo "Médecin associer à Mr. ".$infoUser['name']." : <br/>";
        echo $result["name"] . " " . $result["firstName"] . " - " . $result["email"] . " - " . $result["address"]."<br/>";
    }
    ?>
    <a href ="editUsers?userId=<?php echo $_GET["userId"];?>&typeOfUser=<?php  echo $_GET['typeOfUser'];  ?> ">gestion du profil</a>
    <br/> Derniers test effectués
    <table>
        <tr>
            <th>date</th>
            <th>reaction lumiere</th>
            <th>reaction son</th>
            <th>temperature peau</th>
            <th>Rythme cardique</th>
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

</table>

</body>
</html>