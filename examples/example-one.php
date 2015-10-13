<?php
require __DIR__ . '/../vendor/autoload.php';
$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();

use Discord\Discord;
use Discord\DiscordHelper;

// Email/Password for Discord
$email_address = getenv('DISCORD_EMAIL');
$password = getenv('DISCORD_PASSWORD');
//86243638656401408 - test
//81616490922520576 - ins
//81384788765712384 - discord api

// Try log into Discord!
$discord = new Discord($email_address, $password);
/*$guzzle = new DiscordHelper;
$request = $guzzle->request('get', 'channels/81616490922520576/messages', [
    'headers' => [
        'authorization' => $discord->client->token
    ],
    'query' => ['limit' => 1]
]);
header('Content-Type: application/json');
echo json_encode(json_decode($request->getBody()->getContents()));
*/
header('Content-Type: application/json');
//echo json_encode($discord->user());
echo json_encode($discord->guild('81616490922520576'));