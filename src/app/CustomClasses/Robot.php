<?php namespace App\CustomClasses;

class Robot
{
    private $x;
    private $y;
    private $board;
    private $face;
    private $onBoard = false;

    private const NORTH = 'NORTH';
    private const SOUTH = 'SOUTH';
    private const EAST = 'EAST';
    private const WEST = 'WEST';

    public function __construct(int $x, int $y, string $face, Board $board)
    {
        $this->board = $board;
        $this->place($x, $y, $face);
    }

    public function place(int $x, int $y, string $face): void
    {
        if ($this->isOnBoard()) {
            echo "Robot is already in place";
            die();
        }

        $this->x = $x;
        $this->y = $y;
        $this->face = $face;

        $this->onBoard = true;
    }

    public function move(): void
    {
        if (!$this->isOnBoard()) {
            echo "Could not find the Robot";
            die();
        }

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
        if (!$this->isOnBoard()) {
            echo "Could not find the Robot";
            die();
        }

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

    private function isOnBoard(): bool
    {
        return $this->onBoard;
    }
}
