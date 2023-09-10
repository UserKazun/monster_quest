<?php

declare(strict_types=1);

namespace MonsterQuest\Dto;

class MagicDto
{
    private string $name;
    private int $reduMp;

    public function __construct(string $name, int $reduMp)
    {
        $this->name = $name;
        $this->reduMp = $reduMp;
    }
}
