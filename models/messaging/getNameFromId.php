<?php
function getNameFromId($userid){
    include 'models/bddConf.php';
    $reponse = $db->prepare("SELECT name,firstName FROM users WHERE id=?");
    $reponse->execute(array($userid));
    $name = $reponse->fetch();
    return $name;
}
?>