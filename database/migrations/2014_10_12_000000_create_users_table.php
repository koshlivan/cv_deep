<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->string('name')->nullable();
            $table->string('email')->unique();
            $table->string('login')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('photo')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('linked')->nullable();
            $table->string('degree')->nullable();
            $table->string('university')->nullable();
            $table->string('period')->nullable();
            $table->string('skill')->nullable();
            $table->string('vacancy')->nullable();
            $table->text('profile')->nullable();
            $table->text('experience')->nullable();
            $table->date('updated_at')->nullable();
            $table->date('created_at')->nullable();
            $table->string('rememberToken')->nullable();
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
