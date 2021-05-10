<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>edition profile</title>
</head>
<body>

<?php

?>

<?php
    if(isset($_GET['deleteUser'])and isset($_GET['typeOfUser'])){
    require_once("models/delete-user.php");
    deleteUser($_GET['typeOfUser'],$_GET['piloteId']);
    echo "Compte supprimé";?><a href = 'index'>Retour à l'accueil</a><?php
    }
else {

    require_once("models/doctor/get-pilote.php");
    $infoUserreq = getInfoUser($_GET['piloteId']);
    $infoUser = $infoUserreq->fetch();
    echo $infoUser["name"] . " - " . $infoUser['firstName'] . " - " . $infoUser["email"] . " - " . $infoUser["address"]."<br/>";

    ?>
    Edition du profil<br/>

    <a href="index">Retour</a><br/>

        <form action="submit-profile-pilot" method="post">
        <label for="fnom">Nom:</label><br>
        <input type="text" id="fnom" name="name" required value="<?php echo $infoUser["name"] ; ?>"><br>

        <label for="ffistName">Prénom:</label><br>
        <input type="text" id="ffistName" name="firstName" required value="<?php echo $infoUser['firstName'] ; ?>"><br>

        <label for="faddress">adresse:</label><br>
        <input type="text" id="faddress" name="address" required value="<?php echo $infoUser["address"] ; ?>"><br>

        <label for="fmail">Email:</label><br>
        <input type="email" id="fmail" name="email" required value="<?php echo $infoUser["email"]; ?>"><br>

        <label for="fpassw">Mot de passe:</label><br>
        <input type="password" id="fpassw" name="password" required>

        <input type = 'hidden' id = "piloteId" name = "piloteId" value="<?php echo $_GET["piloteId"]; ?>"/>

        <br/>
        <button type="submit">Envoyer</button>

        <a href = "editUsers?deleteUser=true&piloteId=<?php echo $_GET['piloteId'];?>&typeOfUser=<?php echo $_GET['typeOfUser'] ; ?>"> supprimer le compte </a>

        </form>




        <?php

    }

    ?>


</body>
</html>