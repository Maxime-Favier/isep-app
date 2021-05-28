<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ajouter un test</title>
    <link rel="stylesheet" href="/design/css/Style_page_pilote.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<?php
include "views/common/headerPilote.php";
?>
<body>

<h1>Ajouter les resultats d'un test</h1>
<form action="submit-addTest" method="post" style="margin-left: 5%">
    <label for="fRTimeL">Temps de réaction lumière:</label><br>
    <input type="number" id="fRTimeL" name="RTimeL" step=any required><br>

    <label for="fRTimeS">Temps de réaction son:</label><br>
    <input type="number" id="fRTimeS" name="RTimeS" step=any required><br>

    <label for="fTempe">Température:</label><br>
    <input type="number" id="fTempe" name="Tempe" step=any required><br>

    <label for="fHB">Rythme cardiaque:</label><br>
    <input type="number" id="fHB" name="HB" step=any required><br>

    <br/>
    <button type="submit">Envoyer</button>
</form>
<?php
include "views/common/footer.php";
?>
</body>
</html>