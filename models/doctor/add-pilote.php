<?php

function addPilote($id, $name, $firstName, $email, $password, $address){
    include 'models/bddConf.php';
    $reponse = $db->prepare("INSERT INTO users (name, firstName, email, password, address) VALUE (?, ?, ?, ?, ?)");
    $reponse->execute(array($name, $firstName, $email, $password, $address));
    $piloteid = $db->lastInsertId();
    $pilotereq = $db->prepare("INSERT INTO pilote (piloteId, doctorId, cguok) VALUE (?, ?, 0)");
    $pilotereq->execute(array($piloteid, $id));
    //echo "ok";
}
?>