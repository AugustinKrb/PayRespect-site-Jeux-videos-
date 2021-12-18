<?php
    require_once "./php/libgames.php";
    require_once "./php/games.php";

    
?>
<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="utf-8"/>
        <title>Pay Respect - Accueil</title>
        <link rel="icon" type="image/png" href="./images/icone.png"/>
        <link rel="stylesheet" href="./stylesBleu/squelette.css" type="text/css" title="Thème simple"/>
        <link rel="stylesheet" href="./stylesBleu/index.css"/>
    </head>

    <body>
        <header>
            <h1>PayRespect </h1>

            <form action="./pages/recherche.php" target="_blank">
                <label for="recherche">Recherche :</label>
                <input id="recherche" type="search" name="recherche" required>
                <input id="boutonRecherche" type="submit" value="Rechercher">
            </form>

            <div class="menuHaut">
                <nav>
                    <ul>
                        <li><a href="./pages/rechercheComplexe.php">Recherche complexe</a></li>
                    </ul>
                </nav>
            </div>
        </header>

        <main>
            <p id="bgSNIR">Trouvez plein de jeux sur cet incroyable site qui n’est en fait qu’un prototype réalisé par les bg de BTS SNIR !</p>
            <fieldset class="listeJeux">
                    <legend>Tous les jeux</legend>
                    <?php foreach (array_reverse(getAllGames()) as $jeu) { ?>
                        <div class="affichageJeu">
                            <details>
                                <summary>
                                    <div class="divImageJeu">
                                        <a href="<?php echo("./pages/affichageJeu.php?id=".$jeu['id']); ?>" target="_blank"><img class="imageJeu" src="<?php if (file_exists("./images/jeuxUpload/".$jeu['nomImage'])) {echo("./images/jeuxUpload/".$jeu['nomImage']);} else {echo("./images/jeuxUpload/pasDimage.png");} ?>" alt="image test"></a>
                                    </div>
                                    <a href="<?php echo("./pages/affichageJeu.php?id=".$jeu['id']); ?>" target="_blank"><p class="titre"><?php echo($jeu['title']); ?><span class="note"> <img src="./images/etoiles.png"></span></p></a>
                                </summary>
                                <p class="genres">Genre(s) : <?php if (array_key_exists('genres', $jeu)) { echo(afficherGenresOuPlateformes($jeu['genres']));} else { echo("Inconnu...");} ?></p>
                                <p class="plateformes">Plateforme(s) : <?php if (array_key_exists('platforms', $jeu)) { echo(afficherGenresOuPlateformes($jeu['platforms']));} else { echo("Inconnu...");} ?></p>
                                <p class="description">Description : <?php if (array_key_exists('description', $jeu)) { echo($jeu['description']);} else { echo("Inconnu...");} ?></p>
                            </details>
                        </div>
                    <?php } ?>
            </fieldset>
        </main>

        <footer>
            <h2>Pay Respect</h2>
            <p>Augustin KRABANSKY - Mehdi Ragad - Wassim</p>
            <form action="./pages/admin/admin.php" target="_blank">
                <button type="submit">Administrateur</button>
            </form>
        </footer>
    </body>
</html>
