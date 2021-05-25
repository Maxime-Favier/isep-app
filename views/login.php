<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="/design/css/Sign_in.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<?php
include "common/headerLogin.php";
?>
<div id="body">
<section class='formulaire'>
    <h1>Connexion</h1>
    <form method='post' action='login-process'>
        <label type='text' for='email'>Email</label> : <input name='email' type='email' id='email'><br/>
        <label type='password' for='password'>Mot de passe</label> : <input name='password' type='password'
                                                                            id='password'><br/>
        <a href="contact"><p>Mot de passe oublié ?</p></a>
        <?php
        if (isset($_GET["bad"])) {
            ?><p>Email ou Mot de passe incorrect : En cas d'oubli contactez l'administrateur</p>
            <?php
        }
        ?>
        <input name='2' class='button' type='submit' value='Envoyer'>
    </form>

</section>
</div>
<?php
include "common/footer.php"
?>
</body>
</html>