<?php 
function id_youtube($url) {
    $patron = '%^ (?:https?://)? (?:www\.)? (?: youtu\.be/ | youtube\.com (?: /embed/ | /v/ | /watch\?v= ) ) ([\w-]{10,12}) $%x';
    $array = preg_match($patron, $url, $parte);
    if (false !== $array) {
        return $parte[1];
    }
    return false;
}
 
echo id_youtube('https://www.youtube.com/watch?v=9WZn9PkTDJY'); // Imprime: 9WZn9PkTDJY ?>