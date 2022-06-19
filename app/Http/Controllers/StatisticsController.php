<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class StatisticsController extends Controller
{
    public function dashboard()
    {
        $stats = Redis::get('logs_stats');

        return view('statistics.dashboard', ['stats' => json_decode($stats, true)]);
    }
}
