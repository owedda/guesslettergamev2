<?php

declare(strict_types=1);

namespace App\Game;

use App\Player\PlayerInterface;

class LuckyDrawGame
{
    private array $players = [];
    private ?State $state = null;

    public function __construct(State $state = null)
    {
        $words = ['some', 'random', 'words', 'here'];
        shuffle($words);
        $secret = $words[0];

        $this->state = $state ?? State::fromWord($secret);
    }


    public function addPlayer(PlayerInterface $player)
    {
        $this->players[] = $player;
    }

    public function makeTurn(): void
    {
        foreach ($this->players as $player) {

        }
    }

    public function isFinished(): bool
    {
        return $this->state->getMaskedWord() === $this->state->getSecret();
    }
}
