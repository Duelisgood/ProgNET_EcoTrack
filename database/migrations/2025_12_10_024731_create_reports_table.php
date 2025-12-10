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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            
            // 1. Menyimpan ID User yang melapor (Relasi ke tabel Users)
            // 'cascade' artinya jika User dihapus, laporannya juga terhapus
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            
            // 2. Data Laporan
            $table->string('location');   // Lokasi
            $table->text('description');  // Keterangan/Deskripsi
            $table->string('image_path'); // Nama file foto yang diupload
            
            // 3. Status Laporan (Penting untuk Admin)
            // pending   = Baru masuk
            // process   = Sedang dikerjakan/dibersihkan
            // completed = Selesai
            $table->enum('status', ['pending', 'process', 'completed'])->default('pending');
            
            $table->timestamps(); // Tanggal dibuat & diupdate
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
