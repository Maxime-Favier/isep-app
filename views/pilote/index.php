<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pilote</title>
    <link href="/design/css/Style_page_pilote.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<?php
include "views/common/headerPilote.php";
?>

<h1>Interface pilote</h1>
<br/>
<?php
echo $_SESSION['name'] . " - " . $_SESSION["firstName"] . " - " . $_SESSION['email'] . " - " . $_SESSION["role"];
?>
<br/>
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
<h1>Liste des derniers tests :</h1>
<div class="tableau">
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
</div>

<br/>
<form method="post" action="index">
    <label for="searchUsers">Date du test recherché:</label>
    <input type="search" name="searchUsers" id="searchUsers"/>
</form>


<table>
    <?php
    if (isset($_POST['searchUsers'])) {

        require_once('controllers/pilote/piloteController.php');
        $tableau = processPilotSearchTest();
        $compteur = count($tableau);//count return n+1 ou n est le nombre d'élément du tableau
        if ($compteur != 1) {
            ?>
            <tr>
                <th>Date</th>
                <th>Temps de réaction au son (ms)</th>
                <th>Temps de réaction à la lumière (ms)</th>
                <th>Temperature (C)</th>
                <th>Pulsations cardiaques par minute</th>
            </tr>
            <?php
            for ($i = 1; $i < $compteur; $i++) {

                ?>

                <tr>
                    <td><?php echo $tableau[$i][1]; ?></td>
                    <td><?php echo $tableau[$i][2]; ?></td>
                    <td><?php echo $tableau[$i][3]; ?></td>
                    <td><?php echo $tableau[$i][4]; ?></td>
                    <td><?php echo $tableau[$i][5]; ?></td>
                </tr>

            <?php }
        } else {
            echo "Aucun de résultat";
        }

    } else {

    }
    ?>
</table>

<img src="/design/img/Test.png"><a href="addTest"><h2>Faire un nouveau test</h2></a>
<?php
include "views/common/footer.php";
?>
</body>
</html>
