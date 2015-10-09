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
$discordObj = (object) array_merge((array) $discord->user(), (array) $discord->user()->guilds());
echo json_encode($discordObj);