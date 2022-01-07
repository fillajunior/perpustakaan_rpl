<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengembaliansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengembalians', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('id_pengembalian');
            $table->string('nama');
            $table->string('judul_buku');
            $table->string('kode_buku');
            $table->string('isbn');
            $table->date('tanggal_peminjaman');
            $table->date('tanggal_pengembalian');
            $table->string('keterlambatan');
            $table->string('jumlah_buku');
            $table->string('alamat');
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
        Schema::dropIfExists('pengembalians');
    }
}
