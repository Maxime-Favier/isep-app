<?php

function editProfile($id, $name, $firstName, $email, $password, $address)
{
    include 'bddConf.php';
    $reponse = $db->prepare("UPDATE users SET name=?, firstName=?, email=?, password=?, address=? WHERE id=?");
    $reponse->execute(array($name, $firstName, $email, $password, $address, $id));
    //echo "done";
    $_SESSION['name'] = $name;
    $_SESSION["firstName"] = $firstName;
    $_SESSION['email'] = $email;
    $_SESSION["address"] = $address;
}

?>