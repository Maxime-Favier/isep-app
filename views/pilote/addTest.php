<?php
//header('Access-Control-Allow-Origin: maxime1.favier.free.fr');
//header('Access-Control-Allow-Methods: GET, POST');
//header("Access-Control-Allow-Headers: X-Requested-With");
//header("Access-Control-Allow-Origin")
?>
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
        <label name="lumiere" for="fRTimeL">Temps de réaction à un signal lumineux (ms) : </label>
        <input type="number" id="fRTimeL" name="RTimeL" step=any required><br>

        <label name="son" for="fRTimeS">Temps de réaction à un stimulus sonore (ms) : </label>
        <input type="number" id="fRTimeS" name="RTimeS" step=any required><br>

        <label name="tempe" for="fTempe">Température corporelle (C°) : </label>
        <input type="number" id="fTempe" name="Tempe" step=any required><br>

        <label name="freq" for="fHB">Fréquence cardiaque (bpm)</label>
        <input type="number" id="fHB" name="HB" step=any required><br>

        <br/>
        <input type="submit" value="Envoyer"/>
    </form>
    <form action="index">
        <input name="return" type="submit" value="Retour">
    </form>

    <form action="submit-getpasserelle" method="post">
        <h1>Ajouter à partir de la passerelle isep</h1>
        <div>
            <label name="neq" for="fneq">Numero d'équipe</label>
            <input type="number" id="fneq" name="neq" min="0" max="9999" value="9999"><br/>
            <input type="submit" value="récupérer les trames">
        </div>
        <br/>
    </form>
    <form action="submit-passerelle" method="post">
        <label for="ftrames">Trames de la passerelle</label><br/>
        <textarea name="trames" id="ftrames" rows="10" cols="200" required>
            <?php echo $_SESSION["trames"]; ?>
        </textarea>
        <br/><br/>
        <input type="submit" value="Envoyer"/>
    </form>
    <div>
        <?php
        include "views/common/footer.php";
        ?>
</body>
</html>