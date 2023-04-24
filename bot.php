<?php

//$token = "6024389131:AAEFZNhv9-A95f0eQNezYs7rJ8gNwlonmaw"; // token (id u contraseña) de acceso para el bot
$token_osvaldo = "6106156912:AAFBBBxuTWTIKJNyYpguOsLbKxOuVWqS8qU";
$website = "https://api.telegram.org/bot".$token_osvaldo;

$input = file_get_contents('php://input'); // recibe la informacion de la url, en formato json
$update = json_decode($input, TRUE); // decodifica la informacion recibida

$chatId = $update["message"]["chat"]["id"]; // viene con este el formato el json
$message = $update["message"]["text"]; // realizamos la actualizacion del mensaje


/**
 * Se agrega posibles mensajes de los usuarios y respuestas del bot
 * es importante que el mensaje del usuario sea en minuscula, pero 
 * se puede mejorar
 * 
 * @param $chatId
 * @param $response
 * @return mixed
 */
switch ($message) {
    case '/start':
        $response = "Bienvenido al bot de prueba";
        sendMessage($chatId, $response);
        break;

    case strtolower('¿Donde hay carne?'):
        $response = "Pasillo 1";
        sendMessage($chatId, $response);
        break;

    case strtolower('¿Donde hay queso?'):
        $response = "Pasillo 1";
        sendMessage($chatId, $response);
        break;

    case strtolower('¿Donde hay jamon?'):
        $response = "Pasillo 1";
        sendMessage($chatId, $response);
        break;

    case strtolower('¿Donde hay leche?'):
        $response = "Pasillo 2";
        sendMessage($chatId, $response);
        break;

    case strtolower('¿Donde hay yogurth?'):
        $response = "Pasillo 2";
        sendMessage($chatId, $response);
        break;

    case strtolower('¿Donde hay Cereal?'):
        $response = "Pasillo 2";
        sendMessage($chatId, $response);
        break;

    case strtolower('¿Donde hay bedidas?'):
        $response = "Pasillo 3";
        sendMessage($chatId, $response);
        break;

    case strtolower('¿Donde hay jugos?'):
        $response = "Pasillo 3";
        sendMessage($chatId, $response);
        break;

    case strtolower('¿Donde hay pan?'):
        $response = "Pasillo 4";
        sendMessage($chatId, $response);
        break;

    case strtolower('¿Donde hay pasteles?'):
        $response = "Pasillo 4";
        sendMessage($chatId, $response);
        break;

    case strtolower('¿Donde hay tortas?'):
        $response = "Pasillo 4";
        sendMessage($chatId, $response);
        break;
    
    case strtolower('¿Donde hay detergente?'):
        $response = "Pasillo 5";
        sendMessage($chatId, $response);
        break;

    case strtolower('¿Donde hay lavaloza?'):
        $response = "Pasillo 5";
        sendMessage($chatId, $response);
        break;


    default:
        $response = "No te entiendo la pregunta, intenta con otra";
        sendMessage($chatId, $response);
}


/**
 * Funcion que envia el mensaje al usuario y este lo responde en el chat, segun lo que se le indique
 * en el parametro $response (lo que se le quiere decir al bot)
 *
 * @param $chatId
 * @param $response
 * @return mixed
 */
function sendMessage($chatId, $response){
    $url = $GLOBALS['website']."/sendMessage?chat_id=".$chatId."&parse_mode=HTML&text=".urlencode($response);
    file_get_contents($url);
}

?>
