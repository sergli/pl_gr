<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SendDailyEmail extends Command
{
    protected $signature = 'ln:daily';
    protected $description = 'Send the daily email';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $foreigners = \App\Models\Foreigner::cursor()->filter(function (\App\Models\Foreigner $foreigner) {
              return $foreigner->hasAnyDatesNearExpire();
        });
        \Illuminate\Support\Facades\Mail::to('ivan@ivanov.ru')->send(new \App\Mail\SomeForeignersNearExpiryEmail($foreigners));
        return 'Mail succesfully sent';
    }

    protected function schedule(\Illuminate\Console\Scheduling\Schedule $schedule)
    {
        $schedule->command('ln:daily')->daily()->at('15:00');
    }
}
