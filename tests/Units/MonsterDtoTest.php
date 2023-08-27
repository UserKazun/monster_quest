<?php

declare(strict_types=1);

namespace Tests\Units;

use MonsterQuest\Dto\MonsterDto;
use PHPUnit\Framework\TestCase;

class MonsterDtoTest extends TestCase
{
    /**
     * @return void
     */
    public function testSuccessCreateDto()
    {
        $monsterDto = new MonsterDto('Slime', 10, 30, 15);

        $this->assertInstanceOf(MonsterDto::class, $monsterDto);
    }
}
