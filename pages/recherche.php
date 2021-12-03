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
        <title>Pay Respect</title>
        <link rel="icon" type="image/png" href="../images/icone.png" />
        <link rel="stylesheet" href="../styles/squelette.css"/>
        <link rel="stylesheet" href="../styles/recherche.css"/>
        <script src="script.js"></script>
    </head>

    <body>
        <header>
            <h1>Pay Respect </h1>

            <p>Trouvez plein de jeux sur cet incroyable site qui n’est en fait qu’un prototype réalisé par les bg de BTS SNIR !</p>

            <form action="./recherche.php">
                <label for="recherche">Recherche :</label>
                <input id="recherche" type="search" name="recherche" required>
                <input type="submit">
            </form>
        </header>

        <main>
            <div class="gauche">
                <p>test Gauche</p>
            </div>

            <div class="milieu">
                <fieldset class="listeJeux">
                    <legend><?php echo("Jeux concernant : ".$motCleRecherche); ?></legend>
                    <?php 
                        if (!empty($tabGamesRecherchesNom)) {
                            foreach ((array) $tabGamesRecherchesNom as $game) { ?>
                                <div class="affichageJeu">
                                    <details>
                                        <summary>
                                            <img class="imageJeu" src="../images/test.png" alt="image test">
                                            <p><?php echo($game['title']); ?><span class="note"> <img src="./images/etoiles.png"></span></p>
                                        </summary>
                                        <p class="description">description :</p>
                                    </details>
                                </div>
                            <?php }
                        } else if (!empty($tabGamesRecherchesGenre)) {
                            foreach ((array) $tabGamesRecherchesGenre as $game) { ?>
                                <div class="affichageJeu">
                                    <details>
                                        <summary>
                                            <img class="imageJeu" src="../images/test.png" alt="image test">
                                            <p><?php echo($game['title']); ?><span class="note"> <img src="./images/etoiles.png"></span></p>
                                        </summary>
                                        <p class="description">description :</p>
                                    </details>
                                </div>
                            <?php }
                        } else if (!empty($tabGamesRecherchesPlateforme)) {
                            foreach ((array) $tabGamesRecherchesPlateforme as $game) { ?>
                                <div class="affichageJeu">
                                    <details>
                                        <summary>
                                            <img class="imageJeu" src="../images/test.png" alt="image test">
                                            <p><?php echo($game['title']); ?><span class="note"> <img src="./images/etoiles.png"></span></p>
                                        </summary>
                                        <p class="description">description :</p>
                                    </details>
                                </div>
                            <?php }
                        } else { ?>
                            <p>Nous n'avons trouvés aucun résultat concernant votre recherche..</p>
                        <?php }
                    ?>
                </fieldset>
            </div>

            <div class="droite">
                <p>test Droite</p>
            </div>
        </main>

        <footer>
            <ul>
                <li><a href="mailto:nomdequipe@wanadoo.fr"> Email du Support Technique</a></li>
                <li><a href="tel:+3374518754"> Numéro de Téléphone du Support Technique</a></li>
                <li><a  target="_blank"  href="#">Page d'adminitration</a></li>
            </ul>
        </footer>
    </body>
</html>
