<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('comments')->insert(
        //     [
        //         [
        //             'comment' => '1コメ',
        //             'user_id' => 1,
        //             'images_id' => 1,
        //         ],
        //         [
        //             'comment' => '2コメ',
        //             'user_id' => 2,
        //             'images_id' => 2,
        //         ],
        //         [
        //             'comment' => '3コメ',
        //             'user_id' => 1,
        //             'images_id' => 1,
        //         ],
        //     ]
        // );
    }
}
