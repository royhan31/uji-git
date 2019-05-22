<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatalokersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datalokers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('id_perusahaan')->nullable();
            $table->string('bidang',50);
            $table->string('loc_penempatan',50);
            $table->longText('persyaratan');
            $table->string('jenis_kel');
            $table->date('tgl_daftar');
            $table->date('tgl_penutup');
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
        Schema::dropIfExists('datalokers');
    }
}
