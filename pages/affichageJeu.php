<?php
    require_once "../php/libgames.php";
    require_once "../php/games.php";

    $idJeu = $_GET['id'];
    $jeuChoisi = getGame($idJeu);

    //Test  AJOUTER UN USER APRES L'IP
    //rateGame(51, "123", 8, "J'aime ce jeu, il est vraiment bien !");
    //rateGame(51, "124", 4, "Bof...");
?>
<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="utf-8"/>
        <title><?php echo($jeuChoisi['title']); ?></title>
        <link rel="icon" type="image/png" href="../images/icone.png" />
        <link rel="stylesheet" href="../styles/squelette.css"/>
        <link rel="stylesheet" href="../styles/affichageJeu.css"/>
        <link rel="stylesheet" href="../styles/affichageJeuMini.css"/>
    </head>

    <body>
        <header>
            <h1>Pay Respect </h1>

            <form action="./recherche.php" target="_blank">
                <label for="recherche">Recherche :</label>
                <input id="recherche" type="search" name="recherche" required>
                <input type="submit" value="Rechercher">
            </form>
            
            <div class="menuHautRecherche">
                <nav>
                    <ul>
                        <li><a href="../index.php">Page principale</a></li>
                        <li><a href="./rechercheComplexe.php">Recherche complexe</a></li>
                    </ul>
                </nav>
            </div>
        </header>

        <main>
            <div class="gauche">
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
            </div>

            <div class="milieu">
                <div class="affichageHautJeuChoisi">
                    <div class="infoJeuChoisi">
                        <p><span class="intituleJeuChoisi">Titre :</span><?php echo(" ".$jeuChoisi['title']); ?></p>
                        <p><span class="intituleJeuChoisi">Genre(s) :</span><?php if (!empty($jeuChoisi['genres'])){ echo(" ".afficherGenresOuPlateformes($jeuChoisi['genres']));} else { echo(" Inconnu..");} ?></p>
                        <p><span class="intituleJeuChoisi">Plateforme(s) :</span><?php if (!empty($jeuChoisi['platforms'])){ echo(" ".afficherGenresOuPlateformes($jeuChoisi['platforms']));} else { echo(" Inconnu...");} ?></p>
                        <p><span class="intituleJeuChoisi">Description :</span><?php if (!empty($jeuChoisi['description'])){ echo(" ".$jeuChoisi['description']);} else { echo(" Inconnu..");} ?></p>
                    </div>

                    <div class="divImageJeuChoisi">
                        <img class="imageJeuChoisi" src="<?php if (file_exists("../images/jeuxUpload/".$jeuChoisi['nomImage'])) {echo("../images/jeuxUpload/".$jeuChoisi['nomImage']);} else {echo("../images/jeuxUpload/pasDimage.png");} ?>" alt="image test">
                    </div>
                </div>
                <div id="avisUtilisateurs">
                    <h1>Avis</h1>
                    <?php  ?>


                    <div class="avisUnique">
                        <div class="nomUserAvis">
                            <p>AntonioDu93</p>
                        </div>
                        <div class="avisUserAvis">
                            <p>Avis feijoijoij oijoz joi</p>
                        </div>
                        <div class="noteUserAvis">
                            <p>8/10</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="droite">
                <p>test Droite</p>
            </div>
        </main>

        <footer>
            <h2>Pay Respect</h2>
            <p>Augustin KRABANSKY - Mehdi Ragad - Wassim</p>
            <form action="./admin.php" target="_blank">
                <button type="submit">Administrateur</button>
            </form>
        </footer>
    </body>
</html>
