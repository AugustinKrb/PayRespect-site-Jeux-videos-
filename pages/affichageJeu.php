<?php
    require_once "../php/libgames.php";
    require_once "../php/games.php";

    $idJeu = $_GET['id'];
    $jeuChoisi = getGame($idJeu);
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
                                    <img class="imageJeuExemple" src="../images/test.png" alt="image test">
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
                        <p><span class="intituleJeuChoisi">Genre(s) :</span><?php echo(" ".afficherGenresOuPlateformes($jeuChoisi['genres'])); ?></p>
                        <p><span class="intituleJeuChoisi">Plateforme(s) :</span><?php echo(" ".afficherGenresOuPlateformes($jeuChoisi['platforms'])); ?></p>
                        <p><span class="intituleJeuChoisi">Description :</span><?php echo(" ".$jeuChoisi['description']); ?></p>
                    </div>

                    <div class="divImageJeuChoisi">
                        <img class="imageJeuChoisi" src="../images/test.png" alt="image test">
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
