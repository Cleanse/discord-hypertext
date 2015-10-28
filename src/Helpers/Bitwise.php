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

abstract class Bitwise
{
    protected $flags;

    protected function isFlagSet($flag)
    {
        return (($this->flags >> $flag) & 1) == 1;
    }

    protected function setFlag($flag, $value)
    {
        if ($value) {
            $this->flags |= (1 << $flag);
        } else {
            $this->flags &= ~(1 << $flag);
        }
    }
}