<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schools', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('university')->nullable();
            $table->string('degree')->nullable();
            $table->string('period')->nullable();
            $table->unsignedBigInteger('information_id')->default(1)->nullable();
            $table->foreign('information_id')->references('id')->on('informations');
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
        Schema::dropIfExists('schools');
    }
}
