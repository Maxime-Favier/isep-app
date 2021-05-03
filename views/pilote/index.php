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
<header>
    <figure class="BlocIcon">
        <img class="Icon" src="/design/img/Infinite_measures.gif"/>
    </figure>
    <img src="/design/img/Message.jpg" class="far fa-envelope"></img>
    <div class="blockbutton">
        <?php if (isset($_SESSION['name'])) {
            echo $_SESSION['name'] . '<a href="" class = "button2"><span></span><i class="fa fa-user"></i></a>';
        } else {
            echo "<a href='' class = 'button2'><span>MENU</span><i class='fa fa-gear'></i></a>";
        }; ?>

    </div>

</header>
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
<a href="../messaging/index">messaging</a>
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
            <th>date</th>
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
<img src="/design/img/Test.png"><a href="addTest"><h2>Faire un nouveau test</h2></a>
<footer>
    <a class="foot">Infinite Measure</a>
    <p style="display: inline">|</p>
    <a class="foot">Contact</a>
    <p style="display: inline">|</p>
    <a class="foot">FAQ</a>
    <p style="display: inline">|</p>
    <a class="foot">CGU</a>
</footer>
</body>
</html>
