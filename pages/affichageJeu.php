<?php
    require_once "../php/libgames.php";
    require_once "../php/games.php";

    $idJeu = $_GET['id'];
    $jeuChoisi = getGame($idJeu);

    //Test  AJOUTER UN USER APRES L'IP
    /*
    rateGame(5, "123", "userTest", 8, "J'aime ce jeu, il est vraiment bien !");
    rateGame(5, "124", "Haters", 4, "Bof...");
    */
    
    /*
    if (hasAlreadyRated(5, "124")) {
        echo("<br><br><br>noté");
    }

    if (!hasAlreadyRated(5, "124")) {
        echo("<br><br><br>pas noté");
    }
    */
    
    echo("<br><br><br>True : ".true);
    echo("<br><br><br>False : ".false);
    echo("<br><br><br>Avis déjà ajouté : ".hasAlreadyRated(5, "120"));
    echo("<br><br><br>Avis pas encore ajouté :".hasAlreadyRated(5, "124"));

    if (!empty($_REQUEST['ajouterAvis'])) {
    }
?>
<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="utf-8"/>
        <title><?php echo("PayRespect - ".$jeuChoisi['title']); ?></title>
        <link rel="icon" type="image/png" href="../images/icone.png" />
        
        <link rel="stylesheet" href="../stylesBleu/affichageJeu.css"/>
        <link rel="stylesheet" href="../stylesBleu/affichageJeuMini.css"/>
        <link rel="stylesheet" href="../stylesBleu/squelette.css"/>
    </head>

    <body>
        <header>
            <h1>Pay Respect </h1>

            <form action="./recherche.php" target="_blank">
                <label for="recherche">Recherche :</label>
                <input id="recherche" type="search" name="recherche" required>
                <input id="boutonRecherche" type="submit" value="Rechercher">
            </form>
            
            <div class="menuHaut">
                <nav>
                    <ul>
                        <li><a href="../index.php">Page principale</a></li>
                        <li><a href="./rechercheComplexe.php">Recherche complexe</a></li>
                    </ul>
                </nav>
            </div>
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
                                    <img class="imageJeuExemple" src="<?php if (file_exists("../images/jeuxUpload/".$tabJeuxNouveautes[$i]['nomImage'])) {echo("../images/jeuxUpload/".$tabJeuxNouveautes[$i]['nomImage']);} else {echo("../images/jeuxUpload/pasDimage.png");} ?>" alt="image test">
                                    <p><?php echo($tabJeuxNouveautes[$i]['title']); ?><span class="note"> <img src="../images/etoiles.png"></span></p>
                                </summary>
                                <p class="descriptionJeuExemple">description :</p>
                            </details>
                        <?php }
                    ?>
                </div>
            </div>

            <div class="milieu">
                <table class="affichageHautJeuChoisi">
                    <tr>
                        <td class="tdImageJeuChoisi">
                            <img class="imageJeuChoisi" src="<?php if (file_exists("../images/jeuxUpload/".$jeuChoisi['nomImage'])) {echo("../images/jeuxUpload/".$jeuChoisi['nomImage']);} else {echo("../images/jeuxUpload/pasDimage.png");} ?>" alt="image test">
                        </td>
                        <td class="infoJeuChoisi">
                            <p><span class="intituleJeuChoisi">Titre :</span><?php echo(" ".$jeuChoisi['title']); ?></p>
                            <p><span class="intituleJeuChoisi">Genre(s) :</span><?php if (!empty($jeuChoisi['genres'])){ echo(" ".afficherGenresOuPlateformes($jeuChoisi['genres']));} else { echo(" Inconnu..");} ?></p>
                            <p><span class="intituleJeuChoisi">Plateforme(s) :</span><?php if (!empty($jeuChoisi['platforms'])){ echo(" ".afficherGenresOuPlateformes($jeuChoisi['platforms']));} else { echo(" Inconnu...");} ?></p>
                            <p><span class="intituleJeuChoisi">Description :</span><?php if (!empty($jeuChoisi['description'])){ echo(" ".$jeuChoisi['description']);} else { echo(" Inconnu..");} ?></p>
                        </td>
                    </tr>
                </table>

                <div id="avisUtilisateurs">
                    <?php
                        var_dump(getGameComments(5));
                        foreach (getGameComments(5) as $avis) {
                            echo("ip : ".$avis['ip']." user : ".$avis['user']." note : ".$avis['note']." comment : ".$avis['comment'].".<br>");
                        }
                    ?>
                    <h1>Avis</h1>

                    <table id="ajouterAvis">
                        <form action="./affichageJeu.php">
                            <tr>
                                <td id="nePasAfficherIdJeu">
                                    <input type="text" name="id" value="<?php echo($idJeu) ?>">
                                </td>
                                <td id="nomUserAjoutAvis">
                                    <input type="text" name="nomUserAvis" placeholder="Nom d'utilisateur" maxlength="20" required>
                                </td>
                                <td id="avisUserAjoutAvis">
                                    <textarea name="avisUserAvis" placeholder="Avis" rows="2" cols="100" required></textarea>
                                </td>
                                <td id="noteUserAjoutAvis">
                                    <input type="number" name="noteUserAvis" min="0" max="10" placeholder="Note" required>
                                </td>
                            </tr>
                            <tr>
                                <td id="boutonAjouterAvis" colspan="3">
                                    <input type="submit" name="ajouterAvis" value="Ajouter un avis">
                                </td>
                            </tr>
                        </form>
                    </table>
                    
                    <table id="avisUnique">
                        <tr>
                            <td class="nomUserAvis">AntonioDu93</td>
                            <td class="avisUserAvis">Avis feijoijoij oijoz joi</td>
                            <td class="noteUserAvis">8/10</td>
                        </tr>
                        <tr>
                            <td class="nomUserAvis">SisI77</td>
                            <td class="avisUserAvis">Pas ouf...</td>
                            <td class="noteUserAvis">4/10</td>
                        </tr>
                        <tr>
                            <td class="nomUserAvis">||||||||||||||</td>
                            <td class="avisUserAvis">J'adore !!</td>
                            <td class="noteUserAvis">10/10</td>
                        </tr>
                        <tr>
                            <td class="nomUserAvis">J'rageEtAlors</td>
                            <td class="avisUserAvis">J'arrive même pas à comprendre qui peut aimer.</td>
                            <td class="noteUserAvis">0/10</td>
                        </tr>
                        <tr>
                            <td class="nomUserAvis">Police332789</td>
                            <td class="avisUserAvis">Sympa mais sans plus...</td>
                            <td class="noteUserAvis">5/10</td>
                        </tr>
                        <tr>
                            <td class="nomUserAvis">Test</td>
                            <td class="avisUserAvis">J'arrive même pas à comprendre qui peut aimer.ofs ojsold jofsjd ojiosj osjidf ojsdof ijsod joj ojs fojosdf josd jfoj ojd osdjo jsojs odsj o</td>
                            <td class="noteUserAvis">0/10</td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="droite">
                <p>test Droite</p>
            </div>
        </main>

        <footer>
            <h2>Pay Respect</h2>
            <p>Augustin KRABANSKY - Mehdi Ragad - Wassim</p>
            <form action="./admin.php" target="_blank">
                <button type="submit">Administrateur</button>
            </form>
        </footer>
    </body>
</html>
