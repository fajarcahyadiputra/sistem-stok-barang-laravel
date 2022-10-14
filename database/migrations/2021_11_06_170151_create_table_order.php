<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('order_barang', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('invoice', 50);
        //     $table->bigInteger('id_barang');
        //     $table->bigInteger('id_customer');
        //     $table->integer('jumlah');
        //     $table->enum('status', ['stok-tersedia', 'stok-kosong', 'dikirim', 'selesai']);
        //     $table->text('keterangan');
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('order_barang');
    }
}
