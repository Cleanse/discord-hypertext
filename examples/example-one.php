<?php
require __DIR__ . '/../vendor/autoload.php';
$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();

use Discord\Discord;

// Email/Password for Discord
$email_address = getenv('DISCORD_EMAIL');
$password = getenv('DISCORD_PASSWORD');

// Try log into Discord!
$discord = new Discord($email_address, $password);

header('Content-Type: application/json');
$image = 'http://static-cdn.jtvnw.net/jtv_user_pictures/rabbitbong-profile_image-444fd6f17289a247-300x300.png';
$kappa = $discord->api('server')->edit('105775765877989376', ['name' => 'DansGame', 'icon' => $image]);
echo json_encode($kappa);