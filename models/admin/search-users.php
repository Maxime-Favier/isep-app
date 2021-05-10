<?php

function searchUsers($keyWord,$users){
    include "models/bddConf.php";// pk ne Utiliser require?
    switch($users){
    case 'doctor':
        $reponse = $db->prepare("SELECT * from users,doctor WHERE (doctor.docId = users.id and (name = ? or firstName = ? or id = ? or email= ? ))");
        $reponse->execute(array($keyWord,$keyWord,$keyWord,$keyWord,));
        return $reponse;
    case  'pilot':
        $reponse = $db->prepare("SELECT * from users,pilote WHERE (pilote.piloteId = users.id and (name = ? or firstName = ? or id = ? or email= ? ))");
        $reponse->execute(array($keyWord,$keyWord,$keyWord,$keyWord,));
        return $reponse;
    }

}

?>
