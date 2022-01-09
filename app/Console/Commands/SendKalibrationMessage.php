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
        foreach ($tanggalKalibrasi as $tk) {
            $dbDate = Carbon::parse($tk->tanggal);
            $tk->notify($dbDate->addYear());
        }
    }
}
