<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMotherBiodatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mother_biodatas', function (Blueprint $table) {
            $table->increments('id');
             $table->unsignedInteger('id_anak');
            $table->string('nama_ibu')->nullable();
            $table->string('tahun_ibu_lahir')->nullable();
            $table->string('pendidikan_ibu')->nullable();
            $table->string('pekerjaan_ibu')->nullable();
            $table->string('penghasilan_bulanan_ibu')->nullable();
            $table->string('kebutuhan_khusus_ibu')->nullable();
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
        Schema::drop($tableNames['mother_biodatas']);
    }
}
