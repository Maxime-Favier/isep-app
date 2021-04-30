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
<header>


    <figure class = "BlocIcon">
        <img class = "Icon" src = "/design/img/Logo.png"/>
    </figure>
    <div class = "blockbutton">
        <?php if(isset($_SESSION['name'])){
            echo $_SESSION['name'].'<a href="" class = "button2"><span></span><i class="fa fa-user"></i></a>';
        }else{
            echo"<a href='' class = 'button2'><span>MENU</span><i class='fa fa-gear'></i></a>";
        }; ?>
    </div>
</header>
<section class = 'formulaire'>
    <h1>Connexion</h1>
    <form action="login-process" method="post">
        <label for="fmail">Email:</label>
        <input type="email" id="fmail" name="email" required><br/>
        <label for="fpassw">Mot de passe:</label>
        <input type="password" id="fpassw" name="password" required><br/>
        <br/>
        <button type="submit">Envoyer</button>
    </form>
    <?php
    if(isset($_GET["bad"])){
        ?><p>Email ou Mot de passe incorrect : En cas d'oubli contactez l'administrateur</p>
    <?php
    }
    ?>
    <br/>
    <a href="/">Home</a>


</section>
<footer>
    <a class = "foot">Infinite Measure</a>
    <p style="display: inline">|</p>
    <a class = "foot" >Contact</a>
    <p style="display: inline">|</p>
    <a class = "foot">FAQ</a>
    <p style="display: inline">|</p>
    <a class = "foot">CGU</a>
</footer>




</body>
</html>