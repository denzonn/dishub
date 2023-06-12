<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BidangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bidangs')->insert(
            [
                [
                    'nama_bidang' => 'Program Lalu Lintas',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'nama_bidang' => 'Program Pelayaran',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'nama_bidang' => 'Program Perkeretaapian',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'nama_bidang' => 'Program Penunjang Urusan Pemerintah Umum',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]
        );
    }
}
