<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBiodatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biodatas', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('register_id');
            $table->string('nama_lengkap')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->string('nisn')->nullable();
            $table->string('nik')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->string('tanggal_lahir')->nullable();
            $table->string('agama')->nullable();
            $table->string('kebutuhan_khusus')->nullable();
            $table->string('alamat')->nullable();
            $table->char('provinces',2)->index();
            $table->char('regencies',4)->index();
            $table->char('districts',7)->index();
            $table->char('villages',10)->index();
            $table->integer('kode_pos')->nullable();
            $table->string('tempat_tinggal')->nullable();
            $table->string('transportasi')->nullable();
            $table->string('nomor_handphone')->nullable();
            $table->string('nomor_telepon')->nullable();
            $table->string('email')->nullable();
            $table->string('nomor_kartu_kesehatan_kis')->nullable();
            $table->string('nomor_kartu_indonesia_pintar')->nullable();
            $table->string('nomor_kartu_pra_sejahtera')->nullable();
            $table->string('nomor_kartu_keluarga_sejahtera')->nullable();
            $table->string('sktm')->nullable();
            $table->string('kewarganegaraan')->nullable();
            $table->string('foto')->nullable(); 
            $table->integer('tinggi_badan')->nullable();
            $table->integer('berat_badan')->nullable();
            $table->integer('jumlah_saudara_kandung')->nullable();
            $table->integer('jarak_tempat_tinggal_ke_sekolah')->nullable();
            $table->timestamps();

            $table->foreign('provinces')
                ->references('id')
                ->on('provinces')
                ->onDelete('cascade');
            $table->foreign('regencies')
                ->references('id')
                ->on('regencies')
                ->onDelete('cascade');
            $table->foreign('districts')
                ->references('id')
                ->on('districts')
                ->onDelete('cascade');
            $table->foreign('villages')
                ->references('id')
                ->on('villages')
                ->onDelete('cascade');
           
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
        Schema::drop($tableNames['biodatas']);
    }
}
