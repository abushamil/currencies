<?php


namespace App\Services;


use App\Contracts\CbrCurrency;
use Illuminate\Support\Facades\Http;
use SimpleXMLElement;

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
    public function getCurrencies(): array
    {
        $currencies = [];
        $xml = $this->getXmlCurrencies();
        foreach ($xml->Valute as $row) {
            $currencies[] = $this->serializeCurrency($row);
        }
        return $currencies;
    }

    public function getRaw(): string
    {
        return Http::get($this->feedUrl);
    }

    public function getXmlCurrencies(): SimpleXMLElement
    {
        return new SimpleXMLElement($this->getRaw());
    }

    public function serializeCurrency(SimpleXMLElement $row): CbrCurrency
    {
        $currency = new CbrCurrency();
        $currency->numCode = (int)$row->NumCode;
        $currency->charCode = $row->CharCode;
        $currency->nominal = (int)$row->Nominal;
        $currency->name = $row->Name;
        $currency->value = (float)$row->Value;
        return $currency;
    }

}
