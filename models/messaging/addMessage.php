<?php
    function addMessageToConversation($conversationId, $userId, $message){
        include "models/bddConf.php";
        $res = $db->prepare("INSERT INTO messages (conversation, expeditor, date, message) VALUE (?, ?, NOW(), ?)");
        $res->execute(array($conversationId, $userId, $message));
    }
?>
