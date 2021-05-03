<?php
function checkRecipientAllowed($recipientId, $userId)
{
    // vérifie que l'utilisateur a les droits de créer un fil de discution avec qqun
    include 'models/bddConf.php';
    // on ne peut pas envoyer des msg a soit même
    if ($recipientId == $userId) {
        return false;
    }
    // check expediteur est admin ou que le destinataire est admin -> allow
    $reponse = $db->prepare("SELECT * FROM admin WHERE adminId=? OR adminId=?");
    $reponse->execute(array($userId, $recipientId));
    $msgAdmin = $reponse->fetch();
    if ($msgAdmin) {
        return true;
    }
    // check si l'exediteur est docteur
    $reponse = $db->prepare("SELECT * FROM doctor WHERE docId=?");
    $reponse->execute(array($userId));
    $isDoc = $reponse->fetch();
    if ($isDoc) {
        // si c'est un docteur il ne peux envoyer des msg que a ses patients
        $reponse = $db->prepare("SELECT * FROM pilote WHERE piloteId=? AND doctorId=?");
        $reponse->execute(array($recipientId, $userId));
        $isPatientFromDoc = $reponse->fetch();
        if ($isPatientFromDoc) {
            return true;
        } else {
            return false;
        }
    } else {
        // si ce n'est pas un docteur alors c'est un patient -> peux envoyer msg à son docteur
        $reponse = $db->prepare("SELECT * FROM pilote WHERE piloteId=? AND doctorId=?");
        $reponse->execute(array($userId, $recipientId));
        $isPatientFromDoc = $reponse->fetch();
        if ($isPatientFromDoc) {
            return true;
        } else {
            return false;
        }
    }
}

function newConversation($object, $expeditorId, $recipientId)
{
    // création d'un nouveau fil de discution
    include 'models/bddConf.php';
    $reponse = $db->prepare("INSERT INTO conversations (object, expeditor, recipient) VALUE (?, ?, ?)");
    $reponse->execute(array($object, $expeditorId, $recipientId));
}

?>