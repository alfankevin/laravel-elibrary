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
            ['id_category' => 1, 'category' => 'Adventure'],
            ['id_category' => 2, 'category' => 'Entertainment'],
            ['id_category' => 3, 'category' => 'Fiction'],
            ['id_category' => 4, 'category' => 'Lifestyle'],
            ['id_category' => 5, 'category' => 'Nature'],
        ];

        DB::table('category')->insert($data);

    }
}
