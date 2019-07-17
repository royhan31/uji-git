<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('avatar')->default('avatar/default.jpg')->nullable();
            $table->string('api_token')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->unique()->nullable();
            $table->string('nik',16)->unique()->nullable();
            $table->string('ktp')->nullable();
            $table->boolean('status')->default(1);
            $table->boolean('job')->default(0);
            $table->boolean('deleted_at')->default(0);
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
        Schema::dropIfExists('users');
    }
}
