<?php
function processDoctorCGU($idDoc)
{
    include 'models/bddConf.php';
    $reponse = $db->prepare("UPDATE doctor SET cguok=1 WHERE docId=?");
    $reponse->execute(array($idDoc));
}

?>