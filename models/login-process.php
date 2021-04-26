<?php

function startSession($result)
{
    $_SESSION['id'] = $result['id'];
    $_SESSION['name'] = $result['name'];
    $_SESSION["firstName"] = $result['firstName'];
    $_SESSION['email'] = $result['email'];
    $_SESSION["address"] = $result['address'];
}

function loginUser($email, $password)
{
    include 'bddConf.php';
    $reponse = $db->prepare("SELECT * FROM users WHERE email=?");//pas de condition sur password
    $reponse->execute(array($email));
    //echo "here<br/>";

    $result = $reponse->fetch();
    $isPasswordCorrect = password_verify($password,$result['password']);

    if ($isPasswordCorrect) {

        // test si c'est un admin
        $adminreq = $db->prepare("SELECT * FROM admin WHERE adminId=?");
        $adminreq->execute(array($result["id"]));
        $adminres = $adminreq->fetch();
        if ($adminres) {
            // c'est un admin, démarrage de la session
            session_start();
            startSession($result);
            $_SESSION['role'] = 'admin';
            // redirection page admin
            header('Location: admin/index');
            die();
        }

        // test si c'est un medecin
        $medreq = $db->prepare("SELECT * FROM doctor WHERE docId=?");
        $medreq->execute(array($result["id"]));
        $medres = $medreq->fetch();
        if ($medres) {
            // c'est un docteur, démarrage de la session
            session_start();
            startSession($result);
            $_SESSION['role'] = 'doctor';
            // redirection page docteur ou cqu
            if ($medres['cguok'] == 1) {
                header('Location: doctor/index');
            } else {
                header('Location: doctor/cgu');
            }
            die();
        }

        // test si c'est un pilote
        $pilotereq = $db->prepare("SELECT * FROM pilote WHERE piloteId=?");
        $pilotereq->execute(array($result["id"]));
        $piloteres = $pilotereq->fetch();
        if ($piloteres) {
            // c'est un pilote, démarrage de la session
            session_start();
            startSession($result);
            $_SESSION['role'] = 'pilote';
            $_SESSION['doctorId'] = $piloteres['doctorId'];
            // redirection page pilote
            if ($piloteres['cguok'] == 1) {
                header('Location: pilote/index');
            } else {
                header('Location: pilote/cgu');
            }
            die();
        }
    }else{
        header('Location: login');

        die();
    }
}

?>