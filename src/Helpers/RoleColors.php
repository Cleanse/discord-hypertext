<?php

/*
 * This file is part of cleanse/discord-hypertext package.
 *
 * (c) 2015-2015 Paul Lovato <plovato@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Discord\Helpers;

class RoleColors
{
    public $default;
    public $cyan;
    public $darkCyan;
    public $green;
    public $darkGreen;
    public $blue;
    public $darkBlue;
    public $purple;
    public $darkPurple;
    public $red;
    public $darkRed;
    public $orange;
    public $darkOrange;
    public $navy;
    public $darkNavy;
    public $gold;
    public $darkGold;
    public $lighterGrey;
    public $lightGrey;
    public $darkGrey;
    public $darkerGrey;

    public function __construct()
    {
        $this->default = 0;
        $this->cyan = 1752220;
        $this->darkCyan = 1146986;
        $this->green = 3066993;
        $this->darkGreen = 2067276;
        $this->blue = 3447003;
        $this->darkBlue = 2123412;
        $this->purple = 10181046;
        $this->darkPurple = 7419530;
        $this->red = 15158332;
        $this->darkRed = 10038562;
        $this->orange = 15105570;
        $this->darkOrange = 11027200;
        $this->navy = 3426654;
        $this->darkNavy = 2899536;
        $this->gold = 15844367;
        $this->darkGold = 12745742;
        $this->lighterGrey = 9807270;
        $this->lightGrey = 12370112;
        $this->darkGrey = 9936031;
        $this->darkerGrey = 8359053;
    }
}