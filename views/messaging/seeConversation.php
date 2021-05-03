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
Ma conversation
<br/>
<?php
include_once("models/messaging/seeConversationHandler.php");
include_once("models/messaging/getNameFromId.php");
$conversationInfoRq = getConversationInfos($_GET["cid"]);
$conversationInfo = $conversationInfoRq->fetch();
echo $conversationInfo["object"]
?>
<br/>
<?php
$name = getNameFromId($conversationInfo["recipient"]);
echo $name["firstName"] . " " . $name["name"] . ", ";
$name2 = getNameFromId($conversationInfo["expeditor"]);
echo $name2["firstName"] . " " . $name2["name"];
?>
<?php

$messagesRq = getAllMessagesFromConversation($_GET["cid"]);
while ($message = $messagesRq->fetch()) {
    ?>
    <div>
        <p>
            <?php echo $message["firstName"] . " " . $message["name"]; ?>
            <br/>
            <?php echo $message["message"]; ?>
            <br/>
            <?php echo $message["date"]; ?>
        </p>
    </div>
    <?php
}
?>
<br/>
<form method="post" action="add-message">
    <label for="message">Texte du msg</label><br/>
    <input type="text" id="message" name="message">
    <input type="hidden" value="<?php echo $_GET["cid"]; ?>" name="cid">
    <br/>
    <button type="submit">Envoyer</button>
</form>
</body>
</html>