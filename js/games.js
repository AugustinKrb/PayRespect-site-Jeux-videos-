var numBouton = 0;  //ajouter class par ligne à masquer
const GENRE_SF = 'sf';
const GENRE_FANTASY = 'fantasy';
const GENRE_STRATEGY = 'strategy';
const GENRE_RPG = 'rpg';
const GENRE_FPS = 'fps';
const GENRE_ROGUE = 'rogue';
const GENRE_ADVENTURE = 'adventure';
const GENRE_LIFE = 'life';
const GENRE_HORROR = 'horror';
const GENRE_CHILDREN = 'children';


function ancienChoixAdmin() {
    //Récupérer dernier choix admin
    let affichageChoixAdmin = localStorage.getItem('affichageChoixAdmin');
    
    //Recupérer et afficher le div sélectionné
    affichageAChanger = document.getElementById(affichageChoixAdmin);    
    affichageAChanger.style.display = "block";
}

function afficherChoixAdmin(aAfficher) {
    
    //Créer donnée garder par le navigateur
    localStorage.setItem('affichageChoixAdmin', aAfficher);
    let affichageChoixAdmin = localStorage.getItem('affichageChoixAdmin');

    //Récupérer les 3 div
    let ajouterJeu = document.getElementById("ajouterJeu");
    let modifierJeu = document.getElementById("modifierJeu");
    let supprimerJeu = document.getElementById("supprimerJeu");

    //Cacher tout les 3 div
    ajouterJeu.style.display = "none";    
    modifierJeu.style.display = "none";
    supprimerJeu.style.display = "none";

    //Recupérer et afficher le div sélectionné
    affichageAChanger = document.getElementById(affichageChoixAdmin);    
    affichageAChanger.style.display = "block";
}

function afficherOptionsModificationsJeu(classJeu) {
    let modifAAfficher = document.getElementsByClassName(classJeu);

    //Parcours le tab reçu de td avec la class correspondante
    //Puis afficher ou non la ligne de modif
    for (let i = 0; i < modifAAfficher.length; i++) {
        modifAAfficher.item(i).classList.toggle("cacherOptionsJeu");
    }
}

//Afficher aperçu du jeu
function miseAJourAffichageAperçu(mettreAJour) {
    // onkeyup="miseAJourAffichageAperçu()"
    //Affichage aperçu titre
    if (mettreAJour == 'titre') {
        let titreAAfficher = document.getElementById("titreAjoutJeu").value;
        let tmp = titreAAfficher + "";
        document.getElementById("nomJeuAperçu").innerText = tmp;
        console.log(titreAAfficher);
    }

    //Affichage des genres
    if (mettreAJour == 'genres' || mettreAJour == 'plateformes') {
        let checkboxes;
        if (mettreAJour == 'genres') {
            checkboxes = document.getElementsByClassName("listeGenresPourApercu");
        } else {
            checkboxes = document.getElementsByClassName("listePlateformesPourApercu");
        }

        let tmpTabValue = [];   //Va contenir toutes les valeurs des checkbox
        let tmpTabChecked = []; //Va contenir le bool de si la case est cochée
        let resTab = [];    //Va contenir les catégories cochées

        //Pas réussi autrement (foreach ou autre) pour faire plus simple que ça
        for (let i = 0; i < checkboxes.length; i++) {   //Récup les valeurs des checkbox
            tmpTabValue.push(checkboxes[i].value);
        }
        for (let i = 0; i < checkboxes.length; i++) {   //Récup les bool des checkbox
            tmpTabChecked.push(checkboxes[i].checked);
        }
        for (let i = 0; i < tmpTabChecked.length; i++) {    //Si checkbox bool = true, recup la valeur
            if (tmpTabChecked[i]) {
                resTab.push(tmpTabValue[i]);
            }
        }
        let res = afficherGenresOuPlateformes(resTab);

        if (mettreAJour == 'genres') {
            document.getElementById("genresJeuAperçu").innerHTML = res;
        } else {
            document.getElementById("plateformesJeuAperçu").innerHTML = res;
        }
    }

    //Affichage aperçu description
    if (mettreAJour == 'description') {
        let descriptionAAfficher = document.getElementById("description").value;
        tmp = descriptionAAfficher + "";
        document.getElementById("descriptionJeuAperçu").innerHTML = tmp;
        console.log(descriptionAAfficher);
    }
}

//Afficher un aperçu de l'image
function apercuImage(event, id = null) {
    var reader = new FileReader();
    reader.onload = function(){
        //Récupérer choix admin
        let affichageChoixAdmin = localStorage.getItem('affichageChoixAdmin');
        if (affichageChoixAdmin == "ajouterJeu") {
            var output = document.getElementById('imageAperçu');
        } else if (affichageChoixAdmin == "modifierJeu") {
            console.log('imageJeuModifApercu' + id);
            var output = document.getElementById('imageJeuModifApercu_' + id);
        }
        output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
};

function afficherGenresOuPlateformes(tab) {
    let res = "";
    /*
    foreach ($tab as $value) {
        $res .= " ".constant($value);
    }
    */
    for (let i = 0; i < tab.length; i++) {
        res += recupConstPHP(tab[i]) + ", ";
    }
    /*
    $res = str_replace(" ", ", ", $res);
    return substr($res, 1, strlen($res)).".";
    */
   console.log("afficher : " + res);
   return res;
}

function recupConstPHP(str) {
    switch (str){
        //Genres :
        case "GENRE_SF":
            return "Science fiction";
            break;
        case "GENRE_FANTASY":
            return "Fantastique";
            break;
        case "GENRE_STRATEGY":
            return "Stratégie";
            break;
        case "GENRE_RPG":
            return "RPG";
            break;
        case "GENRE_FPS":
            return "FPS";
            break;
        case "GENRE_ROGUE":
            return "Rogue";
            break;
        case "GENRE_ADVENTURE":
            return "Aventure";
            break;
        case "GENRE_LIFE":
            return "Life";
            break;
        case "GENRE_HORROR":
            return "Horreur";
            break;
        case "GENRE_CHILDREN":
            return "Enfant";
            break;
        //Plateformes :
        case "PLATFORM_STEAM":
            return "Steam";
            break;
        case "PLATFORM_EPIC":
            return "Epic games";
            break;
        case "PLATFORM_XBOX":
            return "Xbox";
            break;
        case "PLATFORM_PS4":
            return "PS4";
            break;
        case "PLATFORM_PS5":
            return "PS5";
            break;
        case "PLATFORM_SWITCH":
            return "Switch";
            break;
        case "PLATFORM_ANDROID":
            return "Android";
            break;
        case "PLATFORM_IOS":
            return "IOS";
            break;         
    }
}

function confirmationSuppressionJeu() {
    let info = document.getElementById("fenetreDemandeSuppressionJeu");
    if (getComputedStyle(info).display == "none") {
        info.style.display = "block";
    } else {
        info.style.display = "none";
    }
}
