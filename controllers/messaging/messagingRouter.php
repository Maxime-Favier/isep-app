<?php
// routeur de la partie messagerie

require ROOT . "/controllers/messaging/messagingController.php";

function messagingRouter($route)
{
    session_start();

    if (!isset($_SESSION['id'])) {
        header('Location: ../');
        die();
    }

    switch ($route) {
        case "index":
            seeMessagingIndex();
            break;
        case "add-conversation":
            newConversationSubmit();
            break;
        case "seeConversation":
            seeConversation();
            break;
        case "add-message":
            addMessage();
            break;
        default:
            echo "Erreur 404 (Not Found) - pilote<br/>" . $route;
            break;
    }
}

?>