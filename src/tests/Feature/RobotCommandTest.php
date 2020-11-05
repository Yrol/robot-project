<?php

namespace Tests\Feature;

use Tests\TestCase;

class RobotCommandTest extends TestCase
{
    /**
     * @test
     */
    public function it_allows_the_robot_to_move_one_step_forward_north_read_from_input_1(): void
    {
        $this->artisan('move-robot Inputs/input1.txt')->expectsOutput('0,1,NORTH');
    }

    /**
     * @test
     */
    public function it_allows_the_robot_to_face_west_read_from_input_2(): void
    {
        $this->artisan('move-robot Inputs/input2.txt')->expectsOutput('0,0,WEST');
    }

    /**
     * @test
     */
    public function it_allows_the_robot_to_travel_north_from_east_read_from_input_2(): void
    {
        $this->artisan('move-robot Inputs/input3.txt')->expectsOutput('3,3,NORTH');
    }
}
