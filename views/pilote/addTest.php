<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ajouter un test</title>
</head>
<body>
Ajouter les resultats de tests
<form action="submit-addTest" method="post">
    <label for="fRTimeL">ReactTime L:</label><br>
    <input type="number" id="fRTimeL" name="RTimeL" step=any required><br>

    <label for="fRTimeS">ReactTime S:</label><br>
    <input type="number" id="fRTimeS" name="RTimeS" step=any required><br>

    <label for="fTempe">température:</label><br>
    <input type="number" id="fTempe" name="Tempe" step=any required><br>

    <label for="fHB">hearth Beat:</label><br>
    <input type="number" id="fHB" name="HB" step=any required><br>

    <br/>
    <button type="submit">Envoyer</button>
</form>
</body>
</html>