<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edition de la FAQ</title>
    <link href="/design/css/Style_Edit_FAQ.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<?php
include"views/admin/adminHeader.php";
?>
<h1>Liste des questions</h1>
<?php
require_once('models/faqGetter.php');
$faqRq = getFAQ();
$compteur = 1;
while ($question = $faqRq->fetch()) { ?>
    <form method="post" action = "deleteQuestion?q=<?php echo $question["id"]; ?>" >
    <p>
        <?php echo "<h2>".$question["question"]."</h2>"; ?><br/>
        <?php echo $question["answer"]; ?><br/>
        <?php $compteur = 1 + $compteur ?><br/>
        <input type ="submit"  action="deleteQuestion?q=<?php echo $question["id"]; ?>" value = "Supprimer la question" />
    </p>
    <form>
    <?php
}
?>
<br/>
<h1>Ajouter une question</h1>
<form method="post" action="addQuestion">
    <label for="question">Question</label><br/>
    <input name="question" id="question" type="text"><br/>
    <label for="anwser">Réponse</label><br/>
    <input type="text" name="answer" id="anwser"><br/>
    <button type="submit">Envoyer</button>
</form>
<?php
include "views/common/footer.php";
?>
</body>
</html>