<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestEmail;

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
                $permintaan = DB::table('request')->get();
                foreach ($permintaan as $request) {
                    $permintaan_konsultan =  date("d-m-Y", strtotime($request->tgl_kirim_to_konsultan));
                    $permintaan_mk = date("d-m-Y", strtotime($request->tgl_kirim_to_mk));
                    $date_lock_konsultan = date("d-m-Y", strtotime($permintaan_konsultan . '+2 days'));
                    $date_lock_mk = date("d-m-Y", strtotime($permintaan_mk . '+2 days'));
                    if (!empty($request->tgl_kirim_to_konsultan)) {
                        if ($permintaan_konsultan == $date_lock_konsultan) {
                            if ($request->status == 2) {
                                DB::table('request')->where('id', $request->id)->update([
                                    'konsultan' => 'Konsultan Tidak Merespon File diteruskan Ke MK',
                                    'status' => 3,
                                    'bypass_konsultan' => 1,
                                ]);
                                DB::table('history_request')->insert([
                                    "username" => 'System',
                                    "id_request" => $request->id,
                                    "user_id" => '1',
                                    "keterangan" => "Request Telah Telah Diteruskan Oleh System Kepada MK",
                                    "class" => "kirim",
                                    "created_at" => \Carbon\Carbon::now()
                                ]);
                                $bodyEmail = [
                                    "role" => "System",
                                    "status" => "Mem-bypass ",
                                    "revisi" => "",
                                    "username" => "Talikuat",
                                    "no_dokumen" => $request->id,
                                    "kegiatan" => $request->nama_kegiatan,
                                    "lokasi" => $request->lokasi_sta,
                                    "jenis_pekerjaan" => $request->jenis_pekerjaan,
                                    "volume" => $request->volume,
                                    "note" => "Konsultan Tidak Merespon Request dan dihandle Oleh System"
                                ];
                                $mailto = DB::table('member')->where('perusahaan', '=', $request->nama_direksi)->get();
                                foreach ($mailto as $email) {
                                    if ($email->email != null) Mail::to($email->email)->send(new TestEmail($bodyEmail));
                                }
                            }
                        }
                    }
                    if (!empty($request->tgl_kirim_to_mk)) {
                        if ($permintaan_mk == $date_lock_mk) {
                            if ($request->status == 3) {
                                DB::table('request')->where('id', $request->id)->update([
                                    'mk' => 'MK Tidak Merespon File diteruskan Ke PPK',
                                    'status' => 4,
                                    'bypass_mk' => 1,
                                ]);
                                DB::table('history_request')->insert([
                                    "username" => 'System',
                                    "id_request" => $request->id,
                                    "user_id" => '1',
                                    "keterangan" => "Request Telah Telah Diteruskan Oleh System Kepada PPK",
                                    "class" => "kirim",
                                    "created_at" => \Carbon\Carbon::now()
                                ]);
                                $bodyEmail = [
                                    "role" => "System",
                                    "status" => "Mem-bypass ",
                                    "revisi" => "",
                                    "username" => "Talikuat",
                                    "no_dokumen" => $request->id,
                                    "kegiatan" => $request->nama_kegiatan,
                                    "lokasi" => $request->lokasi_sta,
                                    "jenis_pekerjaan" => $request->jenis_pekerjaan,
                                    "volume" => $request->volume,
                                    "note" => "MK Tidak Merespon Request dan dihandle Oleh System"
                                ];
                                $mailto = DB::table('member')->where('perusahaan', '=', $request->nama_direksi)->get();
                                foreach ($mailto as $email) {
                                    if ($email->email != null) Mail::to($email->email)->send(new TestEmail($bodyEmail));
                                }
                            }
                        }
                    }
                }
                info('cron job execute [bypass_permintaan]');
                $laporan_harian = DB::table('master_laporan_harian')->get();
                foreach ($laporan_harian as $laporan) {
                    $laporan_konsultan = date("d-m-Y", strtotime($laporan->tgl_kirim_to_konsultan));
                    $date_lock_konsultan = date("d-m-Y", strtotime($laporan_konsultan . '+2 days'));
                    if (!empty($laporan->tgl_kirim_to_konsultan)) {
                        if ($laporan_konsultan == $date_lock_konsultan) {
                            if ($laporan->status == 2) {
                                DB::table('master_laporan_harian')->where('no_trans', $laporan->no_trans)->update([
                                    'konsultan' => 'Konsultan Tidak Merespon, File diteruskan Ke PPK',
                                    'status' => 3,
                                    'bypass_konsultan' => 1
                                ]);
                                DB::table('history_laporan')->insert([
                                    "username" => 'System',
                                    "id_request" => $laporan->id,
                                    "user_id" => '1',
                                    "keterangan" => "Laporan Telah Telah Diteruskan Oleh System Kepada PPK",
                                    "class" => "kirim",
                                    "created_at" => \Carbon\Carbon::now()
                                ]);
                            }
                        }
                    }
                }
                info('cron job execute [bypass_laporan]');
            } catch (\Throwable $e) {
                info($e->getMessage());
            }
        })->dailyAt('00:00');
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
