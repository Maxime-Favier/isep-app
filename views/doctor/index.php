<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Docteur</title>
</head>
<body>
interface docteur
<br/>
<?php
echo $_SESSION['name'] . " - " . $_SESSION["firstName"] . " - " . $_SESSION['email'] . " - " . $_SESSION["role"];
?>
<br/>
<a href="../logout">logout</a>
<br/>
<a href="editProfile">editProfile</a>
<br/>
<a href="addPilote">addPilote</a>
<br/>
Les derniers test de mes patients
<table>
    <tr>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Date</th>
        <th>Réaction au son (ms)</th>
        <th>Réaction à la lumière (ms)</th>
        <th>Temperature (C)</th>
        <th>Pulsations cardiaques par minute</th>
    </tr>
    <?php
    require_once("models/doctor/getLatestTest.php");
    $pilotesTests = getDocterLatestTest($_SESSION["id"]);
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
</table>
<br/>
Mes patients
<table>
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
            <td><a href="infoPilote?piloteId=<?php echo $patient["piloteId"]; ?>"><?php echo $patient["name"]; ?></a></td>
            <td><?php echo $patient["firstName"]; ?></td>
            <td><?php echo $patient["email"]; ?></td>
        </tr>
        <?php
    }
    ?>
</table>
</body>
</html>
<?php
?>
