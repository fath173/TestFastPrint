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
        Schema::create('produk', function (Blueprint $table) {
            $table->increments('id_produk');
            $table->string('nama_produk');
            $table->integer('harga');
            $table->unsignedInteger('kategori_id');
            $table->unsignedInteger('status_id');
            $table->foreign('kategori_id')->references('id_kategori')->on('kategori')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('status_id')->references('id_status')->on('status')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produk');
    }
};
