<?php
function addNewDoctor($name, $firstName, $email, $password, $address){
    include 'models/bddConf.php';
    $reponse = $db->prepare("INSERT INTO users (name, firstName, email, password, address) VALUE (?, ?, ?, ?, ?)");
    $reponse->execute(array($name, $firstName, $email, $password, $address));
    $medId = $db->lastInsertId();
    $medreq = $db->prepare("INSERT INTO doctor (docId, cguok) VALUE (?, 0)");
    $medreq->execute(array($medId));
    //echo "done";
}
?>