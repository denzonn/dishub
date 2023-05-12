<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class VisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $photo = asset('frontend/img/gubernur.png');

        DB::table('visi_misis')->insert([
            'photo' => $photo,
            'visi' => 'Mewujudkan masyarakat yang sejahtera, adil, makmur, dan berkeadilan melalui pelayanan yang prima, transparan, akuntabel, dan berkeadilan.',
        ]);
    }
}
