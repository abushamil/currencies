<?php

namespace App\Console\Commands;

use App\Models\Currency;
use App\Services\CbrParser;
use Illuminate\Console\Command;
use Throwable;

class CurrenciesUpdateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'currencies:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function handle(CbrParser $cbrParser): int
    {
        $added = 0;
        $updated = 0;
        try {
            foreach ($cbrParser->getCurrencies() as $cbrCurrency) {

                $currency = Currency::where('name', $cbrCurrency->name)->first();

                if (!$currency) {
                    $currency = new Currency();
                    $new = true;
                } else {
                    $new = false;
                }

                $currency->name = $cbrCurrency->name;
                $currency->rate = $cbrCurrency->value;

                if ($currency->save()) {
                    $new ? $added++ : $updated++;
                }

            }
        } catch (Throwable $exception) {
            echo "Что-то пошло не так...";
        }

        echo "Добавлено: {$added}, изменено: {$updated} записей.\n";

        return 1;
    }

}
