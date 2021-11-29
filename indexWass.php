<?php require_once "./php/libgames.php" ?>
<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="utf-8"/>
        <title>Pay Respect</title>
        <link rel="icon" type="image/png" href="./images/icone.png" />
        <link rel="stylesheet" href="styles/mainStyle.css"/>
        <script src="script.js"></script>
    </head>

    <body>
        <header>
            <h1>Pay Respect </h1>

            <p>Trouvez plein de jeux sur cet incroyable site qui n’est en fait qu’un prototype réalisé par les bg de BTS SNIR !</p>
            
            <label for="Recherche">Recherche:</label>
<input type="Recherche" id="Recherche" name="Recherche"
       aria-label="Recherche">
            
        </header>

        <main>
            <h3> Les jeux les plus populaires en ce moment !!</h3>

            <div class="listeJeux">
                <div class="affichageJeu">
                    <details>
                        <summary>
                             <img class="imageJeu" src="./images/Battlefield_2042.jpg" alt="image test">
                    <p>Battlefield 2042<span class="note"> <img src="./images/etoiles.png"></span></p>

                        </summary>
                        <div class="scroller">
                        <p>Battlefield 2042 est un jeu vidéo de tir à la première personne développé par DICE et édité par Electronic Arts. Le titre fait partie de la série Battlefield. Le jeu est sorti le 19 novembre 2021 sur Microsoft Windows, PlayStation 4, PlayStation 5, Xbox One et Xbox Series. 
                        </p>
                    </div>
                    </details>
                   
                </div>

                <div class="affichageJeu">
                    <details>
                        <summary>
                            <img class="imageJeu" src="./images/ForzaHorizon5.jpg" alt="image test">
                    <p>Forza Horizon 5<span class="note"><img src="./images/etoiles.png"></span></p>
                        </summary>
                        <p>description 2</p>
                    </details>
                    
                </div>

                <div class="affichageJeu">
                    <details>
                        <summary>
                            <img class="imageJeu" src="./images/riderepublic.png" alt="image test">
                    <p>Riders Republics<span class="note"><img src="./images/etoiles.png"></span></p>
                        </summary>
                        <p>description 3</p>
                    </details>
                    
                </div>
            </div>


            <h3>Les jeux sortis cette semaine </h3>

            <div class="listeJeux">
                <div class="affichageJeu">
                    <details>
                        <summary>
                            <img class="imageJeu" src="./images/test.png" alt="image test">
                    <p>Jurassic World Evolution 2<span class="note">étoile</span></p>
                        </summary>
                        <p>description 4</p>
                    </details>
                    
                </div>

                <div class="affichageJeu">
                    <details>
                        <summary>
                            <img class="imageJeu" src="./images/test.png" alt="image test">
                    <p>GTA Trilogy<span class="note">étoile</span></p>
                        </summary>
                        <p>description 5</p>
                    </details>
                    
                </div>

                <div class="affichageJeu">
                    <details>
                        <summary>
                            <img class="imageJeu" src="./images/test.png" alt="image test">
                    <p>Farming Simulator 22<span class="note">étoile</span></p>
                        </summary>
                        <p>description 6</p>
                    </details>
                    
                </div>
            </div>

            

            <h3>Les jeux par categorie par exemple:</h3>


            <div class="listeJeux">
                <div class="affichageJeu">
                    <details>
                        <summary>
                            <img class="imageJeu" src="./images/test.png" alt="image test">
                    <p>Titre du jeu 1<span class="note">étoile</span></p>
                        </summary>
                        <p>description 7</p>
                    </details>
                    
                </div>

                <div class="affichageJeu">
                    <details>
                        <summary>
                            <img class="imageJeu" src="./images/test.png" alt="image test">
                    <p>Titre du jeu 2<span class="note">étoile</span></p>
                        </summary>
                        <p>description 8</p>
                    </details>
                    
                </div>

                <div class="affichageJeu">
                    <details>
                        <summary>
                            <img class="imageJeu" src="./images/test.png" alt="image test">
                    <p>Titre du jeu 3<span class="note">étoile</span></p>
                        </summary>
                        <p>description 9</p>
                    </details>
                    
                </div>
            </div>


            <ul>
                <li>par date</li>
                <li>par note</li>
                <li>par prix</li>
            </ul>
        </main>


        <div class="pied" >
        <footer>
            <ul>
                <li><a href="mailto:nomdequipe@wanadoo.fr"> Email du Support Technique</a></li>
                <li><a href="tel:+3374518754"> Numéro de Téléphone du Support Technique</a></li>
                <li><a  target="_blank"  href="https://www.imdb.com/">Page d'adminitration</a></li>
            </ul>
        </footer>
    </div>
    </body>
</html>
