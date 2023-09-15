<?php

declare(strict_types=1);

namespace MonsterQuest\Dto;

class YusyaDto
{
    private string $name;
    private int $hp;
    private int $mp;
    /** @var MagicDto[] */
    private array $magics;

    public function __construct(string $name, int $hp, int $mp, array $magics)
    {
        $this->name = $name;
        $this->hp = $hp;
        $this->mp = $mp;
        $this->magics = $magics;
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'hp' => $this->hp,
            'mp' => $this->mp,
            'magics' => $this->magics
        ];
    }
}
