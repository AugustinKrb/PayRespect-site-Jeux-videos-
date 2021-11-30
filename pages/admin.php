<?php require_once "./php/libgames.php" ?>
<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="utf-8"/>
        <title>Pay Respect</title>
        <link rel="icon" type="image/png" href="./images/icone.png" />
        <link rel="stylesheet" href="styles/mainStyleNouvellePage.css"/>
        <link rel="stylesheet" href="styles/mainStyle.css"/>
    </head>

    <body>
        <header>
            <h1>Pay Respect </h1>

            <p>Trouvez plein de jeux sur cet incroyable site qui n’est en fait qu’un prototype réalisé par les bg de BTS SNIR !</p>
            
            <label for="Recherche">Recherche:</label>
            <input type="Recherche" id="Recherche" name="Recherche" aria-label="Recherche">
            
        </header>

        <main>
            <div class="test">
            <div class="gauche">
                <p>jeu1</p>
                    <details>
                        <summary>
                            <p>Battlefield 2042<span class="note"> <img src="./images/etoiles.png"></span></p>
                        </summary>
                    </details>
                    <p>jeu2</p>
                    <details>
                        <summary>
                            <p>Battlefield 2042<span class="note"> <img src="./images/etoiles.png"></span></p>
                        </summary>
                    </details>
            </div>

            
            <div class="milieu">
                <a href="index.php"><button>Redirection</button></a>
                <p>Milieu</p>
            </div>
            
            <div class="droite">
                <p>Droite</p>
            </div>
            </div>
        </main>
    </body>
</html>