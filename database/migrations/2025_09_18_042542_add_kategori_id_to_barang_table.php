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
        // Schema::table('barang', function (Blueprint $table) {
        //  $table->unsignedBigInteger('kategori_id')->nullable()->after('nama_barang');
        // });

        // // isi default kategori_id = 1 untuk semua barang lama
        // DB::table('barang')->update(['kategori_id' => 1]);

        // // Schema::table('barang', function (Blueprint $table) {
        // //     $table->foreign('kategori_id')->references('id')->on('kategori')->onDelete('cascade');
        // //     $table->dropColumn('kategori'); // hapus kolom lama
        // // });
        // Schema::table('barang', function (Blueprint $table) {
        //     $table->unsignedBigInteger('kategori_id')->after('nama_barang');
        //     $table->foreign('kategori_id')->references('id')->on('kategori')->onDelete('cascade');
        //     $table->dropColumn('kategori'); // hapus kolom lama
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('barang', function (Blueprint $table) {
            //
        });
    }
};
