<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEdukasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    protected $connection = 'pgsql';

    public function up()
    {
        Schema::create('edukasi', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('kodedukasi')->unique();
            $table->string('jenisedukasi');
            $table->string('kodeinstansi')->references('kodeinstansi')->on('instansi');
            $table->string('informasi');
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
        Schema::dropIfExists('edukasi');
    }
}
