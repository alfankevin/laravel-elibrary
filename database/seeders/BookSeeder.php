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
            ['title' => 'Simple Way Of Piece Life', 'author' => 'Armor Ramsey', 'id_category' => 1, 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu feugiat amet, libero ipsum enim pharetra hac. Urna commodo, lacus ut magna velit eleifend.', 'quantity' => 14, 'file' => 'file', 'cover' => '/assets/img/main/tab-item8.jpg'],
            ['title' => 'Life Among The Pirates', 'author' => 'David Woodard', 'id_category' => 2, 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu feugiat amet, libero ipsum enim pharetra hac. Urna commodo, lacus ut magna velit eleifend.', 'quantity' => 8, 'file' => 'file', 'cover' => '/assets/img/main/tab-item7.jpg'],
            ['title' => 'Great Travel At Desert', 'author' => 'Sanchit Howdy', 'id_category' => 3, 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu feugiat amet, libero ipsum enim pharetra hac. Urna commodo, lacus ut magna velit eleifend.', 'quantity' => 13, 'file' => 'file', 'cover' => '/assets/img/main/tab-item6.jpg'],
            ['title' => 'Peaceful Enlightment', 'author' => 'Marmik Lama', 'id_category' => 4, 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu feugiat amet, libero ipsum enim pharetra hac. Urna commodo, lacus ut magna velit eleifend.', 'quantity' => 7, 'file' => 'file', 'cover' => '/assets/img/main/tab-item5.jpg'],
            ['title' => 'Just Felt From Outside', 'author' => 'Nicole Wilson', 'id_category' => 5, 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu feugiat amet, libero ipsum enim pharetra hac. Urna commodo, lacus ut magna velit eleifend.', 'quantity' => 12, 'file' => 'file', 'cover' => '/assets/img/main/tab-item4.jpg'],
            ['title' => 'Tips Of Simple Lifestyle', 'author' => 'Bratt Smith', 'id_category' => 1, 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu feugiat amet, libero ipsum enim pharetra hac. Urna commodo, lacus ut magna velit eleifend.', 'quantity' => 9, 'file' => 'file', 'cover' => '/assets/img/main/tab-item3.jpg'],
            ['title' => 'Once Upon A Time', 'author' => 'Klien Marry', 'id_category' => 2, 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu feugiat amet, libero ipsum enim pharetra hac. Urna commodo, lacus ut magna velit eleifend.', 'quantity' => 10, 'file' => 'file', 'cover' => '/assets/img/main/tab-item2.jpg'],
            ['title' => 'Portrait Photography', 'author' => 'Adam Silber', 'id_category' => 1, 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu feugiat amet, libero ipsum enim pharetra hac. Urna commodo, lacus ut magna velit eleifend.', 'quantity' => 14, 'file' => 'file', 'cover' => '/assets/img/main/tab-item1.jpg'],
            ['title' => 'Musical', 'author' => 'Karim Achard', 'id_category' => 2, 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu feugiat amet, libero ipsum enim pharetra hac. Urna commodo, lacus ut magna velit eleifend.', 'quantity' => 8, 'file' => 'file', 'cover' => '/assets/img/main/product-item8.jpg'],
            ['title' => 'Fashion System', 'author' => 'Kevin Spear', 'id_category' => 3, 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu feugiat amet, libero ipsum enim pharetra hac. Urna commodo, lacus ut magna velit eleifend.', 'quantity' => 13, 'file' => 'file', 'cover' => '/assets/img/main/product-item7.jpg'],
            ['title' => 'Life Of Seacrits', 'author' => 'Galista Marie', 'id_category' => 4, 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu feugiat amet, libero ipsum enim pharetra hac. Urna commodo, lacus ut magna velit eleifend.', 'quantity' => 7, 'file' => 'file', 'cover' => '/assets/img/main/product-item6.jpg'],
            ['title' => 'Way Of Happiness', 'author' => 'Ananda Kumar', 'id_category' => 5, 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu feugiat amet, libero ipsum enim pharetra hac. Urna commodo, lacus ut magna velit eleifend.', 'quantity' => 12, 'file' => 'file', 'cover' => '/assets/img/main/product-item5.jpg'],
            ['title' => 'Once Upon A Time', 'author' => 'Klien Marry', 'id_category' => 1, 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu feugiat amet, libero ipsum enim pharetra hac. Urna commodo, lacus ut magna velit eleifend.', 'quantity' => 9, 'file' => 'file', 'cover' => '/assets/img/main/product-item4.jpg'],
            ['title' => 'The Lady Beauty Scarlett', 'author' => 'Arthur Doyle', 'id_category' => 2, 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu feugiat amet, libero ipsum enim pharetra hac. Urna commodo, lacus ut magna velit eleifend.', 'quantity' => 10, 'file' => 'file', 'cover' => '/assets/img/main/product-item3.jpg'],
            ['title' => 'Great Travel At Desert', 'author' => 'Sanchit Howdy', 'id_category' => 5, 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu feugiat amet, libero ipsum enim pharetra hac. Urna commodo, lacus ut magna velit eleifend.', 'quantity' => 12, 'file' => 'file', 'cover' => '/assets/img/main/product-item2.jpg'],
            ['title' => 'Simple Way Of Piece Life', 'author' => 'Armor Ramsey', 'id_category' => 1, 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu feugiat amet, libero ipsum enim pharetra hac. Urna commodo, lacus ut magna velit eleifend.', 'quantity' => 9, 'file' => 'file', 'cover' => '/assets/img/main/product-item1.jpg'],
            ['title' => 'Birds Gonna Be Happy', 'author' => 'Timbur Hood', 'id_category' => 2, 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu feugiat amet, libero ipsum enim pharetra hac. Urna commodo, lacus ut magna velit eleifend.', 'quantity' => 15, 'file' => 'file', 'cover' => '/assets/img/main/main-banner2.jpg'],
            ['title' => 'Life Of The Wild', 'author' => 'Sanchit Howdy', 'id_category' => 2, 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu feugiat amet, libero ipsum enim pharetra hac. Urna commodo, lacus ut magna velit eleifend.', 'quantity' => 10, 'file' => 'file', 'cover' => '/assets/img/main/main-banner1.jpg'],
        ];

        DB::table('book')->insert($data);
    }
}
