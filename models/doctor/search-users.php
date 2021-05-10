<?php
function docSearchUsers($keyWord,$docId){
    include "models/bddConf.php";

    $reponse = $db->prepare("SELECT * from users,pilote WHERE ((pilote.piloteId = users.id) and (pilote.doctorId = ?) and (firstName = ? or name = ?))");
    $reponse->execute(array($docId,$keyWord,$keyWord));
    return $reponse;

}
?>
