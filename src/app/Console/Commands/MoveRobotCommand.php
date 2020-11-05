<?php

namespace App\Console\Commands;

use App\CustomClasses\Direction;
use App\CustomClasses\Robot;
use App\CustomClasses\Board;
use App\CustomClasses\Commands;
use App\CustomClasses\Directions;
use App\Helper\InputFileHelper;
use Illuminate\Console\Command;

class MoveRobotCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'move-robot {file-path=Inputs/input.txt}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Moving the Robot using the input files provided';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        try {
            $lines = InputFileHelper::readInputFileInstructions($this->argument('file-path'));
            if (count($lines) > 0) {

                //separate 1st placement values and add to an array. Ex: [0 => "0" 1 => "0" 2 => "NORTH"]
                $placeCommand = explode(',', explode(' ', $lines[0])[1]);

                //x,y positions and adding initiating the Board
                $robot = new Robot(
                    $placeCommand[0],
                    $placeCommand[1],
                    strtoupper($placeCommand[2]),
                    new Board(5, 5)
                );

                // Loop through the rest of the commands and simulate the robot
                for ($i = 1, $iMax = count($lines); $i < $iMax; $i++) {

                    // Check if it is the place command then place change teh placement accordingly
                    if (strpos($lines[$i], InputFileHelper::DIRECTION_REGEX) !== false) {
                        $placeCommand = explode(',', explode(' ', $lines[$i])[1]);
                        $robot->place($placeCommand[0], $placeCommand[1], strtoupper($placeCommand[2]));
                    }

                    // Check if the commands are either MOVE, LEFT, RIGHT or REPORT
                    switch ($lines[$i]) {
                        case Commands::MOVE:
                            $robot->move();
                            break;
                        case Directions::RIGHT:
                            $robot->rotate(Directions::RIGHT);
                            break;
                        case Directions::LEFT:
                            $robot->rotate(Directions::LEFT);
                            break;
                        case Commands::REPORT:
                            $this->info($robot->report());
                            break;
                    }
                }
            }
        } catch (\Exception $e) {
            $this->error($e->getMessage());
        }
    }
}
