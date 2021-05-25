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
if($_SESSION['role']=="admin"){
    include "views/admin/adminHeader.php";
}elseif($_SESSION['role']=="doctor"){
    include "views/doctor/doctorHeader.php";
}

?>

<?php
if(isset($_GET['deleteUser'])and isset($_GET['typeOfUser'])){
    require_once("models/delete-user.php");
    deleteUser($_GET['typeOfUser'],$_GET['piloteId']);
    echo "Compte supprimé";?><a href = 'index'>Retour à l'accueil</a><?php
}
else {

    require_once("models/admin/InfoUser.php");
    $infoUserreq = getInfoUser($_GET["piloteId"]);
    $infoUser = $infoUserreq->fetch();
    ?>
    <h1>Edition du profil<br/></h1>



    <form action="submit-profile-user" method="post">
        <label type ="nom" for="fnom">Nom</label> :
        <input type="text" id="fnom" name="name" required value="<?php echo $infoUser["name"] ; ?>"><br>

        <label type = "firstName" for="ffistName">Prénom</label> :
        <input type="text" id="ffistName" name="firstName" required value="<?php echo $infoUser['firstName'] ; ?>"><br>

        <label type = "address" for="faddress">adresse</label> :
        <input type="text" id="faddress" name="address" required value="<?php echo $infoUser["address"] ; ?>"><br>

        <label type = "email" for="fmail">Email</label> :
        <input type="email" id="fmail" name="email" required value="<?php echo $infoUser["email"]; ?>"><br>

        <label type = "password" for="fpassw">Mot de passe</label> :
        <input type="password" id="fpassw" name="password" required>

        <input type = 'hidden' id = "piloteId" name = "piloteId" value="<?php echo $_GET["piloteId"]; ?>"/>

        <br/>
        <input name ="2" type="submit" value = 'Envoyer'>
        <br/>
        <a href = "editUsers?deleteUser=true&piloteId=<?php echo$_GET['piloteId'];?>&typeOfUser=<?php echo $_GET['typeOfUser'] ; ?>"> suprimer le compte </a>

    </form>




    <?php

}

?>


</body>
</html>