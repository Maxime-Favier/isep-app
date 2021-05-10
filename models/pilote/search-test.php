<?php
function pilotSearchTest($keyWord,$pilotId){

    include 'models/bddConf.php';
    $reponse = $db->prepare("SELECT * FROM testResult WHERE (piloteId=:pilotid) and date LIKE :requete  ORDER BY date DESC");
    $reponse->execute(array('pilotid'=>$pilotId,'requete'=>'%'.$keyWord.'%'));
    return $reponse;

}
?>