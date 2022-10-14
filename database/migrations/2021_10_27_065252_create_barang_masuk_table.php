<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangMasukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang_masuk', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_barang');
            $table->bigInteger('id_supplier');
            $table->enum('satuan', ['pcs', 'lb', 'btg']);
            $table->integer('jumlah');
            $table->string('no_surat_jalan', 10);
            $table->integer('jumlah_sebelumnya');
            $table->integer('total_stok');
            $table->string('penerima', 100);
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
        Schema::dropIfExists('barang_masuk');
    }
}
