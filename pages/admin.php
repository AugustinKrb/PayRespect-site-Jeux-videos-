<?php
    require_once "../php/libgames.php";
    require_once "../php/games.php";

    // Ajouter un jeu
    if (!empty($_REQUEST['ajouterJeu'])) {
        if (empty($_POST['genres']) || empty($_POST['plateformes']) || empty($_POST['description'])) {    //Message d'erreur
            if (empty($_POST['genres'])) {
                $messageErreur .= " un genre,";
            }
            if (empty($_POST['plateformes'])) {
                $messageErreur .= " une plateforme,";
            }
            if (empty($_POST['description'])) {
                $messageErreur .= " une description,";
            }
            $messageErreur = "Il manque".$messageErreur;
            $messageErreur = substr($messageErreur, 0, strlen($messageErreur) - 1); //Supprimer dernière virgule
            $messageErreur .= ".";  //Ajouter point à la fin
        } else {    //Ajout d'un jeu
            $idJeu = createGame($_POST['nomJeu']);
            saveGenres($idJeu, $_POST['genres']);
            savePlatforms($idJeu, $_POST['plateformes']);
            saveDescription($idJeu, $_POST['description']);
            $messageErreur = "Le jeu a bien été ajouté.";
        }
    }

    //Modifier un jeu

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
                    <fieldset>
                        <legend>Ajout d'un jeu</legend>
                        <form method="POST" action="admin.php">
                            <!-- Ajouter une image -->
                            <p>
                                <label for="titre">Titre du jeu :</label>
                                <input type="text" name="nomJeu" required>
                            </p>
                            <div class="choixGenre">
                                <p>
                                    <span>Genre(s) du jeu :</span>

                                    <?php foreach ($tabGenres as $choix) { ?>
                                            <input id="<?php echo(constant($choix['id'])); ?>" type="checkbox" name="genres[]" value="<?php echo($choix['id']); ?>"/>
                                            <label for="<?php echo(constant($choix['id'])); ?>"><?php echo($choix['nom']); ?></label>
                                    <?php } ?>
                                </p>
                            </div>
                            <div class="choixPlateforme">
                                <p>
                                    <span>Plateforme(s) du jeu :</span>

                                    <?php foreach ($tabPlateformes as $choix) { ?>
                                            <input id="<?php echo(constant($choix['id'])); ?>" type="checkbox" name="plateformes[]" value="<?php echo($choix['id']); ?>"/>
                                            <label for="<?php echo(constant($choix['id'])); ?>"><?php echo($choix['nom']); ?></label>
                                    <?php }?>
                                </p>
                            </div>
                            <p class="pDescription">Description du jeu :</p>
                            <textarea id="description" name="description" rows="5" cols="100"></textarea>
                            <br>
                            <input type="submit" name="ajouterJeu" value="Ajouter le jeu"/>
                        </form>

                        <p class="messageErreur"><?php echo($messageErreur); ?></p>
                    </fieldset>
                </div>
                <div class="modifierJeu">
                    <fieldset>
                        <legend>Modifier un jeu</legend>
                        <table>
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Id jeu</th>
                                    <th>Nom</th>
                                    <th>Genre(s)</th>
                                    <th>Plateforme(s)</th>
                                    <th>Description</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach (getAllGames() as $jeu) { ?>
                                    <tr>
                                        <td>
                                            <input id="<?php echo("id".$jeu['id']); ?>" type="checkbox" name="jeuSupprimer[]" value="<?php echo("id".$jeu['id']); ?>"/>
                                        </td>
                                        <td><?php echo($jeu['id']); ?></td>
                                        <td><?php echo($jeu['title']); ?></td>
                                        <td><?php echo(afficherGenresOuPlateformes($jeu['genres'])); ?></td>
                                        <td><?php echo(afficherGenresOuPlateformes($jeu['platforms'])); ?></td>
                                        <td><?php echo($jeu['description']); ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </fieldset>
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
