<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFatherBiodatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('father_biodatas', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_anak');
            $table->string('nama_ayah')->nullable();
            $table->string('tahun_ayah_lahir')->nullable();
            $table->string('pendidikan_ayah')->nullable();
            $table->string('pekerjaan_ayah')->nullable();
            $table->string('penghasilan_bulanan_ayah')->nullable();
            $table->string('kebutuhan_khusus_ayah')->nullable();
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
        Schema::drop($tableNames['father_biodatas']);
    }
}
