<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rencana_kerjas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('nama_rencana');
            $table->text('lokasi');
            $table->timestamp('waktu_mulai');
            $table->timestamp('waktu_selesai');
            $table->unsignedBigInteger('penanggung_jawab');
            $table->unsignedBigInteger('creator_id');
            $table->timestamp('tanggal_verifikasi');
            $table->string('verificated_by');
            $table->string('status_verifikasi');
            $table->text('keterangan')->nullable(true);
            $table->text('jumlah_peserta')->nullable(true);
            $table->text('rundown_kegiatan')->nullable(true);
            $table->string('status_spj')->nullable(true);
            $table->string('keterangan_tolak_spj')->nullable(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rencana_kerjas');
    }
};
