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

    /**
     * @test
     */
    public function it_allows_the_robot_to_face_west(): void
    {
        $robot = new Robot(0, 0, 'NORTH', new Board(5, 5));
        $robot->rotate('LEFT');
        self::assertEquals('0,0,WEST', $robot->report());
    }

    /**
     * @test
     */
    public function it_allows_the_robot_to_travel_north_from_east(): void
    {
        $robot = new Robot(1, 2, 'EAST', new Board(5, 5));
        $robot->move();
        $robot->move();
        $robot->rotate('LEFT');
        $robot->move();
        self::assertEquals('3,3,NORTH', $robot->report());
    }
}
