<?php

function getFAQ()
{
    include 'bddConf.php';
    $reponse = $db->prepare("SELECT * FROM faq");
    $reponse->execute();
    return $reponse;
}

?>