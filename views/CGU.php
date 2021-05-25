<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CGU</title>
</head>
<body>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link href="/design/css/Style_CGU.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<?php
if(isset($_SESSION['role'])){
    if($_SESSION['role']=="admin"){
        include "views/admin/adminHeader.php";
    }elseif($_SESSION['role']=="doctor"){
        include "views/doctor/doctorHeader.php";
    }elseif($_SESSION['role']=="pilote"){
        include "views/common/headerPilote.php";
    }else{
        include "views/common/headerLogin.php";
    }
}else{
    include "views/common/headerLogin.php";
}
?>



<h1>Conditions Générales D'utilisation</h1>

<h2>Paragraphe 1</h2>
<h3>Sous-Paragraphe 1</h3>
<p class="CGU">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean dignissim auctor bibendum. Fusce fermentum interdum mattis. Vestibulum malesuada tellus eget hendrerit tincidunt. Aenean gravida sapien tortor, id fringilla elit ultrices non. Nam orci turpis, volutpat porttitor venenatis sit amet, vestibulum vitae mauris. Curabitur ullamcorper libero eu auctor tincidunt. Suspendisse quis risus id ipsum accumsan vehicula. Sed interdum orci eros, a gravida justo pulvinar eget. Proin interdum quis eros vitae malesuada. Ut commodo, mi gravida tincidunt tincidunt, velit dolor scelerisque magna, non posuere diam risus id neque.

    Vestibulum eu ipsum a diam pretium elementum. In at diam risus. Quisque at nulla quis nisi scelerisque efficitur vitae eu felis. Cras quis dolor justo. Donec vitae dapibus tellus, non imperdiet diam. Vestibulum eu purus vel augue condimentum aliquam. Duis aliquet condimentum tellus, posuere viverra erat sodales eget. Nullam at lorem lobortis odio luctus interdum.</p>
<h3>Sous-Paragraphe 2</h3>
<p class="CGU">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean dignissim auctor bibendum. Fusce fermentum interdum mattis. Vestibulum malesuada tellus eget hendrerit tincidunt. Aenean gravida sapien tortor, id fringilla elit ultrices non. Nam orci turpis, volutpat porttitor venenatis sit amet, vestibulum vitae mauris. Curabitur ullamcorper libero eu auctor tincidunt. Suspendisse quis risus id ipsum accumsan vehicula. Sed interdum orci eros, a gravida justo pulvinar eget. Proin interdum quis eros vitae malesuada. Ut commodo, mi gravida tincidunt tincidunt, velit dolor scelerisque magna, non posuere diam risus id neque.

    Vestibulum eu ipsum a diam pretium elementum. In at diam risus. Quisque at nulla quis nisi scelerisque efficitur vitae eu felis. Cras quis dolor justo. Donec vitae dapibus tellus, non imperdiet diam. Vestibulum eu purus vel augue condimentum aliquam. Duis aliquet condimentum tellus, posuere viverra erat sodales eget. Nullam at lorem lobortis odio luctus interdum.</p>
<h2>Paragraphe 2</h2>
<h3>Sous-Paragraphe 1</h3>
<p class="CGU">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean dignissim auctor bibendum. Fusce fermentum interdum mattis. Vestibulum malesuada tellus eget hendrerit tincidunt. Aenean gravida sapien tortor, id fringilla elit ultrices non. Nam orci turpis, volutpat porttitor venenatis sit amet, vestibulum vitae mauris. Curabitur ullamcorper libero eu auctor tincidunt. Suspendisse quis risus id ipsum accumsan vehicula. Sed interdum orci eros, a gravida justo pulvinar eget. Proin interdum quis eros vitae malesuada. Ut commodo, mi gravida tincidunt tincidunt, velit dolor scelerisque magna, non posuere diam risus id neque.

    Vestibulum eu ipsum a diam pretium elementum. In at diam risus. Quisque at nulla quis nisi scelerisque efficitur vitae eu felis. Cras quis dolor justo. Donec vitae dapibus tellus, non imperdiet diam. Vestibulum eu purus vel augue condimentum aliquam. Duis aliquet condimentum tellus, posuere viverra erat sodales eget. Nullam at lorem lobortis odio luctus interdum.</p>
