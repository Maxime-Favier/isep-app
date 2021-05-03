<?php
function getConversation($userid){
    include 'models/bddConf.php';
    $reponse = $db->prepare("SELECT * FROM conversations WHERE expeditor=? OR recipient=?");//SAM
    $reponse->execute(array($userid, $userid));
    return $reponse;
}
?>