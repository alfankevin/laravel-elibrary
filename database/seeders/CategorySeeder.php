<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['id' => 1, 'category' => 'Adventure'],
            ['id' => 2, 'category' => 'Entertainment'],
            ['id' => 3, 'category' => 'Fiction'],
            ['id' => 4, 'category' => 'Lifestyle'],
            ['id' => 5, 'category' => 'Nature'],
        ];

        DB::table('category')->insert($data);

    }
}
