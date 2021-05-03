<?php

require_once("models/messaging/newConversation.php");
require_once("models/messaging/seeConversationHandler.php");
require_once("models/messaging/addMessage.php");

function seeMessagingIndex()
{
    require ROOT . "/views/messaging/conversations.php";
}

function seeConversation()
{
    if (isset($_GET['cid'])) {
        try {
            $conversationId = intval(htmlspecialchars($_GET['cid']));
            //echo "here";
            if (checkAccesConversation($conversationId, $_SESSION["id"])) {
                require ROOT . "/views/messaging/seeConversation.php";
            } else {
                header('Location: index');
                die();
            }

        } catch (Exception $e) {
            header('Location: index');
            die();
        }

    } else {
        header('Location: index');
        die();
    }
}

function addMessage()
{
    $conversationId = intval(htmlspecialchars($_POST["cid"]));
    $message = htmlspecialchars($_POST["message"]);

    if (checkAccesConversation($conversationId, $_SESSION["id"])) {
        addMessageToConversation($conversationId, $_SESSION["id"], $message);
    }
    header('Location: seeConversation?cid=' . $conversationId);
    die();
}

function newConversationSubmit()
{
    $object = htmlspecialchars($_POST["subject"]);
    $idRecipient = intval(htmlspecialchars($_POST["dest"]));
    if (checkRecipientAllowed($idRecipient, $_SESSION["id"])) {
        newConversation($object, $_SESSION["id"], $idRecipient);
    }
    header('Location: index');
    die();
}

?>