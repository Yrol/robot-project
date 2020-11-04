<?php

namespace App\Interfaces;

interface RobotInterface
{
    public function place(int $x, int $y, string $f): void;
    public function move(): void;
    public function report(): string;
}
