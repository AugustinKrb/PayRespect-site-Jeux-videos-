<?php
    require_once "../../php/libgames.php";
    require_once "../../php/games.php";

    // Ajouter un jeu
    if (!empty($_REQUEST['ajouterJeu'])) {
        $messageErreurAjout = "Le jeu ".$_POST['nomJeu']." a bien été ajouté,";
        $idJeu = createGame($_POST['nomJeu']);  //Créer jeu avec titre
        //Ajout genres
        if (!empty($_POST['genres'])) {
            saveGenres($idJeu, $_POST['genres']);
            $messageErreurAjout .= " avec un/des genre(s),";
        }
        //Ajout plateformes
        if (!empty($_POST['plateformes'])) {
            savePlatforms($idJeu, $_POST['plateformes']);
            $messageErreurAjout .= " avec une/des plateforme(s),";
        }
        //AAjout description
        if (!empty($_POST['description'])) {
            saveDescription($idJeu, $_POST['description']);
            $messageErreurAjout .= " avec une description,";
        }
        $messageErreurAjout = substr($messageErreurAjout, 0, strlen($messageErreurAjout) - 1); //Supprimer dernière virgule
        $messageErreurAjout .= ".";  //Ajouter point à la fin

        //Message générique
        //$messageErreurAjout = "Le jeu a bien été ajouté";   

        //Gérer l'upload de l'image du jeu
        if (!empty($_FILES['imageJeu'])) {
            $dossierUploadImage = '../images/jeuxUpload/';
            $nomFichier = basename($_FILES['imageJeu']['name']);
            $extensionsAccept = [".png", ".gif", ".jpg", ".jpeg"];    //array('.png', '.gif', '.jpg', '.jpeg');
            $extensionImage = strrchr($_FILES['imageJeu']['name'], '.'); 
            //Verif bonne extension
            if(in_array($extensionImage, $extensionsAccept) && !isset($erreur)) { //S'il n'y a pas d'erreur, on upload
                //On formate le nom du fichier ici...
                $nomFichier = strtr($nomFichier, 
                    'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 
                    'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
                $nomFichier = preg_replace('/([^.a-z0-9]+)/i', '-', $nomFichier);

                if(move_uploaded_file($_FILES['imageJeu']['tmp_name'], $dossierUploadImage . $nomFichier)) {//Si la fonction renvoie TRUE, c'est que ça a fonctionné...
                    $messageErreurAjout = "Le jeu a bien été ajouté";
                    //Ajout chemin image au jeu
                    saveImage($idJeu, $nomFichier);
                } else {
                    saveImage($idJeu, "pasDimage.png"); //Image par défaut, ne sais pas pourquoi on doit le mettre ici
                }

            } else {    //Sinon il y a une erreur dans l'upload
                saveImage($idJeu, "pasDimage.png");    //Image par défaut
            }
            if (!in_array($extensionImage, $extensionsAccept)) {
                $messageErreurAjout = "Jeux ajouté sans image --> extensions acceptées : .png, .gif, .jpg, .jpeg...";
            }
        }
    }

    //Modifier un jeu
    if (!empty($_POST['modifierJeu'])) {
        $idJeu = $_GET['iDModif'];   //Récupérer jeu avec id dans le lien
        $jeu = getGame($idJeu);
        //$messageErreurModif = "Vous avez modifié le jeu ".$jeu['title']." :<br>";

        if (!empty($_POST['nomAModifier_'.$idJeu])) {
            saveTitle($idJeu, $_POST['nomAModifier_'.$idJeu]);
            //$messageErreurModif .= "le nom du jeu => \"".$jeu['title']."\" par => \"".$_POST['nomAModifier_'.$idJeu]."\"<br>";
        }
        if (!empty($_POST['genresAModifier_'.$idJeu])) {
            saveGenres($idJeu, $_POST['genresAModifier_'.$idJeu]);
            //$messageErreurModif .= "le(s) genre(s) => \"".afficherGenresOuPlateformes($jeu['genres'])."\" par => \"".afficherGenresOuPlateformes($_POST['genresAModifier_'.$idJeu])."\"<br>";
        }        
        if (!empty($_POST['plateformesAModifier_'.$idJeu])) {
            savePlatforms($idJeu, $_POST['plateformesAModifier_'.$idJeu]);
            //$messageErreurModif .= "la/les plateforme(s) => \"".afficherGenresOuPlateformes($jeu['platforms'])."\" par => ".afficherGenresOuPlateformes($_POST['plateformesAModifier_'.$idJeu])."\"<br>";
        }
        if (!empty($_POST['descriptionAModifier_'.$idJeu])) {
            saveDescription($idJeu, $_POST['descriptionAModifier_'.$idJeu]);
            //$messageErreurModif .= "la description => \"".$jeu['description']."\" par => \"".$_POST['descriptionAModifier_'.$idJeu]."\"";
        }

        //$messageErreurModif = str_replace(".", "", $messageErreurModif);
        //$messageErreurModif .= ".";

        //Message générique
        $messageErreurModif = "Le jeu a bien été modifié";


        //Gérer l'upload de l'image du jeu modifiée
        if (!empty($_FILES['imageAModifier_'.$idJeu])) {
            $dossierUploadImage = '../images/jeuxUpload/';
            $nomFichier = basename($_FILES['imageAModifier_'.$idJeu]['name']);
            $extensionsAccept = [".png", ".gif", ".jpg", ".jpeg"];    //array('.png', '.gif', '.jpg', '.jpeg');
            $extensionImage = strrchr($_FILES['imageAModifier_'.$idJeu]['name'], '.'); 
            //Verif bonne extension
            if(in_array($extensionImage, $extensionsAccept) && !isset($erreur)) { //S'il n'y a pas d'erreur, on upload
                //On formate le nom du fichier ici...
                $nomFichier = strtr($nomFichier, 
                    'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 
                    'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
                $nomFichier = preg_replace('/([^.a-z0-9]+)/i', '-', $nomFichier);

                if(move_uploaded_file($_FILES['imageAModifier_'.$idJeu]['tmp_name'], $dossierUploadImage . $nomFichier)) {//Si la fonction renvoie TRUE, c'est que ça a fonctionné...
                    $messageErreurAjout = "Le jeu a bien été ajouté";
                    //Ajout chemin image au jeu
                    saveImage($idJeu, $nomFichier);
                } else {
                    saveImage($idJeu, "pasDimage.png"); //Image par défaut, ne sais pas pourquoi on doit le mettre ici
                }

            } else {    //Sinon il y a une erreur dans l'upload
                saveImage($idJeu, "pasDimage.png");    //Image par défaut
            }
        }
    }


    //Supprimer un jeu
    if (!empty($_POST['supprimerJeu'])) {
        $idJeu = $_GET['iDSuppr'];   //Récupérer jeu avec id dans le lien

        //Supprimer jeu
        deleteGame($idJeu);

        //Message générique
        $messageErreurSuppr = "Le jeu a bien été supprimé";
    }

    $numAfficherModifJeuId = 0; //ajouter class par ligne à masquer
?>
<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="utf-8"/>
        <title>PayRespect - Administration</title>
        <link rel="icon" type="image/png" href="../../images/icone.png" />
        
        <link rel="stylesheet" href="../../stylesBleu/admin.css"/>
        <link rel="stylesheet" href="../../stylesBleu/affichageJeuMini.css"/>
        <link rel="stylesheet" href="../../stylesBleu/squelette.css"/>
        <script src="../../js/games.js"></script>
    </head>

    <body onload="ancienChoixAdmin();">
        <header>
            <h1>Pay Respect </h1>
            
            <form action="../recherche.php" target="_blank">
                <label for="recherche">Recherche :</label>
                <input id="recherche" type="search" name="recherche" required>
                <input  id="boutonRecherche"type="submit" value="Rechercher">
            </form>
            
            <div class="menuHaut">
                <nav>
                    <ul>
                        <li><a href="../../index.php">Page principale</a></li>
                        <li><a href="../rechercheComplexe.php">Recherche complexe</a></li>
                    </ul>
                </nav>
            </div>
        </header>

        <main>
            <section class="gauche">
                <p class="titreJeuxExemple">Les nouveautés !</p>
                <div class="listeJeuxExemple">
                    <?php
                        $tabJeuxNouveautes = array_reverse(getAllGames());
                        for ($i = 0; $i < 5; $i++) { ?>
                            <a href="<?php echo("./affichageJeu.php?id=".$tabJeuxNouveautes[$i]['id']); ?>">
                                <table class="tabJeuMini">
                                    <tr>
                                        <td><img class="imageJeuExemple" src="<?php if (file_exists("../../images/jeuxUpload/".$tabJeuxNouveautes[$i]['nomImage'])) {echo("../../images/jeuxUpload/".$tabJeuxNouveautes[$i]['nomImage']);} else {echo("../../images/jeuxUpload/pasDimage.png");} ?>" alt="image jeu"></td>
                                    </tr>
                                    <tr>
                                        <td><p><?php echo($tabJeuxNouveautes[$i]['title']); ?><span class="note"></span></p></td>
                                    </tr>
                                </table>
                            </a>
                        <?php }
                    ?>
                </div>
            </section>
            
            <section class="milieu">
                <nav class="choixAdmin">
                    <ul>
                        <li onclick="afficherChoixAdmin('ajouterJeu');">Ajouter un jeu</li>
                        <li onclick="afficherChoixAdmin('modifierJeu');">Modifier un jeu</li>
                        <li onclick="afficherChoixAdmin('supprimerJeu');">Supprimer un jeu</li>
                    </ul>
                </nav>
                <div id="ajouterJeu">
                    <fieldset>
                        <legend>Ajouter un jeu</legend>
                        <p class="messageErreur"><?php echo($messageErreurAjout); ?></p>
                        <form method="POST" action="admin.php" enctype="multipart/form-data">
                            <!-- Ajouter une image -->
                            <p>
                                <label for="titreAjoutJeu" class="sousligneGras">Titre du jeu :</label>
                                <input id="titreAjoutJeu" type="text" name="nomJeu" onkeyup="miseAJourAffichageAperçu('titre')" required>
                            </p>
                            <p>
                                <label for="imageAjoutJeu" class="sousligneGras">Ajouter une image :</label>
                                <input id="imageAjoutJeu" type="file" accept="image/*" name="imageJeu" onchange="apercuImage(event)">
                            </p>
                            <div class="choixGenre">
                                <p>
                                    <span class="sousligneGras">Genre(s) du jeu :</span>

                                    <?php foreach ($tabGenres as $choix) { ?>
                                            <input id="<?php echo("ajoutJeuId".constant($choix['id'])); ?>" class="listeGenresPourApercu" type="checkbox" name="genres[]" value="<?php echo($choix['id']); ?>" onclick="miseAJourAffichageAperçu('genres')"/>
                                            <label for="<?php echo("ajoutJeuId".constant($choix['id'])); ?>"><?php echo($choix['nom']); ?></label>
                                    <?php } ?>
                                </p>
                            </div>
                            <div class="choixPlateforme">
                                <p>
                                    <span class="sousligneGras">Plateforme(s) du jeu :</span>

                                    <?php foreach ($tabPlateformes as $choix) { ?>
                                            <input id="<?php echo("ajoutJeuId".constant($choix['id'])); ?>" class="listePlateformesPourApercu" type="checkbox" name="plateformes[]" value="<?php echo($choix['id']); ?>" onclick="miseAJourAffichageAperçu('plateformes')"/>
                                            <label for="<?php echo("ajoutJeuId".constant($choix['id'])); ?>"><?php echo($choix['nom']); ?></label>
                                    <?php }?>
                                </p>
                            </div>
                            <p class="sousligneGras">Description du jeu :</p>
                            <textarea id="description" name="description" rows="5" cols="100" onkeyup="miseAJourAffichageAperçu('description')"></textarea>
                            <br>
                            <input id="boutonAjouterLeJeu" type="submit" name="ajouterJeu" value="Ajouter le jeu"/>
                        </form>
                        <table class="apercuAjoutJeu">
                            <tr>
                                <td class="tdImageAperçu">
                                    <img id="imageAperçu"  src="../../images/jeuxUpload/pasDimage.png">
                                </td>
                                <td class="infoJeuAperçu">
                                    <p>Titre : <span id="nomJeuAperçu"></span</p>
                                    <p>Genres : <span id="genresJeuAperçu"></span</p>
                                    <p>Plateformes : <span id="plateformesJeuAperçu"></span</p>
                                    <p>Description : <span id="descriptionJeuAperçu"></span></p>
                                </td>
                            </tr>
                        </table>
                    </fieldset>
                </div>

                <div id="modifierJeu">
                    <fieldset>
                        <legend>Modifier un jeu</legend>
                        <p class="messageErreur"><?php echo($messageErreurModif); ?></p>
                        <table class="tabJeu">
                            <thead>
                                <tr>
                                    <th>Id jeu</th>
                                    <th>Image</th>
                                    <th>Nom</th>
                                    <th>Genre(s)</th>
                                    <th>Plateforme(s)</th>
                                    <th>Description</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach (array_reverse(getAllGames()) as $jeu) {
                                    $numAfficherModifJeuId++ ?>
                                    <form method="POST" action="<?php echo("admin.php?iDModif=".$jeu['id']."#jeuAModifId_".$jeu['id']); ?>" enctype="multipart/form-data">
                                        <tr id="<?php echo("jeuAModifId_".$jeu['id']); ?>" <?php echo("onclick=\"afficherOptionsModificationsJeu('afficherModifJeuId$numAfficherModifJeuId');\" "); ?>>
                                            <td><?php echo($jeu['id']); ?></td>
                                            <td><img class="imageJeuModif" src="<?php if (file_exists("../../images/jeuxUpload/".$jeu['nomImage'])) {echo("../../images/jeuxUpload/".$jeu['nomImage']);} else {echo("../../images/jeuxUpload/pasDimage.png");} ?>" alt="image jeu"></td>
                                            <td><?php echo($jeu['title']); ?></td>
                                            <td><?php if (!empty($jeu['genres'])) {echo(afficherGenresOuPlateformesSautLignes($jeu['genres']));} ?></td>
                                            <td><?php if (!empty($jeu['platforms'])) {echo(afficherGenresOuPlateformesSautLignes($jeu['platforms']));} ?></td>
                                            <td><?php if (!empty($jeu['description'])) {echo($jeu['description']);} ?></td>
                                            <td></td>
                                        </tr>
                                        <tr class="<?php echo("afficherModifJeuId".$numAfficherModifJeuId) ?> cacherOptionsJeu">
                                            <td></td>
                                            <td>
                                                <label for="imageModifJeu" class="sousligneGras">Nouvelle image :</label>
                                                <input class="imageModifJeu" type="file" accept="image/*" name="<?php echo("imageAModifier_".$jeu['id']); ?>" <?php echo("onchange=\"apercuImage(event, ".$jeu['id'].")\""); ?>>
                                                <img id="<?php echo("imageJeuModifApercu_".$jeu['id']); ?>" class="imageJeuModifApercu" src="<?php if (file_exists("../../images/jeuxUpload/".$jeu['nomImage'])) {echo("../../images/jeuxUpload/".$jeu['nomImage']);} else {echo("../../images/jeuxUpload/pasDimage.png");} ?>" alt="image jeu">
                                            </td>
                                            <td>
                                                <label for="<?php echo("nomAModifier_".$jeu['id']); ?>" class="sousligneGras">Nouveau nom :</label>
                                                <input type="text" id="<?php echo("nomAModifier_".$jeu['id']); ?>" class="nouveauNom" name="<?php echo("nomAModifier_".$jeu['id']); ?>" value="<?php echo($jeu['title']) ?>">
                                            </td>
                                            <td class="genres">
                                                <p class="sousligneGras">Genre(s) du jeu :</p>
                                                <?php foreach ($tabGenres as $choix) { ?>
                                                        <input id="<?php echo(constant($choix['id'])."_".$jeu['id']); ?>" class="aligneGauche" type="checkbox" name="<?php echo("genresAModifier_".$jeu['id']."[]"); ?>" value="<?php echo($choix['id']); ?>" <?php if (!empty($jeu['genres'])){ echo(preRemplissageChecked($choix['id'], $jeu['genres']));} ?>/>
                                                        <label for="<?php echo(constant($choix['id'])."_".$jeu['id']); ?>"><?php echo($choix['nom']); ?></label>
                                                        <br>
                                                <?php } ?>
                                            </td>
                                            <td class="plateformes">
                                                <p class="sousligneGras">Plateforme(s) du jeu :</p>
                                                <?php foreach ($tabPlateformes as $choix) { ?>
                                                        <input id="<?php echo(constant($choix['id'])."_".$jeu['id']); ?>" class="aligneGauche" type="checkbox" name="<?php echo("plateformesAModifier_".$jeu['id']."[]"); ?>" value="<?php echo($choix['id']); ?>" <?php if (!empty($jeu['platforms'])){ echo(preRemplissageChecked($choix['id'], $jeu['platforms']));} ?>/>
                                                        <label for="<?php echo(constant($choix['id'])."_".$jeu['id']); ?>"><?php echo($choix['nom']); ?></label>
                                                        <br>
                                                <?php }?>
                                            </td>
                                            <td class="pDescription">
                                                <p class="sousligneGras">Description du jeu :</p>
                                                <textarea id="<?php echo("descriptionAModifier_".$jeu['id']); ?>" name="<?php echo("descriptionAModifier_".$jeu['id']); ?>" rows="5" cols="50"><?php if (!empty($jeu['description'])){ echo($jeu['description']);} ?></textarea>
                                            </td>
                                            <td>
                                                <input class="boutonModifierLeJeu" type="submit" class="modifierJeu" name="modifierJeu" value="Modifier le jeu">
                                            </td>
                                        </tr>
                                    </form>
                                <?php } ?>
                            </tbody>
                        </table>
                    </fieldset>
                </div>

                <div id="supprimerJeu">
                    <fieldset>
                        <legend>Supprimer un jeu</legend>
                            <p class="messageErreur"><?php echo($messageErreurSuppr) ?></p>
                            <table class="tabJeu">
                                <thead>
                                    <tr>
                                        <th>Id jeu</th>
                                        <th>Image</th>
                                        <th>Nom</th>
                                        <th>Genre(s)</th>
                                        <th>Plateforme(s)</th>
                                        <th>Description</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach (array_reverse(getAllGames()) as $jeu) { ?>
                                        <form method="POST" action="<?php echo("admin.php?iDSuppr=".$jeu['id']."#jeuASupprId_".$jeu['id']); ?>">
                                            <tr id="<?php echo("jeuASupprId_".$jeu['id']); ?>" >
                                                <td><?php echo($jeu['id']); ?></td>
                                                <td><img class="imageJeuModif" src="<?php if (file_exists("../../images/jeuxUpload/".$jeu['nomImage'])) {echo("../../images/jeuxUpload/".$jeu['nomImage']);} else {echo("../../images/jeuxUpload/pasDimage.png");} ?>" alt="image jeu"></td>
                                                <td><?php echo($jeu['title']); ?></td>
                                                <td class="genres"><?php if (!empty($jeu['genres'])) {echo(afficherGenresOuPlateformes($jeu['genres']));} ?></td>
                                                <td class="plateformes"><?php if (!empty($jeu['platforms'])) {echo(afficherGenresOuPlateformes($jeu['platforms']));} ?></td>
                                                <td><?php if (!empty($jeu['description'])) {echo($jeu['description']);} ?></td>
                                                <td>
                                                    <input class="boutonDemandeSuppressionJeu" type="button" value="Supprimer le jeu" onclick="confirmationSuppressionJeu();"/>
                                                </td>
                                            </tr>
                                            <div id="fenetreDemandeSuppressionJeu">
                                                <h3>Voulez-vous supprimer le jeu ?</h3>
                                                <input id="boutonFenetreSupprNon" type="button" value="Non" onclick="confirmationSuppressionJeu();"/>
                                                <input id="boutonFenetreSupprOui" type="submit" name="supprimerJeu" value="Oui"/>
                                            </div>
                                        </form>
                                    <?php } ?>
                                </tbody>
                            </table>
                    </fieldset>
                </div>
            </section>
            
            <section class="droite">
                <p class="titreJeuxExemple">Les nouveautés !</p>
                <div class="listeJeuxExemple">
                    <?php
                        $tabJeuxNouveautes = array_reverse(getAllGames());
                        for ($i = 0; $i < 5; $i++) { ?>
                            <a href="<?php echo("./affichageJeu.php?id=".$tabJeuxNouveautes[$i]['id']); ?>">
                                <table class="tabJeuMini">
                                    <tr>
                                        <td><img class="imageJeuExemple" src="<?php if (file_exists("../../images/jeuxUpload/".$tabJeuxNouveautes[$i]['nomImage'])) {echo("../../images/jeuxUpload/".$tabJeuxNouveautes[$i]['nomImage']);} else {echo("../../images/jeuxUpload/pasDimage.png");} ?>" alt="image jeu"></td>
                                    </tr>
                                    <tr>
                                        <td><p><?php echo($tabJeuxNouveautes[$i]['title']); ?><span class="note"></span></p></td>
                                    </tr>
                                </table>
                            </a>
                        <?php }
                    ?>
                </div>
            </section>
        </main>

        <footer>
            <h2>Pay Respect</h2>
            <p>Augustin KRABANSKY - Mehdi Ragad - Wassim</p>
        </footer>
    </body>
</html>
