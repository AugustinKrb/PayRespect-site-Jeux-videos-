<?php
    require_once "./php/libgames.php";
    require_once "./php/games.php";
?>
<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="utf-8"/>
        <title>Pay Respect</title>
        <link rel="icon" type="image/png" href="./images/icone.png"/>
        <link rel="stylesheet" href="./styles/squelette.css" type="text/css" title="Thème simple"/>
        <link rel="alternate stylesheet" href="./styles/squeletteViolet.css" type="text/css" title="Thème violet"/>
        <link rel="alternate stylesheet" href="./styles/squeletteRouge.css" type="text/css" title="Thème rouge"/>
        <link rel="stylesheet" href="./styles/index.css"/>
    </head>

    <body>
        <header>
            <h1>Pay Respect </h1>

            <form action="./pages/recherche.php" target="_blank">
                <label for="recherche">Recherche :</label>
                <input id="recherche" type="search" name="recherche" required>
                <input type="submit" value="Rechercher">
            </form>
            
            <form class="rechercher" method="GET" action="rechercher.php">
                <input type="text" placeholder="Rechercher">
                <button type="submit">Q</button>
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
            <p>Trouvez plein de jeux sur cet incroyable site qui n’est en fait qu’un prototype réalisé par les bg de BTS SNIR !</p>
            <fieldset class="listeJeux">
                    <legend>Tous les jeux</legend>
                    <?php foreach (array_reverse(getAllGames()) as $jeu) { ?>                    
                        <div class="affichageJeu">
                            <details>
                                <summary>
                                    <a href="<?php echo("./pages/affichageJeu.php?id=".$jeu['id']); ?>" target="_blank"><img class="imageJeu" src="<?php if (file_exists("./images/jeuxUpload/".$jeu['nomImage'])) {echo("./images/jeuxUpload/".$jeu['nomImage']);} else {echo("./images/jeuxUpload/test.png");} ?>" alt="image test"></a>
                                    <a href="<?php echo("./pages/affichageJeu.php?id=".$jeu['id']); ?>" target="_blank"><p class="titre"><?php echo($jeu['title']); ?><span class="note"> <img src="./images/etoiles.png"></span></p></a>
                                </summary>
                                <p class="genres"><?php echo("Genre(s) : ".afficherGenresOuPlateformes($jeu['genres'])); ?></p>
                                <p class="plateformes"><?php echo("Plateforme(s) : ".afficherGenresOuPlateformes($jeu['platforms'])); ?></p>
                                <p class="description"><?php echo("description : ".$jeu['description']); ?></p>
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
            <p>Augustin KRABANSKY - Mehdi Ragad - Wassim</p>
            <form action="./pages/admin.php" target="_blank">
                <button type="submit">Administrateur</button>
            </form>
        </footer>
    </body>
</html>
