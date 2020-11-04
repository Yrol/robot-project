<?php

namespace Tests\Unit;

use App\CustomClasses\Board;
use App\CustomClasses\Robot;
use Tests\TestCase;

class RobotInputMoveTest extends TestCase
{
    /**
     * @test
     */
    public function it_allows_the_robot_to_move_one_step_forward_north(): void
    {
        $robot = new Robot(0, 0, 'NORTH', new Board(5, 5));
        $robot->move();
        self::assertEquals('0,1,NORTH', $robot->report());
    }
}
