<?php

declare(strict_types=1);

namespace App\Game;

class State
{
    private const MASKED_SYM = '*';

    public function __construct(
        private array $secret,
        private array $masked_word = []
    )
    {
    }

    public static function fromWord(string $word): State
    {
        $secret = str_split($word);

        return new self(
            $secret,
            array_fill(0, count($secret), self::MASKED_SYM)
        );
    }

    public function getSecret(): array
    {
        return $this->secret;
    }

    public function getMaskedWord(): array
    {
        return $this->masked_word;
    }

    public function isFinished(): bool
    {
        return $this->getMaskedWord() === $this->getSecret();
    }

    public function addLetter(string $letter): void
    {
        $i = 0;
        foreach ($this->secret as $secretLetter) {
            if ($secretLetter === $letter) {
                $this->masked_word[$i] = $letter;
            }
            $i++;
        }
    }
}
