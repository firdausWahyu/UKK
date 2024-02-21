<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->id('peminjamanid');
            $table->unsignedBigInteger('userid');
            $table->unsignedBigInteger('bukuid');
            $table->date('tanggalpeminjaman');
            $table->date('tanggalpengembalian');
            $table->string('statuspeminjaman', 100);

            $table->foreign('userid')->references('userid')->on('user');
            $table->foreign('bukuid')->references('bukuid')->on('buku');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peminjaman_');
    }
};
