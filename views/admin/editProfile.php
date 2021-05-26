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


<form action="submit-profile" method="post">
    <p>
    <h1>Edition de profil</h1>
    <label type="name" for="fnom">Nom</label> :
    <input type="text" id="fnom" name="name" required value="<?php echo $_SESSION["name"]; ?>"><br/>

    <label type='firstname' for="ffistName">Prénom</label> :
    <input type="text" id="ffistName" name="firstName" required value="<?php echo $_SESSION["firstName"]; ?>"><br/>

    <label type="address" for="faddress">adresse</label> :
    <input type="text" id="faddress" name="address" required value="<?php echo $_SESSION["address"]; ?>"><br/>

    <label type='email' for="fmail">Email</label> :
    <input type="email" id="fmail" name="email" required value="<?php echo $_SESSION["email"]; ?>"><br/>

    <label type='password' for="fpassw">Mot de passe</label> :
    <input type="password" id="fpassw" name="password" required>
    <br/>
    <input name="2" type="submit" value='Envoyer'>
    </p>

</form>

<input name="delete" type="submit" value="Supprimer le compte">
<a href="index">Retour</a><br/>

<?php
include "views/common/footer.php";
?>
</body>
</html>
