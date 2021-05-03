<?php


function getAllAdminMsg($exeption)
{
    include "models/bddConf.php";
    $res = $db->prepare("SELECT * FROM users,admin WHERE id != ? AND id=admin.adminId");
    $res->execute(array($exeption));
    return $res;
}

function getAllDoctorMsg()
{
    include "models/bddConf.php";
    $res = $db->prepare("SELECT * FROM users,doctor WHERE id=doctor.docId");
    $res->execute();
    return $res;
}

function getAllPiloteMsg()
{
    include "models/bddConf.php";
    $res = $db->prepare("SELECT * FROM users,pilote WHERE id=pilote.piloteId");
    $res->execute();
    return $res;
}

function getPiloteFromDocMsg($docId)
{
    include "models/bddConf.php";
    $reponse = $db->prepare("SELECT * FROM pilote,users WHERE doctorId=? AND piloteId=users.id");
    $reponse->execute(array($docId));
    return $reponse;
}

function getDocFromPiloteMsg($piloteId)
{
    include "models/bddConf.php";
    $reponse = $db->prepare("SELECT * FROM pilote,users WHERE piloteId=? AND doctorId=id;");
    $reponse->execute(array($piloteId));
    return $reponse;
}

function getAvailableRecipient($role, $userid)
{
    include "models/bddConf.php";
    switch ($role) {
        case "admin":
            //echo "here";
            $adminReq = getAllAdminMsg($userid);
            //ob_start();
            ?>
            <optgroup label="Admin">
                <?php
                while ($recipient = $adminReq->fetch()) {
                    ?>
                    <option value="<?php echo $recipient["id"]; ?>"><?php echo $recipient["firstName"] . " " . $recipient["name"]; ?></option>
                    <?php
                }
                ?>
            </optgroup>
            <optgroup label="Medecin">
                <?php
                $docReq = getAllDoctorMsg();
                while ($recipient = $docReq->fetch()) {
                    ?>
                    <option value="<?php echo $recipient["id"]; ?>"><?php echo $recipient["firstName"] . " " . $recipient["name"]; ?></option>
                    <?php
                }
                ?></optgroup>
            <optgroup label="pilote"><?php
                $piloteReq = getAllPiloteMsg();
                while ($recipient = $piloteReq->fetch()) {
                    ?>
                    <option value="<?php echo $recipient["id"]; ?>"><?php echo $recipient["firstName"] . " " . $recipient["name"]; ?></option>
                    <?php
                }
                ?>
            </optgroup>
            <?php
            break;
        case "doctor":
            $adminReq = getAllAdminMsg($userid)
            ?>
            <optgroup label="Admin">
                <?php
                while ($recipient = $adminReq->fetch()) {
                    ?>
                    <option value="<?php echo $recipient["id"]; ?>"><?php echo $recipient["firstName"] . " " . $recipient["name"]; ?></option>
                    <?php
                }
                ?>
            </optgroup>
            <optgroup label="Pilotes">
                <?php
                $piloteReq = getPiloteFromDocMsg($userid);
                while ($recipient = $piloteReq->fetch()) {
                    ?>
                    <option value="<?php echo $recipient["id"]; ?>"><?php echo $recipient["firstName"] . " " . $recipient["name"]; ?></option>
                    <?php
                } ?>
            </optgroup>
            <?php
            break;
        case "pilote":
            $adminReq = getAllAdminMsg($userid)
            ?>
            <optgroup label="Admin">
                <?php
                while ($recipient = $adminReq->fetch()) {
                    ?>
                    <option value="<?php echo $recipient["id"]; ?>"><?php echo $recipient["firstName"] . " " . $recipient["name"]; ?></option>
                    <?php
                }
                ?>
            </optgroup>
            <optgroup label="Medecin">
                <?php
                $docReq = getDocFromPiloteMsg($userid);
                while ($recipient = $docReq->fetch()) {
                    ?>
                    <option value="<?php echo $recipient["id"]; ?>"><?php echo $recipient["firstName"] . " " . $recipient["name"]; ?></option>
                    <?php
                }
                ?>
            </optgroup>
            <?php
            break;
    }
}

?>