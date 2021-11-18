<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        Commands\BypassRequestKontraktor::class
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            try {
                date_default_timezone_set('Asia/Jakarta');
                $permintaan = DB::table('request')->get();
                foreach ($permintaan as $request) {
                    $permintaan_konsultan =  date("d-m-Y", strtotime($request->tgl_kirim_to_konsultan));
                    $permintaan_mk = date("d-m-Y", strtotime($request->tgl_kirim_to_mk));
                    $date_lock_konsultan = date("d-m-Y", strtotime($permintaan_konsultan . '+2 days'));
                    $date_lock_mk = date("d-m-Y", strtotime($permintaan_mk . '+2 days'));
                    if (!empty($request->tgl_kirim_to_konsultan)) {
                        if ($permintaan_konsultan == date('d-m-Y')) {
                            if ($request->status == 2) {
                                DB::table('request')->where('id', $request->id)->update([
                                    'konsultan' => 'Konsultan Tidak Merespon File diteruskan Ke MK',
                                    'status' => 3,
                                    'bypass_konsultan' => 1,
                                ]);
                            }
                        }
                    }
                    if (!empty($request->tgl_kirim_to_mk)) {
                        if ($permintaan_mk == date('d-m-Y')) {
                            if ($request->status == 3) {
                                DB::table('request')->where('id', $request->id)->update([
                                    'mk' => 'MK Tidak Merespon File diteruskan Ke PPK',
                                    'status' => 4,
                                    'bypass_mk' => 1,
                                ]);
                            }
                        }
                    }
                }
                info('cron job execute [bypass_permintaan]');
            } catch (\Throwable $e) {
                info($e->getMessage());
            }
        })->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
