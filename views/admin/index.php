<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>administation</title>
</head>
<body>
interface admin<br/>
<?php
echo $_SESSION['name'] . " - " . $_SESSION["firstName"] . " - " . $_SESSION['email'] . " - " . $_SESSION["role"];
?>
<br/>
<a href="../logout">logout</a>
<br/>
<a href="editProfile">editProfile</a>
<br/>
<a href="addDoctor">Add doctor</a>
<br/>
<a href="../messaging/index">messaging</a>
<br/>
<a href="editfaq">Edit FAQ</a>

<form method="post" action="index">
    <label for="typeOfUser"></label>
    <select name='typeOfUser' id='typeOfUser'>
        <option value=''>Choisissez une option</option>
        <option value='doctor'>docteur</option>
        <option value='pilot'>pilote</option>
    </select>

    <label for="searchUsers">Nom ou prénom:</label>
    <input type="search" name="searchUsers" id="searchUsers"/>

</form>
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
            for ($i = 1; $i < $compteur; $i++) {

                ?>

                <tr>
                    <th>
                        <a href="adminInfoUser?userId=<?php echo $tableau[$i][5]; ?>&typeOfUser=<?php echo $_POST['typeOfUser']; ?> "><?php echo $tableau[$i][1]; ?></a>
                    </th>
                    <th>
                        <a href="adminInfoUser?userId=<?php echo $tableau[$i][5]; ?>&typeOfUser=<?php echo $_POST['typeOfUser']; ?> "><?php echo $tableau[$i][2]; ?></a>
                    </th>
                </tr>

            <?php }
        } else {
            echo "Aucun de résultat";
        }

    }

    ?>
</table>
</body>
</html>

