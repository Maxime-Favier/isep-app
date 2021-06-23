<?php
function requestTramesFromServer(int $groupId)
{
    $ch = curl_init();
    //curl_setopt($ch, CURLOPT_URL, "http://projets-tomcat.isep.fr:8080/appService?ACTION=GETLOG&TEAM=".$groupId);
    curl_setopt($ch, CURLOPT_URL, "http://maxime1.favier.free.fr/projets-tomcat.isep.fr");
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    $data = curl_exec($ch);
    curl_close($ch);
    //echo "Raw Data:<br />";
    //echo("$data");
    $_SESSION["trames"] = $data;
}