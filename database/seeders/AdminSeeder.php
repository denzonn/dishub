<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $password = bcrypt('admin@admin');

        DB::table('users')->insert([
            'name' => 'administrator',
            'email' => 'admindishub@admin.com',
            'password' => $password,
            'roles' => 'ADMIN',
        ]);
    }
}
