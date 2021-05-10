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
<a href="addPilote">addPilot</a>
<br/>
<a href="../messaging/index">messaging</a>
<br/>

<table>
    <p>Les derniers test de mes patients</p>
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

<table>
    <p>Mes patients</p>
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


<br/>

<form method="post" action="index">
    <label for="searchUsers">Nom ou prénom:</label>
    <input type="search" name="searchUsers" id="searchUsers"/>

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
                    <th><a href="infoPilote?piloteId=<?php echo $tableau[$i][5]; ?>"><?php echo $tableau[$i][1]; ?></a>
                    </th>
                    <th><a href="infoPilote?piloteId=<?php echo $tableau[$i][5]; ?>"><?php echo $tableau[$i][2]; ?></a>
                    </th>
                </tr>

            <?php }
        } else {
            echo "Aucun de résultat";
        }

    } else {

    }

    ?>
</table>
</body>
</html>
