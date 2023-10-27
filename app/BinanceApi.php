<?php
declare(strict_types=1);
namespace App;

use GuzzleHttp\Client;

class BinanceApi
{
    private Client $client;
    private const API_URL = 'https://api4.binance.com/api/v3/ticker/24hr';

    public function __construct()
    {
        $this->client = new Client();
    }

    private function getUrl(CryptoCurrency $crypto): string
    {
        return self::API_URL . '?' . http_build_query(['symbol' => $crypto->getSymbol()]);
    }

    public function fetch24HourInfo(CryptoCurrency $crypto): object
    {
        $url = $this->getUrl($crypto);
        $response = $this->client->get($url);
        return json_decode((string)$response->getBody());
    }

    public function display24HourInfo(CryptoCurrency $crypto): void
    {
        $info = $this->fetch24HourInfo($crypto);
        echo "24h Info for {$crypto->getSymbol()}:" . PHP_EOL;
        echo "Symbol: {$info->symbol}" . PHP_EOL;
        echo "Price change: {$info->priceChange} BTC" . PHP_EOL;
        echo "Price change percent: {$info->priceChangePercent}%" . PHP_EOL;
        echo "Weighted average price: {$info->weightedAvgPrice}" . PHP_EOL;
        echo "Previous close price: {$info->prevClosePrice}" . PHP_EOL;
        echo "Last price: {$info->lastPrice}" . PHP_EOL;
        echo "Last quantity: {$info->lastQty}" . PHP_EOL;
        echo "Bid price: {$info->bidPrice}" . PHP_EOL;
        echo "Bid quantity: {$info->bidQty}" . PHP_EOL;
        echo "Ask price: {$info->askPrice}" . PHP_EOL;
        echo "Ask quantity: {$info->askQty}" . PHP_EOL;
        echo "Open price: {$info->openPrice}" . PHP_EOL;
        echo "High price: {$info->highPrice}" . PHP_EOL;
        echo "Low price: {$info->lowPrice}" . PHP_EOL;
        echo "Volume: {$info->volume}" . PHP_EOL;
        echo "Quote volume: {$info->quoteVolume}" . PHP_EOL;
        echo "Open time: {$info->openTime}" . PHP_EOL;
        echo "Close time: {$info->closeTime}" . PHP_EOL;
        echo "First ID: {$info->firstId}" . PHP_EOL;
        echo "Last ID: {$info->lastId}" . PHP_EOL;
        echo "Count: {$info->count}" . PHP_EOL;
    }
}