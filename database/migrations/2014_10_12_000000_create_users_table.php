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
            $table->boolean('status')->default(false);
            $table->boolean('job')->default(false);
            $table->boolean('deleted_at')->default(false);
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
