<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FAQ</title>
    <link rel="stylesheet" href="/design/css/Style_FAQ.css">
</head>
<body>
<?php
include "common/headerLogin.php";
?>
<div>
    <?php
    require_once('models/faqGetter.php');
    $faqRq = getFAQ();
    while ($question = $faqRq->fetch()) { ?>
        <div>
            <h1><?php echo $question["question"]; ?></h1>
            <p><?php echo $question["answer"]; ?></p>
        </div>
        <?php
    }
    ?>
</div>
<?php
include "common/footer.php"
?>
</body>
</html>