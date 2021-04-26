<?php
function isfromdoc($docId, $piloteId){
    // check si le docteur est bien celui du pilote
    include 'models/bddConf.php';
    $reponse = $db->prepare("SELECT * FROM pilote WHERE doctorId=? AND piloteId=?");
    $reponse->execute(array($docId, $piloteId));
    if($reponse->fetch()){
        return true;
    }else{
        return false;
    }
}
?>