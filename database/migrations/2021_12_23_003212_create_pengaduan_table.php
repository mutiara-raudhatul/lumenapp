<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengaduanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    protected $connection = 'pgsql';

    public function up()
    {
        Schema::create('pengaduan', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('nopengaduan')->unique();
            $table->string('nik')->references('nik')->on('user');
            $table->string('tglkejadian');
            $table->string('jeniskejadian');
            $table->string('lokasikejadian');
            $table->string('fotokejadian');
            $table->string('detailkejadian');
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
        Schema::dropIfExists('pengaduan');
    }
}
