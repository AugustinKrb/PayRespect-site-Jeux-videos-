<?php
require_once __DIR__.'/nosql.php';

NoSQL::configure('/wamp64/www/PayRespect/_data');

define('GENRE_SF', 'sf');
define('GENRE_FANTASY', 'fantasy');
define('GENRE_STRATEGY', 'strategy');
define('GENRE_RPG', 'rpg');
define('GENRE_FPS', 'fps');
define('GENRE_ROGUE', 'rogue');
define('GENRE_ADVENTURE', 'adventure');
define('GENRE_LIFE', 'life');
define('GENRE_HORROR', 'horror');
define('GENRE_CHILDREN', 'children');

define('PLATFORM_STEAM', 'steam');
define('PLATFORM_XBOX', 'xbox');
define('PLATFORM_PS4', 'ps4');
define('PLATFORM_PS5', 'ps5');
define('PLATFORM_SWITCH', 'switch');
define('PLATFORM_EPIC', 'epic');
define('PLATFORM_ANDROID', 'android');
define('PLATFORM_IOS', 'ios');

function createGame(string $title) {
    $saved = NoSQL::getInstance('games')->save(['title' => $title,]);
    return $saved['id'];
}

function getGame($id) {
    return NoSQL::getInstance('games')->find(strval($id));
}

function getAllGames(): array {
    return NoSQL::getInstance('games')->all();
}

function deleteAllGames() {
    NoSQL::getInstance('grades')->truncate();
    NoSQL::getInstance('games')->truncate();
}

function deleteGame($id) {
    $game = NoSQL::getInstance('games')->find(strval($id));
    if(!empty($game)) {
        // remove grades
        $grades = array_keys(NoSQL::getInstance('grades')->search('game', $id, NoSQL::OP_EQ));
        foreach($grades as $grade) { NoSQL::getInstance('grades')->delete($grade); }
        NoSQL::getInstance('games')->delete(strval($id));
    } else {
        throw new Exception('Game ID '.$id.' not found');
    }
}

function saveTitle($id, string $title) {
    $game = NoSQL::getInstance('games')->find(strval($id));
    if(!empty($game)) {
        $game['title'] = $title;
        NoSQL::getInstance('games')->save($game);
    } else {
        throw new Exception('Game ID '.$id.' not found');
    }
}

function saveGenres($id, array $genres) {
    $game = NoSQL::getInstance('games')->find(strval($id));
    if(!empty($game)) {
        $game['genres'] = $genres;
        NoSQL::getInstance('games')->save($game);
    } else {
        throw new Exception('Game ID '.$id.' not found');
    }
}

function savePlatforms($id, array $platforms) {
    $game = NoSQL::getInstance('games')->find(strval($id));
    if(!empty($game)) {
        $game['platforms'] = $platforms;
        NoSQL::getInstance('games')->save($game);
    } else {
        throw new Exception('Game ID '.$id.' not found');
    }
}

/* Peut-être */
function saveDescription($id, string $description) {
    $game = NoSQL::getInstance('games')->find(strval($id));
    if(!empty($game)) {
        $game['description'] = $description;
        NoSQL::getInstance('games')->save($game);
    } else {
        throw new Exception('Game ID '.$id.' not found');
    }
}
/* Peut-être */

function hasAlreadyRated($gameId, string $userIp): bool {
    $returns = false;
    $game = NoSQL::getInstance('games')->find(strval($gameId));
    if(!empty($game)) {
        $foundByIp = NoSQL::getInstance('grades')->search('ip', $userIp, NoSQL::OP_EQ);
        $foundByGame = NoSQL::getInstance('grades')->search('game', $gameId, NoSQL::OP_EQ);
        $returns = !empty(array_intersect(array_keys($foundByIp), array_keys($foundByGame)));
    } else {
        throw new Exception('Game ID '.$gameId.' not found');
    }
    return $returns;
}

function rateGame($gameId, string $userIp, int $note, string $comment) {
    $game = NoSQL::getInstance('games')->find(strval($gameId));
    if(!empty($game)) {
        NoSQL::getInstance('grades')->save([
            'game' => $game['id'],
            'ip' => $userIp,
            'note' => $note,
            'comment' => $comment,
            'date' => date('Y-m-d H:i'),
        ]);
    } else {
        throw new Exception('Game ID '.$gameId.' not found');
    }
}

function searchGamesByTitle(string $title): array {
    return NoSQL::getInstance('games')->search('title', $title, NoSQL::OP_LK);
}

function searchGamesByGenre(string $genre): array {
    return NoSQL::getInstance('games')->search('genres', $genre, NoSQL::OP_IN);
}

/* Peut-être */
function searchGamesByPlateform(string $platform): array {
    return NoSQL::getInstance('games')->search('platforms', $platform, NoSQL::OP_IN);
}
/* Peut-être */

function searchGames(string $title = null, string $genre = null, string $platform = null): array {
    $returns = [];
    
    $games = getAllGames();
    foreach($games as $game) {
        $gameValid = true;
        if(null !== $title) {
            $gameValid = $gameValid && (false !== stripos($game['title'], $title));
        }
        if(null !== $genre) {
            $gameValid = $gameValid && array_key_exists('genres', $game) && in_array($genre, $game['genres']);
        }
        if(null !== $platform) {
            $gameValid = $gameValid && array_key_exists('platforms', $game) && in_array($platform, $game['platforms']);
        }
        if($gameValid) {
            $returns[$game['id']] = $game;
        }
    }
    
    return $returns;
}
