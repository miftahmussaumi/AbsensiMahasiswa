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
            $table->bigInteger('pertemuan_id')->unsigned();
            $table->string('jam_masuk',20);
            $table->string('jam_keluar',20);
            $table->string('durasi',20);
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
