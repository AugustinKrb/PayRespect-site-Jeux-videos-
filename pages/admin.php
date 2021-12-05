<?php
    require_once "../php/libgames.php";
    require_once "../php/games.php";

    // Ajouter un jeu
    if (!empty($_REQUEST['ajouterJeu'])) {
        if (empty($_POST['genres']) || empty($_POST['plateformes']) || empty($_POST['description'])) {    //Message d'erreur
            if (empty($_POST['genres'])) {
                $messageErreurAjout .= " un genre,";
            }
            if (empty($_POST['plateformes'])) {
                $messageErreurAjout .= " une plateforme,";
            }
            if (empty($_POST['description'])) {
                $messageErreurAjout .= " une description,";
            }
            $messageErreurAjout = "Il manque".$messageErreurAjout;
            $messageErreurAjout = substr($messageErreurAjout, 0, strlen($messageErreurAjout) - 1); //Supprimer dernière virgule
            $messageErreurAjout .= ".";  //Ajouter point à la fin
        } else {    //Ajout d'un jeu
            $idJeu = createGame($_POST['nomJeu']);
            saveGenres($idJeu, $_POST['genres']);
            savePlatforms($idJeu, $_POST['plateformes']);
            saveDescription($idJeu, $_POST['description']);
            $messageErreurAjout = "Le jeu a bien été ajouté.";
        }
    }

    //Modifier un jeu
    if (!empty($_POST['modifierJeu'])) {
        ?>
        <br><br><br><br><br><br>
        <?php
        if (!empty($_POST['jeuAModifier'])) {
            foreach ($_POST['jeuAModifier'] as $idJeu) {    //Récupère la valeur de l'ID à modifier
                echo("checkbox sélectionnée : ".$idJeu);

                if (!empty($_POST['nomAModifier_'.$idJeu])) {
                    echo("nom : ".$_POST['nomAModifier_'.$idJeu]);
                }

                if (!empty($_POST['genresAModifier_'.$idJeu])) {
                    echo("genre : ".afficherGenresOuPlateformes($_POST['genresAModifier_'.$idJeu]));
                }
        
                if (!empty($_POST['plateformesAModifier_'.$idJeu])) {
                    echo("genre : ".afficherGenresOuPlateformes($_POST['plateformesAModifier_'.$idJeu]));
                }

                if (!empty($_POST['descriptionAModifier_'.$idJeu])) {
                    echo("description : ".$_POST['descriptionAModifier_'.$idJeu]);
                }
                echo("<br>");
            }
        }
    }


    //Supprimer un jeu
    if (!empty($_POST['supprimerJeu'])) {
        if (empty($_POST['jeuASupprimer'])) {   //Message d'erreur
            $messageErreurSuppr .= "Vous n'avez sélectionné aucun jeu.";
        } else {    //Suppression du/des jeu(x)
            $messageErreurSuppr .= "Vous avez supprimer le(s) jeu(x) :";
            foreach ($_POST['jeuASupprimer'] as $id) {
                $jeu = getGame($id);
                $messageErreurSuppr .= " ".$jeu['title'].",";
            }
            $messageErreurSuppr = substr($messageErreurSuppr, 0, strlen($messageErreurSuppr) - 1);
            $messageErreurSuppr .= ".";
            //Supprimer jeu
            foreach ($_POST['jeuASupprimer'] as $id) {
                deleteGame($id);
            }
        }
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
                    <fieldset>
                        <legend>Ajouter un jeu</legend>
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
                                            <input id="<?php echo("ajoutJeuId".constant($choix['id'])); ?>" type="checkbox" name="genres[]" value="<?php echo($choix['id']); ?>"/>
                                            <label for="<?php echo("ajoutJeuId".constant($choix['id'])); ?>"><?php echo($choix['nom']); ?></label>
                                    <?php } ?>
                                </p>
                            </div>
                            <div class="choixPlateforme">
                                <p>
                                    <span>Plateforme(s) du jeu :</span>

                                    <?php foreach ($tabPlateformes as $choix) { ?>
                                            <input id="<?php echo("ajoutJeuId".constant($choix['id'])); ?>" type="checkbox" name="plateformes[]" value="<?php echo($choix['id']); ?>"/>
                                            <label for="<?php echo("ajoutJeuId".constant($choix['id'])); ?>"><?php echo($choix['nom']); ?></label>
                                    <?php }?>
                                </p>
                            </div>
                            <p class="pDescription">Description du jeu :</p>
                            <textarea id="description" name="description" rows="5" cols="100"></textarea>
                            <br>
                            <input type="submit" name="ajouterJeu" value="Ajouter le jeu"/>
                        </form>

                        <p class="messageErreur"><?php echo($messageErreurAjout); ?></p>
                    </fieldset>
                </div>

                <div class="modifierJeu">
                    <fieldset>
                        <legend>Modifier un jeu</legend>
                        <form method="POST" action="admin.php">
                            <table class="tabJeu">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Id jeu</th>
                                        <th>Nom</th>
                                        <th>Genre(s)</th>
                                        <th>Plateforme(s)</th>
                                        <th>Description</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach (array_reverse(getAllGames()) as $jeu) { ?>
                                        <tr>
                                            <td>Petite flèche</td>
                                            <td><?php echo($jeu['id']); ?></td>
                                            <td><?php echo($jeu['title']); ?></td>
                                            <td><?php echo(afficherGenresOuPlateformesSautLignes($jeu['genres'])); ?></td>
                                            <td><?php echo(afficherGenresOuPlateformesSautLignes($jeu['platforms'])); ?></td>
                                            <td><?php echo($jeu['description']); ?></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <label for="<?php echo("nomAModifier_".$jeu['id']); ?>">Nouveau nom</label>
                                                <input type="text" id="<?php echo("nomAModifier_".$jeu['id']); ?>" name="<?php echo("nomAModifier_".$jeu['id']); ?>">
                                            </td>
                                            <td class="genres">
                                                <p>Genre(s) du jeu :</p>
                                                <?php foreach ($tabGenres as $choix) { ?>
                                                        <input id="<?php echo(constant($choix['id'])."_".$jeu['id']); ?>" type="checkbox" name="<?php echo("genresAModifier_".$jeu['id']."[]") ?>" value="<?php echo($choix['id']); ?>"/>
                                                        <label for="<?php echo(constant($choix['id'])."_".$jeu['id']); ?>"><?php echo($choix['nom']); ?></label>
                                                        <br>
                                                <?php } ?>
                                            </td>
                                            <td class="plateformes">
                                                <p>Plateforme(s) du jeu :</p>
                                                <?php foreach ($tabPlateformes as $choix) { ?>
                                                        <input id="<?php echo(constant($choix['id'])."_".$jeu['id']); ?>" type="checkbox" name="<?php echo("plateformesAModifier_".$jeu['id']."[]") ?>" value="<?php echo($choix['id']); ?>"/>
                                                        <label for="<?php echo(constant($choix['id'])."_".$jeu['id']); ?>"><?php echo($choix['nom']); ?></label>
                                                        <br>
                                                <?php }?>
                                            </td>
                                            <td>
                                                <p class="pDescription">Description du jeu :</p>
                                                <textarea id="<?php echo("descriptionAModifier_".$jeu['id']); ?>" name="<?php echo("descriptionAModifier_".$jeu['id']); ?>" rows="5" cols="50"></textarea>
                                            </td>
                                            <td>
                                                <input id="<?php echo("idAModifier_".$jeu['id']); ?>" type="checkbox" name="jeuAModifier[]" value="<?php echo($jeu['id']); ?>"/>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>                            
                            <input type="submit" name="modifierJeu" value="Modifier le(s) jeu(x) sélectionné(s)">
                        </form>
                    </fieldset>
                </div>

                <div class="supprimerJeu">
                    <fieldset>
                        <legend>Supprimer un jeu</legend>
                        <form method="POST" action="admin.php">
                            <table class="tabJeu">
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
                                    <?php foreach (array_reverse(getAllGames()) as $jeu) { ?>
                                        <tr>
                                            <td>
                                                <input id="<?php echo("id".$jeu['id']); ?>" type="checkbox" name="jeuASupprimer[]" value="<?php echo($jeu['id']); ?>"/>
                                            </td>
                                            <td><?php echo($jeu['id']); ?></td>
                                            <td><?php echo($jeu['title']); ?></td>
                                            <td class="genres"><?php echo(afficherGenresOuPlateformes($jeu['genres'])); ?></td>
                                            <td class="plateformes"><?php echo(afficherGenresOuPlateformes($jeu['platforms'])); ?></td>
                                            <td><?php echo($jeu['description']); ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                                <input type="submit" name="supprimerJeu" value="Supprimer le(s) jeu(x)"/>
                        </form>
                        <p class="messageErreur"><?php echo($messageErreurSuppr) ?></p>
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
