<?php namespace App\CustomClasses;

class Robot
{
    private $x;
    private $y;
    private $board;
    private $face;

    public const NORTH = 'NORTH';
    public const SOUTH = 'SOUTH';
    public const EAST = 'EAST';
    public const WEST = 'WEST';

    public function __construct(int $x, int $y, string $face, Board $board)
    {
        $this->board = $board;
        $this->place($x, $y, $face);
    }

    public function place(int $x, int $y, string $face): void
    {
        $this->x = $x;
        $this->y = $y;
        $this->face = $face;
    }

    public function move(): void
    {
        switch ($this->face) {
            case self::NORTH:
                if ($this->board->getMaxHeight() === $this->y) {
                    return;
                }
                $this->y += 1;
                break;
            case self::SOUTH:
                if ($this->y === 0) {
                    return;
                }
                $this->y -= 1;
                break;
            case self::EAST:
                if ($this->board->getMaxWidth() === $this->x) {
                    return;
                }
                $this->x += 1;
                break;
            case self::WEST:
                if ($this->x === 0) {
                    return;
                }
                $this->x -= 1;
                break;
        }
    }

    public function rotate(string $direction): void
    {
        //left rotation
        if ($direction === 'LEFT') {
            switch ($this->face) {
                case self::NORTH:
                    $this->face = self::WEST;
                    break;
                case self::EAST:
                    $this->face = self::NORTH;
                    break;
                case self::SOUTH:
                    $this->face = self::EAST;
                    break;
                default:
                    $this->face = self::SOUTH;
                    break;
            }
        } else {
            // right rotation
            switch ($this->face) {
                case self::NORTH:
                    $this->face = self::EAST;
                    break;
                case self::SOUTH:
                    $this->face = self::WEST;
                    break;
                case self::WEST:
                    $this->face = self::NORTH;
                    break;
                default:
                    $this->face = self::SOUTH;
                    break;
            }
        }
    }

    //reporting the current position of the robot
    public function report(): string
    {
        return "$this->x,$this->y,$this->face";
    }
}
