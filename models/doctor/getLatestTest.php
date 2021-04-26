<?php
function getDocterLatestTest($docId)
{
    include 'models/bddConf.php';
    $reponse = $db->prepare("SELECT * FROM users, testResult, pilote WHERE doctorId=? AND pilote.piloteId=testResult.piloteId AND pilote.piloteId=users.id ORDER BY date DESC");
    $reponse->execute(array($docId));
    return $reponse;
}

?>