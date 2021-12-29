<?php

namespace App\Console\Commands;

use App\Models\TempatWaktuKalibrasi;
use Carbon\Carbon;
use Illuminate\Console\Command;

class SendKalibrationMessage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notification:kalibration';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Mengirimkan Pesan Untuk Melakukan kalibrasi Data Setiap Taun';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $tanggalKalibrasi = TempatWaktuKalibrasi::whereNotNull('tanggal')->get();
        $waktuSekarang = Carbon::now();
        foreach ($tanggalKalibrasi as $tk) {
            $dbDate = Carbon::parse($tk->tanggal);
            if ($waktuSekarang == $dbDate->addYear()) {
                $tk->notify($dbDate->addYear());
            }
        }
    }
}
