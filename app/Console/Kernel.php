<?php

namespace App\Console;

use App\Models\Repertoire;
use App\Models\Reservation;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        //Gdzie zadeklarować poniższą funkcję?     <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< 
        $schedule->call(function () {
            $reservations = Reservation::all();
            foreach ($reservations as $reservation)
            {
                if($reservation->repertoire->display_date === now()->toDateString())
                {
                    $display_time = explode(":", $reservation->repertoire->display_time);
                    $display_time_in_seconds = ($display_time[0]-1) * 3600 + $display_time[1] * 60 + $display_time[2];
                    $delete_time = now('Europe/Berlin')->format('H') * 3600 + now()->format('i') * 60 + now()->format('s');

                    if ($display_time_in_seconds <= $delete_time) 
                    {
                        $available_seats = Reservation::retrieveSeat($reservation->seats_number, $reservation->repertoire->available_seats);
                        $repertoire = Repertoire::find($reservation->repertoire_id);
                        $repertoire->available_seats = $available_seats;
                        $repertoire->save();
                        
                        Reservation::where('uuid', $reservation->uuid)->delete();
                    }
                }
            }
        })->everySecond();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
