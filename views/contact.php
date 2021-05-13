<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/design/css/Style_Contact.css">
    <title>Contact</title>
</head>
<body>
<?php
include "common/headerLogin.php";
?>

<section class='formulaire'>
    <h1>Contacter le support</h1>
    <form action="send-message" method="post">
        <label type='text' for='object'>Email</label> : <input name="contact-email" type='text' id='object'><br/>
        <label type='message' for='message'>Message</label> : <input name="email-body" type='message' id='message'><br/><br/>
        <input name='2' class='button' type='Submit' value='Envoyer'>
    </form>
</section>

<?php
include "common/footer.php";
?>

</body>
</html>