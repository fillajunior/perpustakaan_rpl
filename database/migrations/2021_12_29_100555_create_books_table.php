<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('kode_buku');
            $table->string('isbn');
            $table->string('judul_buku');
            $table->string('pengarang');
            $table->string('penerbit');
            $table->integer('jumlah_buku');
            $table->string('jenis_buku');
            $table->string('tahun_penerbit');
            $table->string('letak_buku');
            $table->string('asal_buku');
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
        Schema::dropIfExists('books');
    }
}
