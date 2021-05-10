<?php

function adminGetUser($userId)
{
    include 'models/bddConf.php';
    $reponse = $db->prepare("SELECT piloteId, name, firstName, email, address FROM pilote,users WHERE doctorId=? AND piloteId=users.id");
    $reponse->execute(array($userId));
    return $reponse;
}
?>