<?php

declare(strict_types=1);

namespace MonsterQuest\Dto;

use InvalidArgumentException;

class MonsterDto
{
    private string $name;
    private int $level;
    private int $hp;
    private int $mp;

    public function __construct(
        string $name,
        int $level,
        int $hp,
        int $mp
    ) {
        $nameCount = strlen($name);
        if ($nameCount > 20 || $name === '') {
            throw new InvalidArgumentException(
                "Monster name must be 0~20 characters. Monster name entered: {$name}, count: {$nameCount}"
            );
        }
        $this->name = $name;

        if ($level <= 0 || $hp <= 0 || $mp <= 0) {
            throw new InvalidArgumentException(
                "Cannot specify a level,hp,mp less than 0. inputLevel: {$level}, inputHP: {$hp}, inputMP: {$mp}"
            );
        }
        $this->level = $level;
        $this->hp = $hp;
        $this->mp = $mp;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'level' => $this->level,
            'hp' => $this->hp,
            'mp' => $this->mp
        ];
    }
}
