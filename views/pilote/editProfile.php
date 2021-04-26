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
Edition du profil<br/>

<a href="index">Retour</a><br/>

<form action="submit-profile" method="post">
    <label for="fnom">Nom:</label><br>
    <input type="text" id="fnom" name="name" required value="<?php echo $_SESSION["name"]; ?>"><br>

    <label for="ffistName">Prénom:</label><br>
    <input type="text" id="ffistName" name="firstName" required value="<?php echo $_SESSION["firstName"]; ?>"><br>

    <label for="faddress">adresse:</label><br>
    <input type="text" id="faddress" name="address" required value="<?php echo $_SESSION["address"]; ?>"><br>

    <label for="fmail">Email:</label><br>
    <input type="email" id="fmail" name="email" required value="<?php echo $_SESSION["email"]; ?>"><br>

    <label for="fpassw">Mot de passe:</label><br>
    <input type="password" id="fpassw" name="password" required>

    <br/>
    <button type="submit">Envoyer</button>
</form>
</body>
</html>
