<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="/design/css/Style_page_admin.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>administation</title>
</head>
<body>
<?php
include "views/admin/adminHeader.php";
?>


<div id="body">
    <?php
    echo"<h1> Bienvenu ".$_SESSION['name'] . " " . $_SESSION["firstName"] . " "."</h1>";
    ?>
    <a id="add" href="addDoctor"><img src="/design/img/plus.png" class="plus">Créer un nouveau profil Médecin</a>
    <form method="post" action="index">
        <label for="typeOfUser"></label>
        <select name='typeOfUser' id='typeOfUser'>
            <option value=''>Choisissez une option</option>
            <option value='doctor'>Docteur</option>
            <option value='pilot'>Pilote</option>
        </select>

        <label for="searchUsers">Nom ou prénom:</label>
        <input type="search" id="searchUsers" name="searchUsers"><input name ="search" type="Submit" class="button" value="Rechercher">

    </form>

</div>


<table>

    <?php
    if (isset($_POST['typeOfUser']) and isset($_POST['searchUsers']) and ($_POST['typeOfUser'] != 'Choisissez une option')) {

        require_once('controllers/admin/adminController.php');
        $tableau = processAdminSearchUsers();
        $compteur = count($tableau);//count return n+1 ou n est le nombre d'élément du tableau
        if ($compteur != 1) {
            ?>


            <tr>
                <th>Nom</th>
                <th>Prénom</th>
            </tr>

            <?php
            if($_POST['typeOfUser'] == 'doctor'){
                echo "<h1>Liste des médecins</h1>";
            }else{
                echo "<h1>Liste des pilotes</h1>";
            }

            for ($i = 1; $i < $compteur; $i++) {

                ?>

                <tr>
                    <td>
                        <a href="adminInfoUser?userId=<?php echo $tableau[$i][5]; ?>&typeOfUser=<?php echo $_POST['typeOfUser']; ?> "><?php echo $tableau[$i][1]; ?></a>
                    </td>
                    <td>
                        <a href="adminInfoUser?userId=<?php echo $tableau[$i][5]; ?>&typeOfUser=<?php echo $_POST['typeOfUser']; ?> "><?php echo $tableau[$i][2]; ?></a>
                    </td>
                </tr>

            <?php }
        } else {
            echo "<p>Aucun de résultat</p>";
        }

    }

    ?>
</table>

<?php
include "views/common/footer.php";
?>
</body>
</html>

