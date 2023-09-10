<?php

declare(strict_types=1);

use MonsterQuest\Generator\MonsterGenerator;
use MonsterQuest\Utils\CommandLineOutput;

require_once __DIR__ . '/vendor/autoload.php';


$monsterDto = (new MonsterGenerator())->execute(name: 'Slime', level: 10, hp: 30, mp: 15);
$monsterArr = $monsterDto->toArray();
echo CommandLineOutput::execute("A {$monsterArr['name']} draws near!");

echo PHP_EOL;

echo CommandLineOutput::execute('What do we do?');

echo PHP_EOL;

echo CommandLineOutput::execute('Please input f(fight) or r(run away).');

$userInput = trim(fgets(STDIN));

if ($userInput === 'f') {
    fight($monsterArr['hp'], $monsterArr['name']);
} else if ($userInput === 'r') {
    runAway();
}

function fight(int $monsterHp, string $monsterName)
{
    $damage = rand(5, 8);
    $RemainingHp = $monsterHp - $damage;

    if ($RemainingHp < 0) {
        echo "{$monsterName} down!!" . PHP_EOL;
    } else {
        echo "{$damage} damage to the {$monsterName}. ";
    }
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
