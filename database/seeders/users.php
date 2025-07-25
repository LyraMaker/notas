<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class users extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'username' => 'user1@gmail.com',
                'password' => bcrypt('abc123456')
            ]
        ]);
        DB::table('users')->insert([
            [
                'username' => 'user2@gmail.com',
                'password' => bcrypt('abc123456')
            ]
        ]);
        DB::table('users')->insert([
            [
                'username' => 'user3@gmail.com',
                'password' => bcrypt('abc123456')
            ]
        ]);
    }
}
// 100% caveira ?
// entao senta o dedo nessa porra