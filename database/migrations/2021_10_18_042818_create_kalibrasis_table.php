<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKalibrasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kalibrasi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('alat_id')->constrained('alat');
            $table->foreignId('perusahaan_id')->constrained('perusahaan');
            $table->foreignId('tempat_waktu_id')->constrained('tempat_waktu_kalibrasi');
            $table->string('scan',255);
            $table->string('tipe',255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kalibrasi');
    }
}
