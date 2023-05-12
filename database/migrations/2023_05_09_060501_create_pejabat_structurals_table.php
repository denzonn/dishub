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
        Schema::create('pejabat_structurals', function (Blueprint $table) {
            $table->id();
            $table->string('photo_pejabat');
            $table->string('nama_pejabat');
            $table->integer('kode_jabatan');
            $table->string('jabatan_pejabat');
            $table->integer('nip_pejabat');
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
        Schema::dropIfExists('pejabat_structurals');
    }
};
