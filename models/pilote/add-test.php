<?php
function processPiloteAddTest($idPilote, $reactTimeL, $reactTimeS, $temperature, $hearBeat)
{
    include 'models/bddConf.php';
    $reponse = $db->prepare("INSERT INTO testResult (reactTimeL, reactTimeS, temperature, hearBeat, date, piloteId) VALUE (?, ?, ?, ?, NOW(), ?)");
    $reponse->execute(array($reactTimeL, $reactTimeS, $temperature, $hearBeat, $idPilote));
}

?>