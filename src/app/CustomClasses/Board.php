<?php

namespace App\CustomClasses;

class Board
{
    private $maxWidth;
    private $maxHeight;

    public function __construct(int $h, int $w)
    {
        $this->maxWidth = $w;
        $this->maxHeight = $h;
    }

    /**
     * -1 to prevent robot from falling off
     */
    public function getMaxHeight(): int
    {
        return $this->maxHeight;
    }

    /**
     * -1 to prevent robot from falling off
     */
    public function getMaxWidth(): int
    {
        return $this->maxWidth;
    }
}
