<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('register_id');
            $table->string('ijazah')->nullable();
            $table->string('skhun')->nullable();
            $table->string('kartu_keluarga')->nullable();
            $table->string('ktp_ortu')->nullable();
            $table->string('surat_kelakuan_baik')->nullable();
            $table->timestamps();
            $table->foreign('register_id')
                ->references('id')
                ->on('registrations')
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
        Schema::dropIfExists('files');
    }
}
