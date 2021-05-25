<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="/design/css/Style_First_Sig_In.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>CGU</title>
</head>
<body>
<?php
include "views/doctor/doctorHeader.php";
?>
le texte de mes cgu pour le medecin
<br/>
<form method="post" action="process-cgu">
    <p>Veuillez accepter les dernières <a href='CGU.html'>conditions d'utilisations</a>
    <input type="checkbox" id="cgu" name="cgu" required>
    <br/>
    <button type="submit">Envoyer</button>
</form>
</body>
</html>