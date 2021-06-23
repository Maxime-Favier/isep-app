<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Accueil</title>
    <link href="/design/css/Style_accueil.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<?php
include "views/common/headerIndex.php";
?>

<section class="presentation">
    <p>
        "Les mesures les plus précises, les appareils les plus fiables"
    </p>
</section>
<section class=corp>
    <div id="photos">
        <div id="gallery">
            <div><a href="#0"><img src="/design/img/1.jpg"></a></div>
            <div><a href="#1"><img src="/design/img/2.jpg"></a></div>
            <div><a href="#2"><img src="/design/img/3.jpg"></a></div>
            <div><a href="#3"><img src="/design/img/4.jpg"></a></div>
        </div>
        <img src="/design/img/1.jpg" id="base">
        <div id="main">
            <ul>
                <li><img src="/design/img/1.jpg" id="0"></li>
                <li><img src="/design/img/2.jpg" id="1"></li>
                <li><img src="/design/img/3.jpg" id="2"></li>
                <li><img src="/design/img/4.jpg" id="3"></li>
            </ul>
        </div>
    </div>


    <div class="Articles">
        <article>
            <h2>Infinite Measures partenaire du monde</h2>
            <p>Infinite Measures travaille en partenariat avec plus de 50 différentes compagnies aériennes à travers le monde afin d’assurer la formation de leurs pilotes. Nous mettons notre système Innofly au service de tous ceux qui souhaitent devenir pilote ou ceux qui veulent simplement réévaluer leurs compétences.  Innofly est disponible uniquement en français pour l’instant, mais une traduction dans plusieurs autres langages est prévue dans le futur proche.</p>
        </article>

        <article>
            <h2>Infinite Measures nouveau leader du suivi des pilotes</h2>
            <p>Grâce au système Innofly, les compagnies aériennes peuvent suivre l'état de leurs pilotes en un clic. Innofly permet aussi au pilote de connaître ses propres capacités et aussi contacter son médecin en cas de doute. Innofly utilise des technologies de pointe dans la mesure des capacités psychotechniques et fournit des informations exactes à l'utilisateur. Un test simple à réaliser pour le pilote, et des résultats simples à analyser pour le médecin, voici ce qu’offre notre système.</p>
        </article>

        <article>
            <h2>Patch 1.1.4 d’Innofly</h2>
            <p>-Amélioration de la messagerie.</p>
            <p>-Fixation d’un bug sur le footer.</p>
        </article>

        <article>
            <h2>Patch 1.1.3 d’Innofly</h2>
            <p>-Changement esthétique de la mise en page.</p>
        </article>

    </div>
</section>

<?php
include "views/common/footer.php";
?>
</body>
</html>