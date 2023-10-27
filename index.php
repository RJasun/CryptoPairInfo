<?php
declare(strict_types=1);
require_once 'vendor/autoload.php';

use App\CryptoCurrency;
use App\BinanceApi;

$cryptoInput = readline("Enter cryptocurrency (ETH or LTC): ");
$crypto = new CryptoCurrency($cryptoInput);

$binanceApi = new BinanceApi();
$binanceApi->display24HourInfo($crypto);