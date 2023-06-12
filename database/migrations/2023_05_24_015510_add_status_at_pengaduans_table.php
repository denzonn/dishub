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
        Schema::table('pengaduans', function (Blueprint $table) {
            $table->string('photo_pengaduan')->after('isi_pengaduan');
            $table->string('photo_ktp')->after('photo_pengaduan');
            $table->string('status_pengaduan')->default('belum diproses')->after('photo_pengaduan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pengaduans', function (Blueprint $table) {
            $table->dropColumn('photo_pengaduan');
            $table->dropColumn('photo_ktp');
            $table->dropColumn('status_pengaduan');
        });
    }
};
