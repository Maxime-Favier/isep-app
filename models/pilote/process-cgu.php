<?php
function processPiloteCGUDb($idPilote)
{
    include 'models/bddConf.php';
    $reponse = $db->prepare("UPDATE pilote SET cguok=1 WHERE piloteId=?");
    $reponse->execute(array($idPilote));
}

?>