<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Messagerie interne - menu</title>
    <link href="/design/css/Style_menu_messagerie.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<?php
if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] == "admin") {
        include "views/messaging/headers/headerAdmin.php";
    } elseif ($_SESSION['role'] == "doctor") {
        include "views/messaging/headers/headerDoctor.php";
    } elseif ($_SESSION['role'] == "pilote") {
        include "views/common/headerPilote.php";
    } else {
        include "views/common/headerLogin.php";
    }
}
?>
<div class="flex">
    <div id="chatbox">
        <div id="friendslist">
            <div id="topmenu">
                <span class="Amis"></span>

                <button id="b1" class="NewMessage"></button>


            </div>
            <div id="friends">
                <?php
                include_once("models/messaging/get-conversation.php");
                include_once("models/messaging/getNameFromId.php");
                $conversationRq = getConversation($_SESSION['id']);
                while ($conversation = $conversationRq->fetch()) {
                    ?>
                    <a href="seeConversation?cid=<?php echo $conversation["id"]; ?>">
                        <div class="friend">
                            <img src="https://static.jobat.be//uploadedImages/grandprofilfb.jpg"/>
                            <p>
                                <strong><?php echo $conversation["object"]; ?></strong>
                                <br>
                                <span><?php
                                    $name = getNameFromId($conversation["expeditor"]);
                                    if ($_SESSION['name'] !== $name["name"]) {
                                        echo $name["firstName"] . " " . $name["name"] . ", ";
                                    } else {
                                        $name2 = getNameFromId($conversation["recipient"]);
                                        echo $name2["firstName"] . " " . $name2["name"];
                                    }
                                    ?>
                            </span>
                            </p>
                        </div>
                    </a>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>


    <br/>
    <form method="post" action="add-conversation" id="masqué">
        <label for="destination">Choisir un destinataire</label>
        <select name="dest" id="destination">
            <?php
            include_once("models/messaging/getAvailableRecipient.php");
            getAvailableRecipient($_SESSION["role"], $_SESSION["id"]);
            ?>
        </select>
        <br/><br/>
        <label for="subject">Objet</label><br/>
        <input type="text" id="subject" name="subject">
        <br/><br/><br/>
        <button type="submit">Envoyer</button>
    </form>
</div>
<br/>
<?php
include "views/common/footer.php"
?>
<script type="text/javascript">
    let b1 = document.getElementById("b1");
    let masqué = document.getElementById("masqué");
    b1.addEventListener("click", () => {
        if (getComputedStyle(masqué).display != "none") {
            masqué.style.display = "none";
        } else {
            masqué.style.display = "block";
        }
    })
</script>

</body>
</html>