<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact</title>
</head>
<body>
formulaire de contact
<form action="send-message" method="post">
    <label for="contact-email">Votre Email</label><br/>
    <input type="email" name="contact-email" id="contact-email" required/><br/>
    <label for="email-body">Votre message</label><br/>
    <textarea name="email-body" id="email-body" required></textarea><br/>
    <button type="submit">Envoyer</button>
</form>
</body>
</html>