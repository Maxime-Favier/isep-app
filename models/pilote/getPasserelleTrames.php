<?php
function requestTramesFromServer(int $groupId)
{
    $ch = curl_init();
    $url = "http://projets-tomcat.isep.fr:8080/appService?ACTION=GETLOG&TEAM=" . $groupId;
    //curl_setopt($ch, CURLOPT_URL, "http://projets-tomcat.isep.fr:8080/appService?ACTION=GETLOG&TEAM=9999");
    curl_setopt($ch, CURLOPT_URL, $url);
    //curl_setopt($ch, CURLOPT_VERBOSE, TRUE);
    //curl_setopt($ch, CURLOPT_STDERR, fopen('php://stderr', 'w'));
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
    //curl_setopt($ch, CURLOPT_URL, "http://maxime1.favier.free.fr/projets-tomcat.isep.fr");
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    $data = curl_exec($ch);
    //$info = curl_getinfo($ch);
    //var_dump($info);
    curl_close($ch);
    //echo $url;
    //echo "Raw Data:<br />";
    //echo("$data");
    $_SESSION["trames"] = $data;
}