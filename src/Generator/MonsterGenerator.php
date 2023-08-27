<?php

declare(strict_types=1);

namespace MonsterQuest\Generator;

use MonsterQuest\Dto\MonsterDto;

class MonsterGenerator
{
    /**
     * @param string $name
     * @param int $level
     * @param int $hp
     * @param int $mp
     * 
     * @return MonsterDto
     */
    public function execute(string $name, int $level, int $hp, int $mp)
    {
        return new MonsterDto(name: $name, level: $level, hp: $hp, mp: $mp);
    }
}
