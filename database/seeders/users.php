<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class users extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'email' => 'test1@test.com',
                'password' => Hash::make("password"),
                'name' => 'test1',
            ],
            [
                'email' => 'test2@test.com',
                'password' => Hash::make("password"),
                'name' => 'test2',
            ],
            [
                'email' => 'test3@test.com',
                'password' => Hash::make("password"),
                'name' => 'test3',
            ],
            [
                'email' => 'test4@test.com',
                'password' => Hash::make("password"),
                'name' => 'test4',
            ],
            [
                'email' => 'test5@test.com',
                'password' => Hash::make("password"),
                'name' => 'test5',
            ]
        ]);
    }
}
