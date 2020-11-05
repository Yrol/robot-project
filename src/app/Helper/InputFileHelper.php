<?php

namespace App\Helper;

use App\CustomClasses\Commands;
use App\CustomClasses\Directions;
use Illuminate\Support\Facades\File;

class InputFileHelper
{
    //Regex to find occurrences - place,north,south,east or west
    public const DIRECTION_REGEX = '/^place [\d]+,[\d]+,(north|south|east|west)$/i';

    public static function readInputFileInstructions(string $file = 'Inputs/input1.txt'): array
    {
        $commands = [];
        $contents = File::get(app_path($file));
        $lines = explode(PHP_EOL, $contents);
        if (count($lines) > 0) {
            $commands[] = self::parseLine($lines[0]); //adding the first command. Ex: PLACE 0,0,NORTH
            if (preg_match(self::DIRECTION_REGEX, $commands[0])) {
                for ($i = 1, $iMaxLength = count($lines) - 1; $i < $iMaxLength; $i++) {
                    $commands[] = self::parseLine($lines[$i]); // Adding the rest of the commands
                }
            } else {
                throw new \InvalidArgumentException('Invalid direction found');
            }
        }
        return $commands;
    }

    private static function parseLine($line):string
    {
        if (preg_match(self::DIRECTION_REGEX, $line)) {
            return $line;
        }

        switch ($line) {
            case Commands::MOVE:
                return Commands::MOVE;
            case Directions::LEFT:
                return Directions::LEFT;
            case Directions::RIGHT:
                return Directions::RIGHT;
            case Commands::REPORT:
                return Commands::REPORT;
        }

        throw new \InvalidArgumentException('Invalid input file');
    }
}
