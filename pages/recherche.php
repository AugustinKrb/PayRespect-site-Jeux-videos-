<?php
    require_once "../php/libgames.php";
    require_once "../php/games.php";

    $motCleRecherche = $_GET['recherche'];
    $tabGamesRecherchesNom = searchGamesByTitle($motCleRecherche);
    $tabGamesRecherchesGenre = searchGamesByGenre($motCleRecherche);
    $tabGamesRecherchesPlateforme = searchGamesByPlateform($motCleRecherche);
?>
<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="utf-8"/>
        <title>PayRespect - Recherche</title>
        <link rel="icon" type="image/png" href="../images/icone.png" />
        
        <link rel="stylesheet" href="../stylesBleu/recherche.css"/>
        <link rel="stylesheet" href="../stylesBleu/affichageJeuMini.css"/>
        <link rel="stylesheet" href="../stylesBleu/squelette.css"/>
    </head>

    <body>
        <header>
            <h1>Pay Respect </h1>

            <form action="./recherche.php">
                <label for="recherche">Recherche :</label>
                <input id="recherche" type="search" name="recherche" required>
                <input  id="boutonRecherche"type="submit" value="Rechercher">
            </form>
            
            <div class="menuHaut">
                <nav>
                    <ul>
                        <li><a href="../index.php">Page principale</a></li>
                        <li><a href="./rechercheComplexe.php">Recherche complexe</a></li>
                    </ul>
                </nav>
            </div>
        </header>

        <main>
            <section class="gauche">
                <p>Les nouveautés !</p>
                <div class="listeJeuxExemple">
                    <?php
                        $tabJeuxNouveautes = getJeuxOrdreDernierAjouts();
                        for ($i = 0; $i < 4; $i++) { ?>
                            <details class="jeuExemple">
                                <summary>
                                    <img class="imageJeuExemple" src="<?php if (file_exists("../images/jeuxUpload/".$tabJeuxNouveautes[$i]['nomImage'])) {echo("../images/jeuxUpload/".$tabJeuxNouveautes[$i]['nomImage']);} else {echo("../images/jeuxUpload/pasDimage.png");} ?>" alt="image test">
                                    <p><?php echo($tabJeuxNouveautes[$i]['title']); ?><span class="note"> <img src="../images/etoiles.png"></span></p>
                                </summary>
                                <p class="descriptionJeuExemple">description :</p>
                            </details>
                        <?php }
                    ?>
                </div>
            </section>

            <section class="milieu">
                <fieldset class="listeJeux">
                    <legend><?php echo("Jeux concernant : ".$motCleRecherche); ?></legend>
                    <?php 
                        if (!empty($tabGamesRecherchesNom)) {
                            foreach ((array) $tabGamesRecherchesNom as $jeu) { ?>
                                <div class="affichageJeu">
                                    <details>
                                        <summary>
                                            <div class="divImageJeu">
                                                <a href="<?php echo("./affichageJeu.php?id=".$jeu['id']); ?>" target="_blank"><img class="imageJeu" src="<?php if (file_exists("../images/jeuxUpload/".$jeu['nomImage'])) {echo("../images/jeuxUpload/".$jeu['nomImage']);} else {echo("../images/jeuxUpload/pasDimage.png");} ?>" alt="image test"></a>
                                            </div>
                                            <a href="<?php echo("./affichageJeu.php?id=".$jeu['id']); ?>" target="_blank"><p class="titre"><?php echo($jeu['title']); ?><span class="note"> <img src="./images/etoiles.png"></span></p></a>
                                        </summary>
                                        <p class="genres">Genre(s) : <?php if (array_key_exists('genres', $jeu)) { echo(afficherGenresOuPlateformes($jeu['genres']));} else { echo("Inconnu...");} ?></p>
                                        <p class="plateformes">Plateforme(s) : <?php if (array_key_exists('platforms', $jeu)) { echo(afficherGenresOuPlateformes($jeu['platforms']));} else { echo("Inconnu...");} ?></p>
                                        <p class="description">Description : <?php if (array_key_exists('description', $jeu)) { echo($jeu['description']);} else { echo("Inconnu...");} ?></p>
                                    </details>
                                </div>
                            <?php }
                        } else if (!empty($tabGamesRecherchesGenre)) {
                            foreach ((array) $tabGamesRecherchesGenre as $jeu) { ?>
                                <div class="affichageJeu">
                                    <details>
                                        <summary>
                                            <div class="divImageJeu">
                                                <a href="<?php echo("./affichageJeu.php?id=".$jeu['id']); ?>" target="_blank"><img class="imageJeu" src="<?php if (file_exists("../images/jeuxUpload/".$jeu['nomImage'])) {echo("../images/jeuxUpload/".$jeu['nomImage']);} else {echo("../images/jeuxUpload/pasDimage.png");} ?>" alt="image test"></a>
                                            </div>
                                            <a href="<?php echo("./affichageJeu.php?id=".$jeu['id']); ?>" target="_blank"><p class="titre"><?php echo($jeu['title']); ?><span class="note"> <img src="./images/etoiles.png"></span></p></a>
                                        </summary>
                                        <p class="genres">Genre(s) : <?php if (array_key_exists('genres', $jeu)) { echo(afficherGenresOuPlateformes($jeu['genres']));} else { echo("Inconnu...");} ?></p>
                                        <p class="plateformes">Plateforme(s) : <?php if (array_key_exists('platforms', $jeu)) { echo(afficherGenresOuPlateformes($jeu['platforms']));} else { echo("Inconnu...");} ?></p>
                                        <p class="description">Description : <?php if (array_key_exists('description', $jeu)) { echo($jeu['description']);} else { echo("Inconnu...");} ?></p>
                                    </details>
                                </div>
                            <?php }
                        } else if (!empty($tabGamesRecherchesPlateforme)) {
                            foreach ((array) $tabGamesRecherchesPlateforme as $jeu) { ?>
                                <div class="affichageJeu">
                                    <details>
                                        <summary>
                                            <div class="divImageJeu">
                                                <a href="<?php echo("./affichageJeu.php?id=".$jeu['id']); ?>" target="_blank"><img class="imageJeu" src="<?php if (file_exists("../images/jeuxUpload/".$jeu['nomImage'])) {echo("../images/jeuxUpload/".$jeu['nomImage']);} else {echo("../images/jeuxUpload/pasDimage.png");} ?>" alt="image test"></a>
                                            </div>
                                            <a href="<?php echo("./affichageJeu.php?id=".$jeu['id']); ?>" target="_blank"><p class="titre"><?php echo($jeu['title']); ?><span class="note"> <img src="./images/etoiles.png"></span></p></a>
                                        </summary>
                                        <p class="genres">Genre(s) : <?php if (array_key_exists('genres', $jeu)) { echo(afficherGenresOuPlateformes($jeu['genres']));} else { echo("Inconnu...");} ?></p>
                                        <p class="plateformes">Plateforme(s) : <?php if (array_key_exists('platforms', $jeu)) { echo(afficherGenresOuPlateformes($jeu['platforms']));} else { echo("Inconnu...");} ?></p>
                                        <p class="description">Description : <?php if (array_key_exists('description', $jeu)) { echo($jeu['description']);} else { echo("Inconnu...");} ?></p>
                                    </details>
                                </div>
                            <?php }
                        } else { ?>
                            <p>Nous n'avons trouvé aucun résultat concernant votre recherche...</p>
                        <?php }
                    ?>
                </fieldset>
            </section>

            <section class="droite">
                <p>test Droite</p>
            </section>
        </main>

        <footer>
            <h2>Pay Respect</h2>
            <p>Augustin KRABANSKY - Mehdi Ragad - Wassim</p>
            <form action="./admin/admin.php" target="_blank">
                <button type="submit">Administrateur</button>
            </form>
        </footer>
    </body>
</html>