<h3>Sous-Paragraphe 2</h3>
<p class="CGU">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean dignissim auctor bibendum. Fusce fermentum interdum mattis. Vestibulum malesuada tellus eget hendrerit tincidunt. Aenean gravida sapien tortor, id fringilla elit ultrices non. Nam orci turpis, volutpat porttitor venenatis sit amet, vestibulum vitae mauris. Curabitur ullamcorper libero eu auctor tincidunt. Suspendisse quis risus id ipsum accumsan vehicula. Sed interdum orci eros, a gravida justo pulvinar eget. Proin interdum quis eros vitae malesuada. Ut commodo, mi gravida tincidunt tincidunt, velit dolor scelerisque magna, non posuere diam risus id neque.

    Vestibulum eu ipsum a diam pretium elementum. In at diam risus. Quisque at nulla quis nisi scelerisque efficitur vitae eu felis. Cras quis dolor justo. Donec vitae dapibus tellus, non imperdiet diam. Vestibulum eu purus vel augue condimentum aliquam. Duis aliquet condimentum tellus, posuere viverra erat sodales eget. Nullam at lorem lobortis odio luctus interdum.</p>
<h2>Paragraphe 3</h2>
<h3>Sous-Paragraphe 1</h3>
<p class="CGU">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean dignissim auctor bibendum. Fusce fermentum interdum mattis. Vestibulum malesuada tellus eget hendrerit tincidunt. Aenean gravida sapien tortor, id fringilla elit ultrices non. Nam orci turpis, volutpat porttitor venenatis sit amet, vestibulum vitae mauris. Curabitur ullamcorper libero eu auctor tincidunt. Suspendisse quis risus id ipsum accumsan vehicula. Sed interdum orci eros, a gravida justo pulvinar eget. Proin interdum quis eros vitae malesuada. Ut commodo, mi gravida tincidunt tincidunt, velit dolor scelerisque magna, non posuere diam risus id neque.

    Vestibulum eu ipsum a diam pretium elementum. In at diam risus. Quisque at nulla quis nisi scelerisque efficitur vitae eu felis. Cras quis dolor justo. Donec vitae dapibus tellus, non imperdiet diam. Vestibulum eu purus vel augue condimentum aliquam. Duis aliquet condimentum tellus, posuere viverra erat sodales eget. Nullam at lorem lobortis odio luctus interdum.</p>
<h3>Sous-Paragraphe 2</h3>
<p class="CGU">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean dignissim auctor bibendum. Fusce fermentum interdum mattis. Vestibulum malesuada tellus eget hendrerit tincidunt. Aenean gravida sapien tortor, id fringilla elit ultrices non. Nam orci turpis, volutpat porttitor venenatis sit amet, vestibulum vitae mauris. Curabitur ullamcorper libero eu auctor tincidunt. Suspendisse quis risus id ipsum accumsan vehicula. Sed interdum orci eros, a gravida justo pulvinar eget. Proin interdum quis eros vitae malesuada. Ut commodo, mi gravida tincidunt tincidunt, velit dolor scelerisque magna, non posuere diam risus id neque.

    Vestibulum eu ipsum a diam pretium elementum. In at diam risus. Quisque at nulla quis nisi scelerisque efficitur vitae eu felis. Cras quis dolor justo. Donec vitae dapibus tellus, non imperdiet diam. Vestibulum eu purus vel augue condimentum aliquam. Duis aliquet condimentum tellus, posuere viverra erat sodales eget. Nullam at lorem lobortis odio luctus interdum.</p>


</body>

<footer>
    <a href="Page_acceuil.html" class = "foot">Infinite Measure</a>
    <p style="display: inline">|</p>
    <a href="Page_contact.html" class = "foot" >Contact</a>
    <p style="display: inline">|</p>
    <a href="FAQ.html" class = "foot">FAQ</a>
    <p style="display: inline">|</p>
    <a href="CGU.html" class = "foot">CGU</a>
</footer>
</html>