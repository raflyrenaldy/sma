<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registrations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('jalur_pendaftaran')->nullable();
            $table->string('pilihan_satu')->nullable();
            $table->string('pilihan_dua')->nullable();
            $table->string('nomer_pendaftaran')->nullable();
            $table->string('nama_asal_sekolah')->nullable();
            $table->string('alamat_asal_sekolah')->nullable();
            $table->string('nomor_ujian_nasional_sebelumnya')->nullable();
            $table->string('nomo_seri_skhun_sebelumnya')->nullable();
            $table->string('nomor_seri_ijazah_sebelumnya')->nullable();
            $table->string('prestasi_yang_pernah_diraih')->nullable();
            $table->string('hobi')->nullable();
            $table->string('cita_cita')->nullable();
            $table->string('status')->nullable();
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
        Schema::drop($tableNames['registrations']);
    }
}
