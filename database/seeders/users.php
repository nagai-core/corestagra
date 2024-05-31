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
                'url' => 'images/test.jpg'
            ],
            [
                'email' => 'test2@test.com',
                'password' => Hash::make("password"),
                'name' => 'test2',
                'url' => 'images/test.jpg'
            ],
            [
                'email' => 'test3@test.com',
                'password' => Hash::make("password"),
                'name' => 'test3',
                'url' => 'images/test.jpg'
            ],
            [
                'email' => 'test4@test.com',
                'password' => Hash::make("password"),
                'name' => 'test4',
                'url' => 'images/test.jpg'
            ],
            [
                'email' => 'test5@test.com',
                'password' => Hash::make("password"),
                'name' => 'test5',
                'url' => 'images/test.jpg'
            ]
        ]);
    }
}
