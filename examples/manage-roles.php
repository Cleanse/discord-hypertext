<?php
error_reporting(-1);
require __DIR__ . '/../vendor/autoload.php';
$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();

use Discord\Discord;
use Discord\Helpers\Permissions;
use Discord\Helpers\RoleColors;

// Email/Password for Discord
$email_address = getenv('DISCORD_EMAIL');
$password = getenv('DISCORD_PASSWORD');

// Try log into Discord!
$discord = new Discord($email_address, $password);
$permissions = new Permissions(); //pass in null if you want the role to have zero permissions
$color = new RoleColors();

/*
 * By default a role is created with the following permissions:
 * Read Messages, Send Messages, Send TTS Messages, Embed Links,
 * Attach Files, Read Message History, Mention Everyone
 * Voice Connect, Voice Speak, Use Voice Activity
 * Create Instant Invite
 *
 * Let's revoke the user's ability to create instant invites and send TTS messages...
 */
$permissions->setCreateInstantInvite(false);
$permissions->setSendTTSMessages(false);

echo '<pre>';
echo 'Look good? <br>';
print_r($permissions->listPermissions());
echo '<br>';
echo 'Here\'s the code we feed to the method: '.$permissions->finalPermissions().'<br>';

/*
 * If that looks good, pass the $permissions var into the create / edit role.
 */

$guildId = '105775765877989376'; //you need to change this! ##
$name = 'Cool Buds';
$color = $color->darkRed;
$hoist = true;

print_r($discord->api('role')->create($guildId, $name, $permissions->finalPermissions(), $color, $hoist));