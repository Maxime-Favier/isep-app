<?php
//a suprimer
function isfromAdmin($adminId, $piloteId){
    // check si le docteur est bien celui du pilote
    include 'models/bddConf.php';
    $reponse = $db->prepare("SELECT * FROM pilote WHERE adminId=? AND piloteId=?");
    $reponse->execute(array($adminId, $piloteId));
    if($reponse->fetch()){
        return true;
    }else{
        return false;
    }
}

?>