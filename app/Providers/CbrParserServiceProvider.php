<?php

namespace App\Providers;

use App\Services\CbrParser;
use Illuminate\Support\ServiceProvider;

class CbrParserServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->when(CbrParser::class)
            ->needs('$feedUrl')
            ->giveConfig('services.cbr_parser.feed_url');
    }

}
