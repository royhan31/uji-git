<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDaftarpelamarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::defaultStringLength(191);
        Schema::create('daftarpelamars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama',30);
            $table->string('tempat_lahir',10);
            $table->date('tgl_lahir');
            $table->string('alamat',100);
            $table->string('umur',30);
            $table->string('email',30);
            $table->string('no_hp',30);
            $table->longText('hasil');
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
        Schema::dropIfExists('daftarpelamars');
    }
}
