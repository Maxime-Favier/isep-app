<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="/design/css/Style_Edit_Profile.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Edition du profil</title>
</head>
<body>

<?php
include "views/admin/adminHeader.php";
?>


<form action="submit-profile" method="post">
    <p>
    <h1>Edition de profil</h1>
    <label name = 'name' type ="name" for="fnom">Nouveau nom</label> : <input type="text" id="fnom" name="name" required value="<?php echo $_SESSION["name"]; ?>"></br>

    <label name = 'firstname' type='firstname' for="ffistName">Nouveau prénom : </label><input type="text" id="ffistName" name="firstName" required value="<?php echo $_SESSION["firstName"]; ?>"><br/>

    <label name = 'address' type="address" for="faddress">Nouvelle adresse : </label><input type="text" id="faddress" name="address" required value="<?php echo $_SESSION["address"]; ?>"><br/>

    <label name = 'email' type='email' for="fmail">Changement d'email : </label><input type="text" id="fmail" name="email" required value="<?php echo $_SESSION["email"]; ?>"><br/>

    <label name = 'password' type='password'  for='fpassw'>Nouveau mot de passe : </label><input name = 'password' type ='password' id = 'password' required><br/>

    <input name ="2" type="submit" value = 'Envoyer'><br/>
    </p>

</form>

<form action = "index">
    <input name="return" type="submit" value="Retour">
</form>

<?php
include "views/common/footer.php";
?>
</body>
</html>
