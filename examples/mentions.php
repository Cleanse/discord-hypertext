<?php
error_reporting(-1);
require __DIR__ . '/../vendor/autoload.php';
$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();

use Discord\Discord;
use Discord\Helpers\Mentions;

// Email/Password for Discord
$email_address = getenv('DISCORD_EMAIL');
$password = getenv('DISCORD_PASSWORD');

// Try log into Discord!
$discord = new Discord($email_address, $password);
$channelId = '105775765877989376';

echo '<pre>';
$messages = $discord->api('message')->get($channelId);

// Script start
$time1 = microtime(true);

$mentions = new Mentions($discord);

foreach ($messages as $message) {
    echo '<b>'.$message['author']['username'].'</b> '.$mentions->addMentions($message) . '<br>';
}

// Script end
$time2 = microtime(true);
echo "script execution time: ".($time2-$time1); //value in seconds