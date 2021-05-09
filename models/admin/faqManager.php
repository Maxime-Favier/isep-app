<?php
function addFaqQuestionToDB($question, $anwser)
{
    include 'models/bddConf.php';
    $reponse = $db->prepare("INSERT INTO faq (question, answer) VALUE (?, ?)");
    $reponse->execute(array($question, $anwser));
}

function deleteFaqQuestion($idQuestion)
{
    include 'models/bddConf.php';
    $reponse = $db->prepare("DELETE FROM faq WHERE id=?");
    $reponse->execute(array($idQuestion));
}

function editFaqQuestion($idQuestion, $question, $anwser)
{
    include 'models/bddConf.php';
    $reponse = $db->prepare("UPDATE faq SET question=?, answer=? WHERE id=?");
    $reponse->execute(array($question, $anwser, $idQuestion));
}

?>