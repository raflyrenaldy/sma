<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWaliBiodatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wali_biodatas', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_anak')->nullable();
            $table->string('nama_wali')->nullable();
            $table->string('tahun_wali_lahir')->nullable();
            $table->string('pendidikan_wali')->nullable();
            $table->string('pekerjaan_wali')->nullable();
            $table->string('penghasilan_bulanan_wali')->nullable();
            $table->string('kebutuhan_khusus_wali')->nullable();
            $table->timestamps();
            $table->foreign('id_anak')
                ->references('id')
                ->on('biodatas')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop($tableNames['wali_biodatas']);
    }
}
