<?php
    require_once "../php/libgames.php";
    require_once "../php/games.php";

    if (!empty($_REQUEST['ajouterJeu'])) {
        ?>
        <br><br><br><br><br><br><br><br><br>
        <?php
        echo("Nom jeu : ".$_POST['nomJeu']);
        
        echo("Genres : ");
        foreach ($_POST['genres'] as $genre) {
            echo($genre.", ");
        }

        echo("Plateformes : ");
        foreach ($_POST['plateformes'] as $plateforme) {
            echo($plateforme.", ");
        }

        echo("Text area : ".$_POST['description']);
    }
?>
<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="utf-8"/>
        <title>Pay Respect</title>
        <link rel="icon" type="image/png" href="../images/icone.png" />
        <link rel="stylesheet" href="../styles/squelette.css"/>
        <link rel="stylesheet" href="../styles/admin.css"/>
    </head>

    <body>
        <header>
            <h1>Pay Respect </h1>

            <p>Trouvez plein de jeux sur cet incroyable site qui n’est en fait qu’un prototype réalisé par les bg de BTS SNIR !</p>
            
            <label for="Recherche">Recherche:</label>
            <input type="Recherche" id="Recherche" name="Recherche" aria-label="Recherche">
            
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
                <div class="ajoutJeu">
                    <form method="POST" action="admin.php">
                        <fieldset>
                            <legend>Ajout d'un jeu</legend>
                            <!-- Ajouter une image -->
                            <p>
                                <label for="titre">Titre du jeu :</label>
                                <input type="text" name="nomJeu" required>
                            </p>
                            <div class="choixGenre">
                                <p>
                                    <span>Genre(s) du jeu :</span>

                                    <?php foreach ($tabGenres as $choix) { ?>
                                            <input id="<?php echo(constant($choix['id'])); ?>" type="checkbox" name="genres[]" value="<?php echo(constant($choix['id'])); ?>"/>
                                            <label for="<?php echo(constant($choix['id'])); ?>"><?php echo($choix['nom']); ?></label>
                                    <?php } ?>
                                </p>
                            </div>
                            <div class="choixPlateforme">
                                <p>
                                    <span>Plateforme(s) du jeu :</span>

                                    <?php foreach ($tabPlateformes as $choix) { ?>
                                            <input id="<?php echo(constant($choix['id'])); ?>" type="checkbox" name="plateformes[]" value="<?php echo(constant($choix['id'])); ?>"/>
                                            <label for="<?php echo(constant($choix['id'])); ?>"><?php echo($choix['nom']); ?></label>
                                    <?php }?>
                                </p>
                            </div>
                            <p class="pDescription">Description du jeu :</p>
                            <textarea id="description" name="description" rows="5" cols="100"></textarea>
                            <br>
                            <input type="submit" name="ajouterJeu" value="Ajouter le jeu"/>
                        </fieldset>
                    </form>
                </div>
            </div>
            
            <div class="droite">
                <p>Droite</p>
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
