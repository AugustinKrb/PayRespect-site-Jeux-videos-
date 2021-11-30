<?php require_once "./php/libgames.php" ?>
<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="utf-8"/>
        <title>Pay Respect</title>
        <link rel="icon" type="image/png" href="./images/icone.png" />
        <link rel="stylesheet" href="./styles/squelette.css"/>
        <link rel="stylesheet" href="./styles/index.css"/>
        <script src="script.js"></script>
    </head>

    <body>
        <header>
            <h1>Pay Respect </h1>

            <p>Trouvez plein de jeux sur cet incroyable site qui n’est en fait qu’un prototype réalisé par les bg de BTS SNIR !</p>

            <label for="Recherche">Recherche:</label>
            <input type="Recherche" id="Recherche" name="Recherche" aria-label="Recherche"/>
        </header>

        <main>
            <?php
                /*
                deleteAllGames();
                
                
                //$id = createGame("Ark");
                $id = 1;
                echo($id);
                //saveGenres($id, ['fps', 'GENRE_ADVENTURE']);
                echo("jeu : ".var_dump(getAllGames()));

                /*
                createGame("R6");
                createGame("Forza 5");
                createGame("Battlefield 2042");
                createGame("Riders Republics");
                createGame("Gang beast");
                createGame("The Crew 2");
                createGame("Cyberpunk 2077");
                */
                /*
                echo(var_dump(getAllGames()));
                echo("test : ".var_dump(getGame("18")['title']));
                */
            ?>

            <fieldset class="listeJeux">
                <legend>Tout les jeux</legend>
                <?php
                    foreach (getAllGames() as $tab) { ?>                    
                        <div class="affichageJeu">
                            <details>
                                <summary>
                                    <img class="imageJeu" src="./images/test.png" alt="image test">
                                    <p><?php echo($tab['title']); ?><span class="note"> <img src="./images/etoiles.png"></span></p>
                                </summary>
                                <p class="description">description :</p>
                            </details>
                        </div>
                    <?php }
                ?>
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


            <ul>
                <li>par date</li>
                <li>par note</li>
                <li>par prix</li>
            </ul>
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
