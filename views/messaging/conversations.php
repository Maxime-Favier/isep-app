<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Conversation</title>
</head>
<body>
Mes conversations
<div>
    <?php
    include_once("models/messaging/get-conversation.php");
    include_once("models/messaging/getNameFromId.php");
    $conversationRq = getConversation($_SESSION['id']);
    while ($conversation = $conversationRq->fetch()) {
        ?>
        <p>
            <a href="seeConversation?cid=<?php echo $conversation["id"]; ?>"> <?php echo $conversation["object"]; ?></a><br/>
            <?php
            $name = getNameFromId($conversation["expeditor"]);
            echo $name["firstName"] . " " . $name["name"] . ", ";
            $name2 = getNameFromId($conversation["recipient"]);
            echo $name2["firstName"] . " " . $name2["name"];
            ?>
        </p>
        <?php
    }
    ?>
</div>
<br/>
Ajouter une conversation
<form method="post" action="add-conversation">
    <label for="destination">Choisir un destinataire</label>
    <select name="dest" id="destination">
        <?php
        include_once("models/messaging/getAvailableRecipient.php");
        getAvailableRecipient($_SESSION["role"], $_SESSION["id"]);
        ?>
    </select>
    <br/>
    <label for="subject">Objet</label>
    <input type="text" id="subject" name="subject">
    <br/>
    <button type="submit">Envoyer</button>
</form>
<br/>
</body>
</html>