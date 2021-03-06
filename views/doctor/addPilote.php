<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="/design/css/Style_create_pilote.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Ajouter pilote</title>
</head>
<body>
<?php
include ("views/doctor/doctorHeader.php");
?>

<h1>Création d'un compte Pilote</h1>
<br/>
<form action="submit-addPilote" method="post">
    <label type = name for="fnom">Nom</label> :
    <input type="text" id="fnom" name="name" required"><br>

    <label type = firstname for="ffistName">Prénom</label> :
    <input type="text" id="ffistName" name="firstName" required><br>

    <label type = address for="faddress">adresse</label> :
    <input type="text" id="faddress" name="address" required><br>

    <label type = email for="fmail">Email</label> :
    <input type="email" id="fmail" name="email" required><br>

    <label type = password for="fpassw">Mot de passe</label> :
    <input type="password" id="fpassw" name="password" required minlength="8">

    <br/>
    <input name ="2" type="submit" value="Envoyer"><br/>
    <form action = "index">
        <input name="return" type="submit" value="Retour">
    </form>
</form>
<?php
include ("views/common/footer.php");
?>
</body>
</html>