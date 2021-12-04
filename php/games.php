<?php
    require_once 'libgames.php';

    $tabGenres = [
                  ["nom" => "Science fiction",
                   "id" => "GENRE_SF"],
                  ["nom" => "Fantastique",
                   "id" => "GENRE_FANTASY"],
                  ["nom" => "Stratégie",
                   "id" => "GENRE_STRATEGY"],
                  ["nom" => "RPG",
                   "id" => "GENRE_RPG"],
                  ["nom" => "FPS",
                   "id" => "GENRE_FPS"],
                  ["nom" => "Rogue",
                   "id" => "GENRE_ROGUE"],
                  ["nom" => "Aventure",
                   "id" => "GENRE_ADVENTURE"],
                  ["nom" => "Life",
                   "id" => "GENRE_LIFE"],
                  ["nom" => "Horreur",
                   "id" => "GENRE_HORROR"],
                  ["nom" => "Enfant",
                   "id" => "GENRE_CHILDREN"]];

    $tabPlateformes = [
                        ["nom" => "Steam",
                         "id" => "PLATFORM_STEAM"],
                        ["nom" => "Epic games",
                         "id" => "PLATFORM_EPIC"],
                        ["nom" => "Xbox",
                         "id" => "PLATFORM_XBOX"],
                        ["nom" => "PS4",
                         "id" => "PLATFORM_PS4"],
                        ["nom" => "PS5",
                         "id" => "PLATFORM_PS5"],
                        ["nom" => "Switch",
                         "id" => "PLATFORM_SWITCH"],
                        ["nom" => "Android",
                         "id" => "PLATFORM_ANDROID"],
                        ["nom" => "IOS",
                         "id" => "PLATFORM_IOS"]];
    
    $messageErreur = "";
    
    function getJeuxOrdreDernierAjouts() {
        $tabJeux = [];
        foreach (getAllGames() as $tab) {
            array_push($tabJeux, $tab);
        }
        return array_reverse($tabJeux);
    }

    function afficherGenresOuPlateformes($tab) {
        $res = "";
        foreach ($tab as $value) {
            $res .= " ".constant($value);
        }
        $res = str_replace(" ", ", ", $res);
        return substr($res, 1, strlen($res)).".";
    }
?>
