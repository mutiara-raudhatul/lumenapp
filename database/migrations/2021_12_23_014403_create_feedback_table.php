<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeedbackTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feedback', function (Blueprint $table) {
            $table->id();
            $table->string('kodefeedback')->unique();
            $table->string('nik')->references('nik')->on('user');
            $table->string('kodeinstansi')->references('kodeinstansi')->on('instansi');
            $table->string('kodeedukasi')->references('kodeedukasi')->on('edukasi')->nullable($value=false);
            $table->string('feedback');
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
        Schema::dropIfExists('feedback');
    }
}
