<?php
function getInfoPilote($piloteId){
    include 'models/bddConf.php';
    $reponse = $db->prepare("SELECT * FROM users WHERE id=?");
    $reponse->execute(array($piloteId));
    return $reponse;
}
?>