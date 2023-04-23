<?php

$token = "6024389131:AAEFZNhv9-A95f0eQNezYs7rJ8gNwlonmaw"; // token (id u contraseña) de acceso para el bot
$website = "https://api.telegram.org/bot".$token;

$input = file_get_contents('php://input'); // recibe la informacion de la url, en formato json
$update = json_decode($input, TRUE); // decodifica la informacion recibida

$chatId = $update["message"]["chat"]["id"]; // viene con este el formato el json
$message = $update["message"]["text"]; // realizamos la actualizacion del mensaje


switch ($message) {
    case '/start':
        $response = "Bienvenido al bot de prueba";
        sendMessage($chatId, $response);
        break;

    case strtolower('Hola bot'):
        $response = "Hola, ¿como estas?";
        sendMessage($chatId, $response);
        break;

    case strtolower('Que tal bot'):
        $response = "Muy bien, ¿y tu?";
        sendMessage($chatId, $response);
        break;

    case strtolower('Como me ira en la sumativa'):
        $response = 'Te ira super bien si realizas los ejercicios';
        sendMessage($chatId, $response);
        break;

    case strtolower('Adios bot'):
        $response = "Hasta luego";
        sendMessage($chatId, $response);
        break;

    default:
        $response = "No te entiendo";
        sendMessage($chatId, $response);
}

function sendMessage($chatId, $response){
    $url = $GLOBALS['website']."/sendMessage?chat_id=".$chatId."&parse_mode=HTML&text=".urlencode($response);
    file_get_contents($url);
}

?>
