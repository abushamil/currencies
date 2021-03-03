<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    public function index(){
        $currencies = Currency::paginate(10);
        return $currencies;
    }

    public function show($currencyName){
        $currency = Currency::where('name', $currencyName)->firstOrFail();
        return $currency;
    }

}
