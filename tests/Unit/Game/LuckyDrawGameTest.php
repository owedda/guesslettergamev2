<?php

namespace App\Tests\Unit\Game;

use App\Game\LuckyDrawGame;
use PHPUnit\Framework\TestCase;

class LuckyDrawGameTest extends TestCase
{
    public function testIfTurnWasMade(): void
    {
        $game = new LuckyDrawGame();
        $game->makeTurn();
        $this->assertFalse($game->isFinished());
    }
}
