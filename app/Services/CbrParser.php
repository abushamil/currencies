<?php


namespace App\Services;


use App\Contracts\CbrCurrency;

class CbrParser
{
    private string $feedUrl;

    public function __construct(string $feedUrl)
    {
        $this->feedUrl = $feedUrl;
    }

    /**
     * @return CbrCurrency[]
     */
    public function getCurrencies(): array{
        return [];
    }

    public function parse():string{

    }

}
