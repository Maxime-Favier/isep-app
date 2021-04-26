<?php
function getDocteurInfo($idPatient){
    include 'models/bddConf.php';
    $reponse = $db->prepare("SELECT doctorId, name, firstName, email, address FROM pilote,users WHERE piloteId=? AND doctorId=id;");
    $reponse->execute(array($idPatient));
    return $reponse;
}
?>