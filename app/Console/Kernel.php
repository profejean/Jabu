<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        $schedule->command('task:minute')->everyMinute();
        $schedule->command('task:daily')->daily();
        $schedule->command('task:everyMonday')->mondays();
        $schedule->command('task:everyMWF')->mondays()->wednesdays()->fridays();
        $schedule->command('task:firstFiveDayMonth')->monthlyOn(5, '00:00');
        $schedule->command('task:fiveDayMonthMarch')->yearlyOn(3, 5, '00:00');
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
