<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratMasuk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_masuk', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_surat_masuk');
            $table->string('pengirim_masuk');
            $table->string('agenda_masuk');
            $table->string('perihal_masuk');
            $table->date('tgl_surat_masuk');
            $table->string('disposisi');
            $table->string('perintah');
            $table->string('catatan_KSOP');
            $table->string('catatan');
            $table->string('dokumen_masuk');
            $table->string('status');
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
        Schema::dropIfExists('surat_masuk');
    }
}
