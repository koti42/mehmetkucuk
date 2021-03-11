<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;


class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blogs')->insert(
            [
                [
                    'blog_title' => 'Deneme2',
                    'blog_slug' => 'description2',
                    'blog_file' => 'Laravel ECMS Learning',
                    'blog_must' => 0,
                    'blog_content' => 0,
                    'blog_status' => '1'
                ],
                [
                    'blog_title' => 'Deneme2',
                    'blog_slug' => 'description2',
                    'blog_file' => 'Laravel ECMS Learning',
                    'blog_must' =>00,
                    'blog_content' => 0,
                    'blog_status' => '1'
                ],
                [
                    'blog_title' => 'Deneme2',
                    'blog_slug' => 'description2',
                    'blog_file' => 'Laravel ECMS Learning',
                    'blog_must' =>00,
                    'blog_content' => 0,
                    'blog_status' => '1'
                ],
                [
                    'blog_title' => 'Deneme2',
                    'blog_slug' => 'description2',
                    'blog_file' => 'Laravel ECMS Learning',
                    'blog_must' =>00,
                    'blog_content' => 0,
                    'blog_status' => '1'
                ],
                [
                    'blog_title' => 'Deneme2',
                    'blog_slug' => 'description2',
                    'blog_file' => 'Laravel ECMS Learning',
                    'blog_must' =>00,
                    'blog_content' => 0,
                    'blog_status' => '1'
                ],
                [
                    'blog_title' => 'Deneme2',
                    'blog_slug' => 'description2',
                    'blog_file' => 'Laravel ECMS Learning',
                    'blog_must' =>00,
                    'blog_content' => 0,
                    'blog_status' => '1'
                ],
                [
                    'blog_title' => 'Deneme2',
                    'blog_slug' => 'description2',
                    'blog_file' => 'Laravel ECMS Learning',
                    'blog_must' =>00,
                    'blog_content' => 0,
                    'blog_status' => '1'
                ],
                [
                    'blog_title' => 'Deneme2',
                    'blog_slug' => 'description2',
                    'blog_file' => 'Laravel ECMS Learning',
                    'blog_must' => 00,
                    'blog_content' => 0,
                    'blog_status' => '1'
                ],
                [
                    'blog_title' => 'Deneme2',
                    'blog_slug' => 'description2',
                    'blog_file' => 'Laravel ECMS Learning',
                    'blog_must' => 0,
                    'blog_content' => 0,
                    'blog_status' => '1'
                ],
                [
                    'blog_title' => 'Deneme',
                    'blog_slug' => 'description2',
                    'blog_file' => 'Laravel ECMS Learning',
                    'blog_must' => 0,
                    'blog_content' => 0,
                    'blog_status' => '1'
                ],
                [
                    'blog_title' => 'Deneme',
                    'blog_slug' => 'description2',
                    'blog_file' => 'Laravel ECMS Learning',
                    'blog_must' => 0,
                    'blog_content' => 0,
                    'blog_status' => '1'
                ]
            ]
        );
    }
}
