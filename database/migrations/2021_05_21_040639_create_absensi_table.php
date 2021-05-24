<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbsensiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absensi', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('krs_id')->unsigned();
            $table->bigInteger ('pertemuan_id')->unsigned();
            $table->time ('jam_masuk');
            $table->time ('jam_keluar');
            $table->integer ('durasi');
            $table->timestamps();
        });

        Schema::table('absensi', function (Blueprint $table) {
            $table->foreign('krs_id')->references('id')->on('krs')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('pertemuan_id')->references('id')->on('pertemuan')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('absensi');
    }
}
