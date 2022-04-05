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
        Schema::create('spjs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rencana_kerja_id');
            $table->unsignedBigInteger('id_user');
            $table->string('bukti_pendukung')->nullable(true);
            $table->string('link_bukti')->nullable(true);
            $table->string('status')->nullable(true);
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
        Schema::dropIfExists('spjs');
    }
};
