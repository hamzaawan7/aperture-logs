<?php

namespace App\Console\Commands;

use App\Models\Log;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Redis;

class CalculateStatisticsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'calculate:statistics';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command calculates the statistics against a date and stored in Cache';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(): int
    {
        $logs = Log::all();
        $countryLogs = [];

        foreach ($logs as $log) {
            $params = json_decode($log->params, true);

            if (isset($countryLogs[$params['geolocation']['display']][$log->ended_at_date])) {
                $countryLogs[$params['geolocation']['display']][$log->ended_at_date] += 1;
            } else {
                $countryLogs[$params['geolocation']['display']][$log->ended_at_date] = 1;
            }
        }

        Redis::set('logs_stats', json_encode($countryLogs));

        return 1;
    }
}
