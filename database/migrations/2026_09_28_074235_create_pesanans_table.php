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
        Schema::create('pesanans', function (Blueprint $table) {
            $table->id('idpesanan');
            $table->foreignId('idpelanggan')->constrained('pelanggans', 'idpelanggan');
            $table->foreignId('idmeja')->constrained('mejas', 'idmeja');
            $table->foreignId('iduser')->constrained('users', 'iduser');
            $table->dateTime('tanggal');
            $table->enum('status',['dipesan','lunas'])->default('dipesan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanans');
    }
};
