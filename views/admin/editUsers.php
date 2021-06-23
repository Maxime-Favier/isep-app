<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="/design/css/Style_Edit_Profile.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>edition du profil</title>
</head>
<body>

<?php
include "views/admin/adminHeader.php";
?>

<?php
    if(isset($_GET['deleteUser'])and isset($_GET['typeOfUser'])){
    require_once("models/delete-user.php");
    deleteUser($_GET['typeOfUser'],$_GET['userId']);
    echo "Compte supprimé";?>
        <form action = "index">
            <input name="return" type="submit" value="Retour">
        </form>
        <?php
    }
else {

    require_once("models/admin/InfoUser.php");
    $infoUserreq = getInfoUser($_GET["userId"]);
    $infoUser = $infoUserreq->fetch();
    ?>
    <h1>Edition du profil<br/></h1>

        <form action="submit-profile-user" method="post">
        <label name = 'name' type ="nom" for="fnom">Nouveau nom</label> :
        <input  id="fnom" name="name" required value="<?php echo $infoUser["name"] ; ?>"><br>

        <label name = 'firstname' type = "firstName" for="ffistName">Nouveau prénom</label> :
        <input  id="ffistName" name="firstName" required value="<?php echo $infoUser['firstName'] ; ?>"><br>

        <label name = 'address' type = "address" for="faddress">Nouvelle adresse</label> :
        <input  id="faddress" name="address" required value="<?php echo $infoUser["address"] ; ?>"><br>

        <label name = 'email' type = "email" for="fmail">Changement d'email</label> :
        <input  id="fmail" name="email" required value="<?php echo $infoUser["email"]; ?>"><br>

        <label name = 'password' type = "password" for="fpassw">Nouveau mot de passe</label> :
        <input type="password" id="fpassw" name="password" required>

        <input type = 'hidden' id = "userId" name = "userId" value="<?php echo $_GET["userId"]; ?>"/>

        <br/>
        <input name ="2" type="submit" value = 'Envoyer'>
        <br/>
        </form>

        <form action="editUsers?deleteUser=true&userId=<?php echo$_GET['userId'];?>&typeOfUser=<?php echo $_GET['typeOfUser'] ; ?>" method = 'post'>
            <input name="delete" type="submit" value="Supprimer le compte"><br/>
        </form>

        <form action = "index">
            <input name="return" type="submit" value="Retour">
        </form>

        <?php

    }
    include"views/common/footer.php";
    ?>
</body>
</html>