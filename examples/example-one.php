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
$image = 'http://a.espncdn.com/combiner/i?img=/i/teamlogos/nfl/500/sf.png';
echo json_encode($discord->api('server')->edit('XXX', '49ers', $image));