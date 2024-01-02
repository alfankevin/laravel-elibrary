<?php

namespace Database\Seeders;

use App\Models\UserBook;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserBookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserBook::create([
            'id' => 1,
            'id_book' => 17,
            'id_user' => 1,
        ]);
    }
}
