<?php
function getInfoUser($userId){
    include 'models/bddConf.php';
    $reponse = $db->prepare("SELECT * FROM users WHERE id=?");
    $reponse->execute(array($userId));
    return $reponse;
}
?>
