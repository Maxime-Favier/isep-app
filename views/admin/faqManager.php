<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FAQ</title>
</head>
<body>
<?php
require_once('models/faqGetter.php');
$faqRq = getFAQ();
while ($question = $faqRq->fetch()) { ?>
    <p>
        <?php echo $question["question"]; ?><br/>
        <?php echo $question["answer"]; ?><br/>
        <a href="deleteQuestion?q=<?php echo $question["id"]; ?>">Supprimer la question</a>
    </p>
    <?php
}
?>
<br/>
Ajouter une question<br/>
<form method="post" action="addQuestion">
    <label for="question">Question</label><br/>
    <input name="question" id="question" type="text"><br/>
    <label for="anwser">Réponse</label><br/>
    <input type="text" name="answer" id="anwser"><br/>
    <button type="submit">Envoyer</button>
</form>
</body>
</html>