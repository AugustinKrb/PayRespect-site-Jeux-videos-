<?php
    require_once "./php/libgames.php";
    require_once "./php/games.php";
?>
<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="utf-8"/>
        <title>Pay Respect</title>
        <link rel="icon" type="image/png" href="./images/icone.png" />
        <link rel="stylesheet" href="./styles/squelette.css"/>
        <link rel="stylesheet" href="./styles/index.css"/>
    </head>

    <body>
        <header>
            <h1>Pay Respect </h1>

            <p>Trouvez plein de jeux sur cet incroyable site qui n’est en fait qu’un prototype réalisé par les bg de BTS SNIR !</p>

            <form action="./pages/recherche.php">
                <label for="recherche">Recherche :</label>
                <input id="recherche" type="search" name="recherche" required>
                <input type="submit">
            </form>
        </header>

        <main>
            <div class="menuHaut">
                <nav>
                    <ul>
                        <li><a href="./pages/rechercheComplexe.php">Recherche complexe</a></li>
                        <li><a href="./pages/admin.php">Administrateur</a></li>
                    </ul>
                </nav>
            </div>
            <fieldset class="listeJeux">
                    <legend>Tout les jeux</legend>
                    <?php foreach (getAllGames() as $tab) { ?>                    
                        <div class="affichageJeu">
                            <details>
                                <summary>
                                    <img class="imageJeu" src="./images/test.png" alt="image test">
                                    <p class="titre"><?php echo($tab['title']); ?><span class="note"> <img src="./images/etoiles.png"></span></p>
                                </summary>
                                <p class="genres"><?php echo("Genre(s) : ".afficherGenresOuPlateformes($tab['genres'])); ?></p>
                                <p class="plateformes"><?php echo("Plateforme(s) : ".afficherGenresOuPlateformes($tab['platforms'])); ?></p>
                                <p class="description"><?php echo("description : ".$tab['description']); ?></p>
                            </details>
                        </div>
                    <?php } ?>
            </fieldset>

            <h3> Les jeux les plus populaires en ce moment !!</h3>

            <div class="listeJeux">
                <div class="affichageJeu">
                    <details>
                        <summary>
                             <img class="imageJeu" src="./images/Battlefield_2042.jpg" alt="image test">
                    <p>Battlefield 2042<span class="note"> <img src="./images/etoiles.png"></span></p>

                        </summary>
                        <p>description</p>
                    </details>
                   
                </div>

                <div class="affichageJeu">
                    <img class="imageJeu" src="./images/ForzaHorizon5.jpg" alt="image test">
                    <p>Forza Horizon 5<span class="note"><img src="./images/etoiles.png"></span></p>
                </div>

                <div class="affichageJeu">
                    <img class="imageJeu" src="./images/riderepublic.png" alt="image test">
                    <p>Riders Republics<span class="note"><img src="./images/etoiles.png"></span></p>
                </div>
            </div>


            <h3>Les jeux sortis cette semaine </h3>

            <div class="listeJeux">
                <div class="affichageJeu">
                    <img class="imageJeu" src="./images/test.png" alt="image test">
                    <p>Jurassic World Evolution 2<span class="note">étoile</span></p>
                </div>

                <div class="affichageJeu">
                    <img class="imageJeu" src="./images/test.png" alt="image test">
                    <p>GTA Trilogy<span class="note">étoile</span></p>
                </div>

                <div class="affichageJeu">
                    <img class="imageJeu" src="./images/test.png" alt="image test">
                    <p>Farming Simulator 22<span class="note">étoile</span></p>
                </div>
            </div>

            

            <h3>Les jeux par categorie par exemple:</h3>


            <div class="listeJeux">
                <div class="affichageJeu">
                    <img class="imageJeu" src="./images/test.png" alt="image test">
                    <p>Titre du jeu 1<span class="note">étoile</span></p>
                </div>

                <div class="affichageJeu">
                    <img class="imageJeu" src="./images/test.png" alt="image test">
                    <p>Titre du jeu 2<span class="note">étoile</span></p>
                </div>

                <div class="affichageJeu">
                    <img class="imageJeu" src="./images/test.png" alt="image test">
                    <p>Titre du jeu 3<span class="note">étoile</span></p>
                </div>
            </div>
        </main>

        <footer>
            <h2>Pay Respect</h2>
            <p>Augustin KRABANSKY - Medhi Ragad - Wassim</p>
        </footer>
    </body>
</html>
