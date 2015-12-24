<?php

/*
 * This file is part of cleanse/discord-hypertext package.
 *
 * (c) 2015-2015 Paul Lovato <plovato@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

error_reporting(-1);
require __DIR__ . '/../vendor/autoload.php';
$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();

use Discord\Discord;

// Email/Password for Discord
$email_address = getenv('DISCORD_EMAIL');
$password = getenv('DISCORD_PASSWORD');

// Try log into Discord!
$discord = new Discord($email_address, $password, $token = null);

//Cache this for your next queries, pass it as the third argument
$cachedToken = $discord->token();