<?php

declare(strict_types=1);

namespace MonsterQuest\Utils;

class CommandLineOutput
{
    public static function execute(string $outputText): string
    {
        return "{$outputText}" . PHP_EOL;
    }
}
