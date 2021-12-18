<?php
    require_once "../php/libgames.php";
    require_once "../php/games.php";
    
    $choiceSearch = true;

    if (!empty($_REQUEST['rechercheJeu'])) {
        //Les variables pour la recherche :
        $rechercheGenre = null;
        $rechercheTitre = null;
        $recherchePlateforme = null;
        $choiceSearch = false;
        $msgRecherche = "";

        if (!empty($_GET['titreRecherche'])) {  //Si recherche avec une plateforme
            $rechercheTitre = $_GET['titreRecherche'];
            $msgRecherche .= " titre --> ".$_GET['titreRecherche'].",";
            $choiceSearch = true;
        }
        if (!empty($_GET['genreRecherche'])) {  //Si recherche avec un genre
            $rechercheGenre = $_GET['genreRecherche'];
            $msgRecherche .= " genre --> ".$_GET['genreRecherche'].",";
            $choiceSearch = true;
        }
        if (!empty($_GET['plateformeRecherche'])) {  //Si recherche avec une plateforme
            $recherchePlateforme = $_GET['plateformeRecherche'];
            $msgRecherche .= " plateforme --> ".$_GET['plateformeRecherche'].",";
            $choiceSearch = true;
        }
        $tabJeuxrecherche = searchGames($rechercheTitre, $rechercheGenre, $recherchePlateforme);    //Recherche du/des jeux correspondants
        $msgRecherche = substr($msgRecherche, 0, strlen($msgRecherche) - 1);
        $msgRecherche .= ".";
    }
?>
<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="utf-8"/>
        <title>Pay Respect</title>
        <link rel="icon" type="image/png" href="../images/icone.png" />
        <link rel="stylesheet" href="../stylesBleu/squelette.css"/>
        <link rel="stylesheet" href="../stylesBleu/rechercheComplexe.css"/>
        <link rel="stylesheet" href="../stylesBleu/affichageJeuMini.css"/>
    </head>

    <body>
        <header>
            <h1>Pay Respect </h1>
            <form action="./recherche.php">
                <label for="recherche">Recherche :</label>
                <input id="recherche" type="search" name="recherche" required>
                <input type="submit">
            </form>
            
            <div class="menuHaut">
                <nav>
                    <ul>
                        <li><a href="../index.php">Page principale</a></li>
                        <li><a href="./admin/admin.php">Administrateur</a></li>
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
                <form id="parametresRecherche" action="./rechercheComplexe.php">
                    <span>Recherche :</span>
                    <input id="titreRecherche" type="search" name="titreRecherche" placeholder="Nom du jeu">
                    <select id="genreRecherche" name="genreRecherche">
                        <option value="">Genre</option>
                        <?php foreach ($tabGenres as $genre) {?>
                            <option value="<?php echo($genre['id']); ?>"><?php echo($genre['nom']); ?></option>
                        <?php } ?>
                    </select>                    
                    <select id="plateformeRecherche" name="plateformeRecherche">
                        <option value="">Plateforme</option>
                        <?php foreach ($tabPlateformes as $plateforme) {?>
                            <option value="<?php echo($plateforme['id']); ?>"><?php echo($plateforme['nom']); ?></option>
                        <?php } ?>
                    </select>
                    <input id="rechercheJeu" type="submit" name="rechercheJeu" value="Rechercher"/>
                </form>

                <?php if (!empty($_REQUEST['rechercheJeu']) && $choiceSearch) { ?>
                    <fieldset class="listeJeux">
                        <legend><?php echo("Recherche pour :".$msgRecherche); ?></legend>
                        <?php foreach ($tabJeuxrecherche as $jeu) { ?>
                            <div class="affichageJeu">
                                <details>
                                    <summary>
                                        <div class="divImageJeu">
                                            <a href="<?php echo("../pages/affichageJeu.php?id=".$jeu['id']); ?>" target="_blank"><img class="imageJeu" src="<?php if (file_exists("../images/jeuxUpload/".$jeu['nomImage'])) {echo("../images/jeuxUpload/".$jeu['nomImage']);} else {echo("../images/jeuxUpload/pasDimage.png");} ?>" alt="image test"></a>
                                        </div>
                                        <a href="<?php echo("../pages/affichageJeu.php?id=".$jeu['id']); ?>" target="_blank"><p class="titre"><?php echo($jeu['title']); ?><span class="note"> <img src="../images/etoiles.png"></span></p></a>
                                    </summary>
                                    <p class="genres">Genre(s) : <?php if (array_key_exists('genres', $jeu)) { echo(afficherGenresOuPlateformes($jeu['genres']));} else { echo("Inconnu...");} ?></p>
                                    <p class="plateformes">Plateforme(s) : <?php if (array_key_exists('platforms', $jeu)) { echo(afficherGenresOuPlateformes($jeu['platforms']));} else { echo("Inconnu...");} ?></p>
                                    <p class="description">Description : <?php if (array_key_exists('description', $jeu)) { echo($jeu['description']);} else { echo("Inconnu...");} ?></p>
                                </details>
                            </div>
                        <?php } ?>
                    </fieldset>
                <?php } else if (!$choiceSearch) { ?>
                    <p>Vous devez choisir au moins un paramètre de recherche.</p>
                <?php } ?>
            </div>

            <div class="droite">
                <p>test Droite</p>
            </div>
        </main>

        <footer>
            <h2>Pay Respect</h2>
            <p>Augustin KRABANSKY - Mehdi Ragad - Wassim</p>
            <form action="./admin/admin.php" target="_blank">
                <button type="submit">Administrateur</button>
            </form>
        </footer>
    </body>
</html>
