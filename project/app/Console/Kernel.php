<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Facture;

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
        $schedule->call( function(){
            $factures = Facture::all();

            foreach ($factures as $facture) {

                switch ($facture->status) {

                    case 0: 
                        if ($facture->created_at->addDays(15)->isPast()) {
                            $facture->status = 1;
                            $facture->save();
                            $facture->notify(new TemplateEmail()); //1ère relance
                        }
                        break;

                    case 1: 
                        if ($facture->created_at->addDays(30)->isPast()) {
                            $facture->status = 2;
                            $facture->save();
                            $facture->notify(new TemplateEmail()); //2e relance
                        }
                        break;

                    case 2: 
                        if ($facture->created_at->addDays(45)->isPast()) {
                            $facture->status = 3;
                            $facture->save();
                            $facture->notify(new TemplateEmail()); //3e relance
                        }
                        break;

                    case 3: 
                    if ($facture->created_at->addDays(45)->isPast()) {
                        $facture->status = 4;
                        $facture->save();
                        $facture->notify(new TemplateEmail()); //Contentieux
                    }
                    break;


                }

                
            }

        })->daily();
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
