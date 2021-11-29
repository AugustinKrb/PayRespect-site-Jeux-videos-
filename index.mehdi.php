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
       aria-label="Recherche"/>
            
        </header>

        <main>

       <a href="#test 1"><button type="button">test 1</button></a>

            <h3> Les jeux les plus populaires en ce moment !!</h3>

            <div class="listeJeux">
                <div class="affichageJeu">
                    <details>
                        <summary>
                             <img class="imageJeu" src="./images/Battlefield_2042.jpg" alt="image test">
                    <p>Battlefield 2042<span class="note"> <img src="./images/etoiles.png"></span></p>

                        </summary>
                        <p>description 1</p>
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

            

            <h3 id="test 1">Les jeux par categorie par exemple:</h3>


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
                <li>email</li>
                <li>tel num</li>
                <li>@nom d'equipe</li>
            </ul>
        </footer>
    </div>
    </body>
</html>

