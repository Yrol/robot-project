<?php

namespace App\CustomClasses;

class Robot
{
    private $x;
    private $y;
    private $board;
    private $face;
    private $onBoard = false;

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
            case Directions::NORTH:
                if ($this->board->getMaxHeight() === $this->y) {
                    return;
                }
                $this->y += 1;
                break;
            case Directions::SOUTH:
                if ($this->y === 0) {
                    return;
                }
                $this->y -= 1;
                break;
            case Directions::EAST:
                if ($this->board->getMaxWidth() === $this->x) {
                    return;
                }
                $this->x += 1;
                break;
            case Directions::WEST:
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
        if ($direction === Directions::LEFT) {
            switch ($this->face) {
                case Directions::NORTH:
                    $this->face = Directions::WEST;
                    break;
                case Directions::EAST:
                    $this->face = Directions::NORTH;
                    break;
                case Directions::SOUTH:
                    $this->face = Directions::EAST;
                    break;
                default:
                    $this->face = Directions::SOUTH;
                    break;
            }
        } else {
            // right rotation
            switch ($this->face) {
                case Directions::NORTH:
                    $this->face = Directions::EAST;
                    break;
                case Directions::SOUTH:
                    $this->face = Directions::WEST;
                    break;
                case Directions::WEST:
                    $this->face = Directions::NORTH;
                    break;
                default:
                    $this->face = Directions::SOUTH;
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
