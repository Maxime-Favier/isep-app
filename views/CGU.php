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
<p class="CGU"> Les présentes conditions générales d’utilisation ont pour objet de définir les modalités et conditions dans lesquelles Allowinno met à disposition son site internet, et les services disponibles au bénéfice de l’utilisateur. En utilisant le site internet d’Allowinno, l’utilisateur accepte sans réserve les présentes dispositions et conditions générales d’utilisation.

<h2>Article 1 - Description du site</h2>

<p class="CGU">
    Le site internet a pour objectif le suivi de l’observance thérapeutique. Elle doit être utilisée en association avec le prototype de mesure psychotechnique Innofly. Le site comporte trois profils d’utilisateurs différents : </p>
<ul>
    <li>
        Profil utilisateur-patient
    </li>
    <li>
        Profil médecin (ayant accès aux données d’un profil patient)

    </li>
    <li>
        Profil administrateur (ayant accès aux données d’un profil patient et médecin)
    </li>
</ul>
<p class = "CGU"> Le site permet à l’utilisateur-patient : <br>
<ul>
    <li>
        D’effectuer un test avec Innofly
    </li>
    <li>
        De consulter les résultats des test effectués
    </li>
    <li>
        De contacter son médecin
    </li>
</ul>
</p>
<p class="CGU">
    Le site internet d’Allowinno doit être utilisé en conjonction avec Innofly et sous la supervision de son médecin. Elle ne donne en aucun cas une interprétation. Elle n’a pas pour vocation d’apporter d’informations, d’avis, d’opinions ou de conseils sur la situation de l’utilisateur. Pour plus d’informations concernant les résultats, il est nécessaire de consulter son médecin. </p>

<h2>Article 2 - Responsabilité de l'éditeur</h2>
<p class="CGU">L’utilisation des informations et documents disponibles sur cette application sont sous l’unique responsabilité de l’utilisateur-patient, qui assume l’ensemble des conséquences.</p>

<h2>Article 3 - Droits de propriété intellectuelle</h2>
<p class="CGU">Le site et chacun des éléments qui la composent sont la propriété exclusive de Allowinno conformément aux dispositions du code de la propriété intellectuelle (droits d’auteur, droits relatifs aux brevets, marques, dessins et modèles, logos). La mise à disposition du site ne saurait être analysée comme un transfert de propriété aux bénéfices de l’utilisateur. L’utilisateur n’est pas autorisé à décompiler ou désassembler le site, reproduire, représenter, modifier, traduire, adapter, partiellement ou totalement sans l’accord préalable écrit d’Allowinno. </p>

<h2>Article 4 - Traitement de données personnelles</h2>
<p class = "CGU">
    Conformément à la loi Informatique et Libertés n° 78-17 du 6 janvier 1978 modifiée, les traitements de données à caractère personnel réalisés à partir du site ont fait l’objet d’une déclaration (n° 1849317) auprès de la Commission Nationale Informatique et Libertés (CNIL). Les données collectées via l’application sont hébergées par la société Informatique De Sécurité, société agréée par l’Etat et par ASIP Santé. IDS est spécialisée dans la protection et le stockage de données personnelles de santé.
</p>
<h2>Article 5 - Droit d’accès, modification et suppression des données collectées</h2>
<p class = "CGU">
    En application de la loi Informatique et Libertés n° 78-17 du 6 janvier 1978 modifiée, l’utilisateur dispose d’un droit d’accès, de modification, de rectification, d’opposition et de suppression sur les données le concernant collectées sur cette application. Ces droits sont strictement personnels et ne peuvent être exercés que par l’utilisateur pour les données le concernant, ou concernant un autre utilisateur dont il est le représentant légal.
</p>

<h2>Article 6 - Droit applicable</h2>
<p class = "CGU">
    Le présent site, les modules, les conditions d’utilisation sont régies par le droit français, quel que soit le lieu d’utilisation. En cas de contestation éventuelle, et après l’échec de toute tentative de recherche d’une solution amiable, les tribunaux français seront seuls compétents pour répondre à ce litige.
</p>


</body>

<?php include"views/common/footer.php";?>
</html>