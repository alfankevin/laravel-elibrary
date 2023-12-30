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
            ['id_category' => 1, 'category' => 'Business'],
            ['id_category' => 2, 'category' => 'Technology'],
            ['id_category' => 3, 'category' => 'Technology'],
            ['id_category' => 4, 'category' => 'Technology'],
            ['id_category' => 5, 'category' => 'Technology'],
        ];

        DB::table('category')->insert($data);

    }
}
