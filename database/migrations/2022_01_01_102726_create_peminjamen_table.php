<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeminjamenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peminjamen', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('id_peminjaman');
            $table->string('nama');
            $table->string('judul_buku');
            $table->string('kode_buku');
            $table->string('isbn');
            $table->string('no_panggil')->nullable();
            $table->date('tanggal_peminjaman')->nullable();
            $table->date('tanggal_pengembalian')->nullable();
            $table->string('jenis_peminjaman')->nullable();
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
        Schema::dropIfExists('peminjamen');
    }
}
