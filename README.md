# discord-hypertext
An unofficial PHP API wrapper for the Discord client (http://discordapp.com).  
 
**We're currently on version 1.2. This version has some major changes that could break your old code.**

Changes:  
 * Added a new token option for authenticating.  
 * The login route is rate limited, so please cache the token for login. `$discord->token()`  
 * [Mentions][mentions] are now auto created if you use `<@userid>`  

## Getting Started

### Requirements

  * PHP >= 5.5.9
  * [Composer](https://getcomposer.org)

### Install

To install, run the following (assuming composer is in your PATH)

```sh
composer require cleanse/discord-hypertext
```

This will install the current master branch.

### Usage

##### [Check out the docs][docs]

##### [Check out the example][examples]

[examples]: examples/
[docs]: docs/
[mentions]: docs/Channel/Messages.md