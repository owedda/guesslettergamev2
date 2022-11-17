<?php

namespace App\Tests\Unit\Game;

use App\Game\LuckyDrawGame;
use App\Game\State;
use App\Player\DrunkPlayer;
use PHPUnit\Framework\TestCase;

class LuckyDrawGameTest extends TestCase
{
    public function testIfTurnWasMade(): void
    {
        $game = new LuckyDrawGame();
        $game->makeTurn();
        $this->assertFalse($game->isFinished());
    }

    public function testLetterGuessSuccess(): void
    {
        $player = new FakePlayer();
        $game = new LuckyDrawGame(State::fromWord('hi'));
        $game->addPlayer($player);
        $state = $game->makeTurn();

        $this->assertSame(['h', '*'], $state->getMaskedWord());
    }

//    public function testIfGameIsFinished(): void
//    {
//        $player = new DrunkPlayer();
//        $game = new LuckyDrawGame();
//        $game->addPlayer($player);
//        $game->makeTurn();
//
//        while (!$game->isFinished()) {
//            $game->makeTurn();
//        }
//        $this->assertTrue($game->isFinished());
//    }
}
