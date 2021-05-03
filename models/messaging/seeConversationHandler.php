<?php
function checkAccesConversation($conversationId, $userId)
{
    // vérifie que l'utilisateur a bien l'autorisation de voir le fil de discution
    include 'models/bddConf.php';
    $reponse = $db->prepare("SELECT * FROM conversations WHERE id=? AND (recipient=? OR expeditor=?)");
    $reponse->execute(array($conversationId, $userId, $userId));
    if ($reponse->fetch()) {
        return true;
    } else {
        return false;
    }
}

function getAllMessagesFromConversation($conversationId){
    include 'models/bddConf.php';
    $reponse = $db->prepare("SELECT * FROM messages, users WHERE conversation=? AND expeditor=users.id");
    $reponse->execute(array($conversationId));
    return $reponse;
}

function getConversationInfos($conversationId){
    include  'models/bddConf.php';
    $reponse = $db->prepare("SELECT * FROM conversations WHERE id=?");
    $reponse->execute(array($conversationId));
    return $reponse;
}
?>