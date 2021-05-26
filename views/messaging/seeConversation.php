<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Conversation</title>
    <link href="/design/css/Style_Messagerie.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<?php
if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] == "admin") {
        include "views/messaging/headers/headerAdmin.php";
    } elseif ($_SESSION['role'] == "doctor") {
        include "views/messaging/headers/headerDoctor.php";
    } elseif ($_SESSION['role'] == "pilote") {
        include "views/common/headerPilote.php";
    } else {
        include "views/common/headerLogin.php";
    }
}
?>
<?php
include_once("models/messaging/seeConversationHandler.php");
include_once("models/messaging/getNameFromId.php");
$conversationInfoRq = getConversationInfos($_GET["cid"]);
$conversationInfo = $conversationInfoRq->fetch();

?>
<div class="menu">
    <div class="name"><?php echo $conversationInfo["object"] ?></div>
    <div class="members"><b><?php
            $name = getNameFromId($conversationInfo["recipient"]);
            echo $name["firstName"] . " " . $name["name"] . ", ";
            $name2 = getNameFromId($conversationInfo["expeditor"]);
            echo $name2["firstName"] . " " . $name2["name"];
            ?></b></div>
</div>

<ol class="chat">
    <?php

    $messagesRq = getAllMessagesFromConversation($_GET["cid"]);
    while ($message = $messagesRq->fetch()) {
        ?>
        <?php
        if ($name2["name"] == $message["name"]) {
            ?>
            <li class="other">
                <div class="msg">
                    <div class="user"><?php echo $message["firstName"] . " " . $message["name"]; ?></div>
                    <p><?php echo $message["message"]; ?></p>
                    <time><?php echo $message["date"]; ?></time>
                </div>
            </li>
            <?php
        } else {
            ?>
            <li class="self">
            <div class="msg">
                <div class="user"><?php echo $message["firstName"] . " " . $message["name"]; ?></div>
                <p><?php echo $message["message"]; ?></p>
                <time><?php echo $message["date"]; ?></time>
            </div>
            </li><?php
        }
        ?>
        <?php
    }
    ?>
</ol>
<div class="typezone">
    <form  method="post" action="add-message">
        <textarea type="text" placeholder="Message" name="message">

        </textarea>
        <input type="hidden" value="<?php echo $_GET["cid"]; ?>" name="cid">
        <input type="submit" class="send" value="Envoyer" />
    </form>
    <div class="emojis"></div>
</div>


<?php
include "views/common/footer.php"
?>

</body>
</html>