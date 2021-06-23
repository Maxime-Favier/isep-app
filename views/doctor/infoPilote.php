<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="/design/css/Style_page_pilote.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Information pilote</title>
</head>
<body>

<?php
if ($_SESSION['role'] == "admin"){
    include "views/admin/adminHeader.php";
}elseif($_SESSION['role'] == "doctor"){
    include "views/doctor/doctorHeader.php";
}else{
    include "views/common/headerLogin.php";
}
?>
<div id="corps">


<?php

require_once("models/doctor/infoPilote.php");
$infoPilotereq = getInfoPilote($_GET["piloteId"]);
$infoPilote = $infoPilotereq->fetch();
?>
    <h1>Informations de <?php echo $infoPilote['name']." ".$infoPilote['firstName']?></h1>

    <div id="infos">
        <p>Email : <?php echo $infoPilote["email"]; ?></p>
        <p>Nom : <?php echo $infoPilote["name"]; ?></p>
        <p>Prénom : <?php echo $infoPilote["firstName"]; ?></p>
        <p>Adresse : <?php echo $infoPilote["address"]; ?></p>
        <div id="modif">
            <a href ="editPilot?piloteId=<?php echo $_GET["piloteId"];?>"><img src="/design/img/edit.png" alt="edit" id="edit">Editer le profil</a>
        </div>
    </div>

<?php

?>
    <h1>Liste des derniers tests de <?php echo $infoPilote['name']." ".$infoPilote['firstName']?></h1>
<table>
    <tr>
        <th>Date</th>
        <th>Temps de réaction au son (ms)</th>
        <th>Temps de réaction à la lumière (ms)</th>
        <th>Temperature (C)</th>
        <th>Pulsations cardiaques par minute</th>
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