<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Carbon\Carbon;
use App\Models\Sale;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        // daily midnight clear all pending
         $schedule->call(function () {
           $pending_sales = Sale::where('status', 'PENDING')->get();
           foreach($pending_sales as $sale){
              $sale->markLost();
            }
        })
         ->daily()
         ->timeZone('Africa/Nairobi')
         ->evenInMaintenanceMode()
         ->when(function(){
            Sale::where('status', 'PENDING')->count() > 0;
         });
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
