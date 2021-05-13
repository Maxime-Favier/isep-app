<?php
include_once("models/doctor/get-pilotes.php");
include_once("models/delete-user.php");

function deleteUser($typeOfUser, $idUser)
{
    include 'bddConf.php';
    switch ($typeOfUser) {
        case 'doctor' :
            $pilotereq = getPilotes($idUser);
            while ($patient = $pilotereq->fetch()) {
                //echo $patient["piloteId"];
                deleteUser("pilote", $patient["piloteId"]);
            }
            $reponse = $db->prepare("DELETE FROM pilote WHERE doctorId=?");
            $reponse->execute(array($idUser));
            $reponse = $db->prepare("DELETE FROM users WHERE id=?");
            $reponse->execute(array($idUser));
            break;
        case 'pilote' :
            $reponse = $db->prepare("DELETE FROM users WHERE id=?");
            $reponse->execute(array($idUser));
            break;
    }
}

?>
