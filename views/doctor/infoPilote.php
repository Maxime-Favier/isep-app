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
Information pilote
<br/>
<a href="index">Retour</a>
<br/>
<?php
require_once("models/doctor/infoPilote.php");
$infoPilotereq = getInfoPilote($_GET["piloteId"]);
$infoPilote = $infoPilotereq->fetch();
echo $infoPilote["name"] . " - " . $infoPilote['firstName'] . " - " . $infoPilote["email"] . " - " . $infoPilote["address"]
//echo $_GET["piloteId"];
?>

<a href ="editPilot?typeOfUser=pilote&piloteId=<?php echo $_GET["piloteId"]; ?>">gestion du profil</a>

<table>
    <tr>
        <th>Date</th>
        <th>React Time L</th>
        <th>React Time S</th>
        <th>temperature</th>
        <th>HB</th>
    </tr>
    <?php
    require_once('models/doctor/getTestFromPilote.php');
    $testsreq = getTestResultFromPilote($_GET["piloteId"]);
    while ($test = $testsreq->fetch()) {
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

</body>
</html>