<?php
function processPiloteAddTest($idPilote, $reactTimeL, $reactTimeS, $temperature, $hearBeat)
{
    include 'models/bddConf.php';
    $reponse = $db->prepare("INSERT INTO testResult (reactTimeL, reactTimeS, temperature, hearBeat, date, piloteId) VALUE (?, ?, ?, ?, NOW(), ?)");
    $reponse->execute(array($reactTimeL, $reactTimeS, $temperature, $hearBeat, $idPilote));
}

/*function addTestBulkPilote($idPilote, $reactTimeL, $reactTimeS, $temperature, $hearBeat, $date)
{
    include 'models/bddConf.php';
    $reponse = $db->prepare("INSERT INTO testResult (reactTimeL, reactTimeS, temperature, hearBeat, date, piloteId) VALUE (?, ?, ?, ?, ?, ?)");
    $reponse->execute(array($reactTimeL, $reactTimeS, $temperature, $hearBeat, date('Y-m-d H:i:s', $date), $idPilote));
}*/

function addTestBulkOpti($data_tab, $idPilote)
{
    include 'models/bddConf.php';
    $reponse = $db->prepare("INSERT INTO testResult (reactTimeL, reactTimeS, temperature, hearBeat, date, piloteId) VALUE (?, ?, ?, ?, ?, ?)");
    try {
        $db->beginTransaction();
        for ($i = 0, $size = count($data_tab) - 1; $i < $size; $i++) {
            $trame = $data_tab[$i];// décodage avec des substring
            // ...// décodage avec sscanf
            list($t, $o, $r, $c, $n, $v, $a, $x, $year, $month, $day, $hour, $min, $sec) = sscanf($trame, "%1s%4s%1s%1s%2s%4s%4s%2s%4s%2s%2s%2s%2s%2s");
            $dateTime = strtotime($year . "/" . $month . "/" . $day . " " . $hour . ":" . $min . ":" . $sec);
            //echo("<br/>type: $t, num obj: $o, rqtype: $r, typecapt: $c, numcapt: $n, valeur: $v, numTrame: $a, chk: $x, date: $year,$month,$day,$hour,$min,$sec<br/>");
            //echo "<br/>$year";
            if ($c == 3) {
                // trame de température
                //echo date('d/M/Y h:i:s', $dateTime);
                //addTestBulkPilote($_SESSION["id"], 0, 0, $v / 100, 0, $dateTime);
                $reponse->execute(array(0, 0, $v / 100, 0, date('Y-m-d H:i:s', $dateTime), $idPilote));
            }
        }
        $db->commit();
    }catch (Exception $e){
        $db->rollback();
        throw $e;
    }

}

?>