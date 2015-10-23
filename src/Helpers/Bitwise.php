<?php
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