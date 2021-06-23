<?php

function sendEmailAdmin($userEmail, $userText)
{
    // ne pas oublier de configurer le serveur smtp dans le fichier php.ini
    $emailActivation = false;
    $emailAdmin = "admin@allowinno.isep.fr";
    $subject = "formulaire de contact";
    $headers = 'From: admin@allowinno.isep.fr' . "\r\n" .
        'Reply-To: ' . $userEmail . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
    if ($emailActivation) {
        mail($emailAdmin, $subject, $userText, $headers);
        header('Location: index');
        die();
    } else {
        echo "Le serveur mail n'a pas été activé";
    }

}

?>