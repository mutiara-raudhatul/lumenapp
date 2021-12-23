<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstansiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    protected $connection = 'pgsql';

    public function up()
    {
        Schema::create('instansi', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('kodeinstansi')->unique();
            $table->string('namainstansi');
            $table->string('nohp');
            $table->string('email');
            $table->string('kategori');
            $table->string('lokasi');
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
        Schema::dropIfExists('instansi');
    }
}
