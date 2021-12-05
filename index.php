html {
    /* user-select: none; */
    width: 100%;
    height: 100%;
}

html, body {
    margin: 0px;
    padding: 0px;
}

body {
    color: #000000;
    width: 100%;
    position: relative;
    top: -21px;
}

header {
    font-family: Courier New, monospace;
    width: 100%;
    position: relative;
    top: 0;
    background-color: #dbdbdb;
    border: none;
    padding-top: 1%;
    padding-bottom: 1%;
    text-align: center;
}

header h1 {

    font-size: 40px;
}

header p:hover {
    text-decoration: underline;
    font-weight: bold;
}

/********************************/
.menuHaut {
    z-index: 1;
    background-color: #dbdbdb;
    width: 100%;
    margin: 0px auto 40px auto;
    position: sticky;
    margin-top: -21px;  /* Boucher le trou (body décalé de -21px) */
    top: 0px;   /* Pourle laisser collé au haut */
}

.menuHaut nav ul{
    list-style-type: none;
}

.menuHaut nav li{
    float: left;
    width: 50%;
    text-align: center;
}

/*Evite que le menu n'ait une hauteur nulle*/
.menuHaut nav ul::after{
    content: "";
    display: table;
    clear: both;
}

.menuHaut nav a{
    display: block; /*Toute la surface sera cliquable*/
    text-decoration: none;
    color: #000000;
    border-bottom: 2px solid transparent;   /*Evite le décalage des éléments sous le menu à cause de la bordure en :hover*/
    padding: 10px 0px;  /*Agrandit le menu et espace la bordure du texte*/
}

.menuHaut nav a:hover{
    color: #FFFFFF;
    border-bottom: 2px solid #000000;
}

/********************************/

footer {
    width: 100%;
    background-color: #dbdbdb;
    border: none;
    padding-top: 1%;
    padding-bottom: 1%;
    text-align: center;
}
