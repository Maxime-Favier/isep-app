<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pilote</title>
</head>
<body>
interface pilote
<br/>
<?php
echo $_SESSION['name'] . " - " . $_SESSION["firstName"] . " - " . $_SESSION['email'] . " - " . $_SESSION["role"];
?>
<br/>
<a href="../logout">logout</a>
<br/>
<a href="editProfile">editProfile</a>
<br/>
<a href="addTest">Add test</a>
<br>
Info medecin<br/>
<?php
require_once("models/pilote/get-docInfo.php");
$docInfo = getDocteurInfo($_SESSION['id']);
$result = $docInfo->fetch();
if ($result) {
    echo $result["name"] . " " . $result["firstName"] . " - " . $result["email"] . " - " . $result["address"];
}
?>
<br/>
mes derniers test
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
$latestTest = getLatestTest($_SESSION['id']);
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
</body>
</html>
