<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('siswas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_siswa'); // Nama Siswa
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']); // Jenis Kelamin
            $table->string('nomor_telepon_siswa'); // Nomor Handphone Siswa
            $table->string('nomor_telepon_orang_tua'); // Nomor Handphone Orang Tua
            $table->string('kelas'); // Kelas
            $table->string('asal_sekolah'); // Asal Sekolah
            $table->string('pilihan_hari'); // Pilihan Hari
            $table->string('pilihan_waktu'); // Pilihan Waktu
            $table->string('mata_pelajaran'); // Mata Pelajaran
            $table->string('status_pembayaran'); // Status Pembayaran
            $table->unsignedBigInteger('pengajar_id')->nullable();
            $table->foreign('pengajar_id')->references('id')->on('pengajars')->onDelete('cascade'); // foreign key category
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswas');
    }
};
