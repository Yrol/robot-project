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

    public function getMaxHeight(): int
    {
        return $this->maxHeight;
    }

    public function getMaxWidth(): int
    {
        return $this->maxWidth;
    }
}
