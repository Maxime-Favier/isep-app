<?php
function getLatestTest($piloteId)
{
    include 'models/bddConf.php';
    $reponse = $db->prepare("SELECT * FROM testResult WHERE piloteId=? ORDER BY date DESC");
    $reponse->execute(array($piloteId));
    return $reponse;
}

?>