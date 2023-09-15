<?php

declare(strict_types=1);

use MonsterQuest\Dto\MagicDto;
use MonsterQuest\Generator\MonsterGenerator;
use MonsterQuest\Generator\YusyaGenerator;
use MonsterQuest\Utils\CommandLineOutput;

require_once __DIR__ . '/vendor/autoload.php';

error_reporting(E_ALL);

$yusyaDto = (new YusyaGenerator())->execute(
    name: 'Tolo',
    hp: 200,
    mp: 100,
    magics: [
        new MagicDto('Fire ball', 10),
        new MagicDto('Heal', 5),
        new MagicDto('Power up', 8),
        new MagicDto('Pillar of flame', 12)
    ]
);
$monsterDto = (new MonsterGenerator())->execute(
    name: 'Slime',
    level: 10,
    hp: 30,
    mp: 15
);

$yusyaArr = $yusyaDto->toArray();
$monsterArr = $monsterDto->toArray();
echo CommandLineOutput::execute("A {$monsterArr['name']} draws near!");

echo CommandLineOutput::execute("Your status.");
echo CommandLineOutput::execute("HP: {$yusyaArr['hp']}, MP: {$yusyaArr['mp']}");

echo PHP_EOL;

echo CommandLineOutput::execute('What do we do?');

echo PHP_EOL;

echo CommandLineOutput::execute('Please input f(fight) or r(run away).');

$userInput = trim(fgets(STDIN));

if ($userInput === 'f') {
    $remainingMonsterHp = $monsterArr['hp'];
    while (true) {
        $remainingMonsterHp = fight($remainingMonsterHp, $monsterArr['name']);
        if ($remainingMonsterHp <= 0) {
            break;
        }
    }
} else if ($userInput === 'r') {
    runAway();
}

function fight(int $monsterHp, string $monsterName): int
{
    $damage = rand(5, 8);
    $remainingHp = $monsterHp - $damage;

    if ($remainingHp <= 0) {
        echo CommandLineOutput::execute("{$monsterName} down!!");
    } else {
        echo CommandLineOutput::execute("{$damage} damage to the {$monsterName}.");
    }

    return $remainingHp;
}

function runAway()
{
    echo 'We got away!' . PHP_EOL;
}

function generateMonster(string $name)
{
    echo "A {$name} draws near!" . PHP_EOL;

    $monster = [
        'name' => $name,
        'level' => 10,
        'hp' => 30,
        'mp' => 15
    ];

    echo "Lv. {$monster['level']}" . PHP_EOL;

    return $monster;
}
