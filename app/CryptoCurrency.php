<?php
declare(strict_types=1);

namespace App;

class CryptoCurrency
{
    private string $symbol;

    public function __construct(string $symbol)
    {
        $this->symbol = strtoupper($symbol) . 'BTC';
    }

    public function getSymbol(): string
    {
        return $this->symbol;
    }
}