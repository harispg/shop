<?php

namespace App\Console;

use App\User;
use Carbon\Carbon;
use App\Mail\AccountDeletedMail;
use App\Mail\InactiveWarningMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

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
        $currentTime = Carbon::now();
        $schedule->call(function () use ($currentTime){
            $inactiveNotWarned = User::where([
                [
                    'updated_at', '<', $currentTime->subWeeks(23)
                ],
                [
                    'warned', '=', false 
                ]
            ])->get();
            if($inactiveNotWarned->count() > 0){
                foreach ($inactiveNotWarned as $user) {
                    Mail::to($user)->send(new InactiveWarningMail($user));
                    $user->timestamps = false;
                    $user->warned = true;
                    $user->save();
                    $user->timestamps = true;
                }
            }

            $forDeletion = User::where([
                [
                    'updated_at', '<', $currentTime->subWeeks(24)
                ],
                [
                    'warned', '=', true 
                ]
            ])->get();

            if($forDeletion->count() > 0){
                foreach ($forDeletion as $user) {
                    $userName = $user->name;
                    Mail::to($user)->send(new AccountDeletedMail($userName));
                    $user->delete();
                }
            }           
        })->dailyAt('04:00')->name('deleting_users')->withoutOverlapping();
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
