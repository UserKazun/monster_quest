<?php

declare(strict_types=1);

namespace MonsterQuest\Generator;

use MonsterQuest\Dto\YusyaDto;

class YusyaGenerator
{
    public function execute(string $name, int $hp, int $mp, array $magics): YusyaDto
    {
        return new YusyaDto($name, $hp, $mp, $magics);
    }
}
