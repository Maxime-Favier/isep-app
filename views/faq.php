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
La FAQ<br/>
<div>
    <?php
    require_once('models/faqGetter.php');
    $faqRq = getFAQ();
    while ($question = $faqRq->fetch()) { ?>
        <div>
            <p><?php echo $question["question"]; ?></p>
            <p><?php echo $question["answer"]; ?></p>
        </div>
        <?php
    }
    ?>
</div>
</body>
</html>