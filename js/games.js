var numBouton = 0;  //ajouter class par ligne à masquer

function ancienChoixAdmin() {
    //Récupérer dernier choix admin
    let affichageChoixAdmin = localStorage.getItem('affichageChoixAdmin');
    console.log(affichageChoixAdmin);
    
    //Recupérer et afficher le div sélectionné
    affichageAChanger = document.getElementById(affichageChoixAdmin);    
    affichageAChanger.style.display = "block";
}

function afficherChoixAdmin(aAfficher) {
    
    //Créer donnée garder par le navigateur
    localStorage.setItem('affichageChoixAdmin', aAfficher);
    let affichageChoixAdmin = localStorage.getItem('affichageChoixAdmin');
    console.log(affichageChoixAdmin);

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
    console.log(classJeu);
    let modifAAfficher = document.getElementsByClassName(classJeu);

    //console.log(modifAAfficher);

    //Parcours le tab reçu de td avec la class correspondante
    //Puis afficher ou non la ligne de modif
    for (let i = 0; i < modifAAfficher.length; i++) {
        modifAAfficher.item(i).classList.toggle("cacherOptionsJeu");
    }
    /*
    if (getComputedStyle(modifAAfficher).display == "none") {
        modifAAfficher.style.display = "block";
    } else {
        modifAAfficher.style.display = "none";
    }
    */
}
