<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="/design/css/Style_Edit_Profile.css" rel="stylesheet"/>
    <title>Ajouter un test</title>
</head>
<body>
<?php
include "views/common/headerPilote.php";
?>
<div class="body">

<form action="submit-addTest" method="post">
    <h1>Ajouter les resultats de tests</h1>
    <label name = "lumiere" for="fRTimeL">Temps de réaction à un signal lumineux (ms) : </label>
    <input type="number" id="fRTimeL" name="RTimeL" step=any required><br>

    <label name = "son" for="fRTimeS">Temps de réaction à un stimulus sonore (ms) : </label>
    <input type="number" id="fRTimeS" name="RTimeS" step=any required><br>

    <label name = "tempe" for="fTempe">Température corporelle (C°) : </label>
    <input type="number" id="fTempe" name="Tempe" step=any required><br>

    <label name = "freq" for="fHB">Fréquence cardiaque (bpm)</label>
    <input type="number" id="fHB" name="HB" step=any required><br>

    <br/>
    <input type="submit" value = "Envoyer"/>
</form>
<form action = "index">
    <input name="return" type="submit" value="Retour">
</form>
<div>
<?php
include "views/common/footer.php";
?>
</body>
</html>