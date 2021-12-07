var numBouton = 0;  //ajouter class par ligne à masquer

function afficherChoixAdmin(aAfficher) {
    let ajouterJeu = document.getElementById("ajouterJeu");
    let modifierJeu = document.getElementById("modifierJeu");
    let supprimerJeu = document.getElementById("supprimerJeu");
    
    let affichageAChanger = document.getElementById(aAfficher);

    //Cacher tout 3 choix admin
    ajouterJeu.style.display = "none";    
    modifierJeu.style.display = "none";
    supprimerJeu.style.display = "none";

    //Pour afficher celui sélectionné
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