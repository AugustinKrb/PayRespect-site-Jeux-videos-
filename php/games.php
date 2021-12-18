<?php
    require_once 'libgames.php';

    $tabGenres = [
                  ["nom" => "Science fiction",
                   "id" => "GENRE_SF",
                   "define" => "sf"],
                  ["nom" => "Fantastique",
                   "id" => "GENRE_FANTASY",
                   "define" => "fantasy"],
                  ["nom" => "Stratégie",
                   "id" => "GENRE_STRATEGY",
                   "define" => "strategy"],
                  ["nom" => "RPG",
                   "id" => "GENRE_RPG",
                   "define" => "rpg"],
                  ["nom" => "FPS",
                   "id" => "GENRE_FPS",
                   "define" => "fps"],
                  ["nom" => "Rogue",
                   "id" => "GENRE_ROGUE",
                   "define" => "rogue"],
                  ["nom" => "Aventure",
                   "id" => "GENRE_ADVENTURE",
                   "define" => "adventure"],
                  ["nom" => "Life",
                   "id" => "GENRE_LIFE",
                   "define" => "life"],
                  ["nom" => "Horreur",
                   "id" => "GENRE_HORROR",
                   "define" => "horror"],
                  ["nom" => "Enfant",
                   "id" => "GENRE_CHILDREN",
                   "define" => "children"]];

    $tabPlateformes = [
                        ["nom" => "Steam",
                         "id" => "PLATFORM_STEAM",
                         "define" => "steam"],
                        ["nom" => "Epic games",
                         "id" => "PLATFORM_EPIC",
                         "define" => "epix"],
                        ["nom" => "Xbox",
                         "id" => "PLATFORM_XBOX",
                         "define" => "xbox"],
                        ["nom" => "PS4",
                         "id" => "PLATFORM_PS4",
                         "define" => "ps4"],
                        ["nom" => "PS5",
                         "id" => "PLATFORM_PS5",
                         "define" => "ps5"],
                        ["nom" => "Switch",
                         "id" => "PLATFORM_SWITCH",
                         "define" => "switch"],
                        ["nom" => "Android",
                         "id" => "PLATFORM_ANDROID",
                         "define" => "android"],
                        ["nom" => "IOS",
                         "id" => "PLATFORM_IOS",
                         "define" => "ios"]];
    
    $messageErreurAjout = "";
    $messageErreurModif = "";
    $messageErreurSuppr = "";
    
    function afficherGenresOuPlateformes($tab) {
        $res = "";
        foreach ($tab as $value) {
            $res .= " ".constant($value);
        }
        $res = str_replace(" ", ", ", $res);
        return substr($res, 1, strlen($res)).".";
    }    

    function afficherGenresOuPlateformesSautLignes($tab) {
        $res = "";
        foreach ($tab as $value) {
            $res .= " ".constant($value);
        }
        $res = str_replace(" ", ",<br>", $res);
        return substr($res, 1, strlen($res)).".";
    }

    function preRemplissageChecked($caseGenre, $genresJeu) {
        foreach ($genresJeu as $genre) {
            if (constant($genre) == constant($caseGenre)) {
                return "checked=\"checked\"";
            }
        }
    }
?>
