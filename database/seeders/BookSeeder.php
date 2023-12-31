<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['title' => 'lorem ipsum 1', 'author' => 'author', 'id_category' => 1, 'description' => 'lorem ipsum dolor sit amet', 'quantity' => 14, 'file' => 'file', 'cover' => 'cover'],
            ['title' => 'lorem ipsum 2', 'author' => 'author', 'id_category' => 2, 'description' => 'lorem ipsum dolor sit amet', 'quantity' => 8, 'file' => 'file', 'cover' => 'cover'],
            ['title' => 'lorem ipsum 3', 'author' => 'author', 'id_category' => 3, 'description' => 'lorem ipsum dolor sit amet', 'quantity' => 13, 'file' => 'file', 'cover' => 'cover'],
            ['title' => 'lorem ipsum 4', 'author' => 'author', 'id_category' => 4, 'description' => 'lorem ipsum dolor sit amet', 'quantity' => 7, 'file' => 'file', 'cover' => 'cover'],
            ['title' => 'lorem ipsum 5', 'author' => 'author', 'id_category' => 5, 'description' => 'lorem ipsum dolor sit amet', 'quantity' => 12, 'file' => 'file', 'cover' => 'cover'],
            ['title' => 'lorem ipsum 6', 'author' => 'author', 'id_category' => 1, 'description' => 'lorem ipsum dolor sit amet', 'quantity' => 9, 'file' => 'file', 'cover' => 'cover'],
            ['title' => 'lorem ipsum 7', 'author' => 'author', 'id_category' => 2, 'description' => 'lorem ipsum dolor sit amet', 'quantity' => 10, 'file' => 'file', 'cover' => 'cover'],
        ];

        DB::table('book')->insert($data);
    }
}
