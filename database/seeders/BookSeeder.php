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
            ['title' => 'Simple Way Of Piece Life', 'author' => 'Armor Ramsey', 'id_category' => 3, 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu feugiat amet, libero ipsum enim pharetra hac. Urna commodo, lacus ut magna velit eleifend.', 'quantity' => 14, 'file' => '2141720084.pdf', 'cover' => 'tab-item8.jpg', 'hero' => 0, 'feat' => 0],
            ['title' => 'Life Among The Pirates', 'author' => 'David Woodard', 'id_category' => 1, 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu feugiat amet, libero ipsum enim pharetra hac. Urna commodo, lacus ut magna velit eleifend.', 'quantity' => 8, 'file' => '2141720084.pdf', 'cover' => 'tab-item7.jpg', 'hero' => 0, 'feat' => 0],
            ['title' => 'Great Travel At Desert', 'author' => 'Sanchit Howdy', 'id_category' => 5, 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu feugiat amet, libero ipsum enim pharetra hac. Urna commodo, lacus ut magna velit eleifend.', 'quantity' => 13, 'file' => '2141720084.pdf', 'cover' => 'tab-item6.jpg', 'hero' => 0, 'feat' => 0],
            ['title' => 'Peaceful Enlightment', 'author' => 'Marmik Lama', 'id_category' => 4, 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu feugiat amet, libero ipsum enim pharetra hac. Urna commodo, lacus ut magna velit eleifend.', 'quantity' => 7, 'file' => '2141720084.pdf', 'cover' => 'tab-item5.jpg', 'hero' => 0, 'feat' => 0],
            ['title' => 'Just Felt From Outside', 'author' => 'Nicole Wilson', 'id_category' => 5, 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu feugiat amet, libero ipsum enim pharetra hac. Urna commodo, lacus ut magna velit eleifend.', 'quantity' => 12, 'file' => '2141720084.pdf', 'cover' => 'tab-item4.jpg', 'hero' => 0, 'feat' => 0],
            ['title' => 'Tips Of Simple Lifestyle', 'author' => 'Bratt Smith', 'id_category' => 4, 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu feugiat amet, libero ipsum enim pharetra hac. Urna commodo, lacus ut magna velit eleifend.', 'quantity' => 9, 'file' => '2141720084.pdf', 'cover' => 'tab-item3.jpg', 'hero' => 0, 'feat' => 0],
            ['title' => 'Once Upon A Time', 'author' => 'Klien Marry', 'id_category' => 1, 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu feugiat amet, libero ipsum enim pharetra hac. Urna commodo, lacus ut magna velit eleifend.', 'quantity' => 10, 'file' => '2141720084.pdf', 'cover' => 'tab-item2.jpg', 'hero' => 0, 'feat' => 0],
            ['title' => 'Portrait Photography', 'author' => 'Adam Silber', 'id_category' => 2, 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu feugiat amet, libero ipsum enim pharetra hac. Urna commodo, lacus ut magna velit eleifend.', 'quantity' => 14, 'file' => '2141720084.pdf', 'cover' => 'tab-item1.jpg', 'hero' => 0, 'feat' => 0],
            ['title' => 'Musical', 'author' => 'Karim Achard', 'id_category' => 2, 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu feugiat amet, libero ipsum enim pharetra hac. Urna commodo, lacus ut magna velit eleifend.', 'quantity' => 8, 'file' => '2141720084.pdf', 'cover' => 'product-item8.jpg', 'hero' => 0, 'feat' => 0],
            ['title' => 'Fashion System', 'author' => 'Kevin Spear', 'id_category' => 2, 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu feugiat amet, libero ipsum enim pharetra hac. Urna commodo, lacus ut magna velit eleifend.', 'quantity' => 13, 'file' => '2141720084.pdf', 'cover' => 'product-item7.jpg', 'hero' => 0, 'feat' => 0],
            ['title' => 'Life Of Seacrits', 'author' => 'Galista Marie', 'id_category' => 3, 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu feugiat amet, libero ipsum enim pharetra hac. Urna commodo, lacus ut magna velit eleifend.', 'quantity' => 7, 'file' => '2141720084.pdf', 'cover' => 'product-item6.jpg', 'hero' => 0, 'feat' => 0],
            ['title' => 'Way Of Happiness', 'author' => 'Ananda Kumar', 'id_category' => 4, 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu feugiat amet, libero ipsum enim pharetra hac. Urna commodo, lacus ut magna velit eleifend.', 'quantity' => 12, 'file' => '2141720084.pdf', 'cover' => 'product-item5.jpg', 'hero' => 0, 'feat' => 0],
            ['title' => 'Once Upon A Time', 'author' => 'Klien Marry', 'id_category' => 3, 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu feugiat amet, libero ipsum enim pharetra hac. Urna commodo, lacus ut magna velit eleifend.', 'quantity' => 9, 'file' => '2141720084.pdf', 'cover' => 'product-item4.jpg', 'hero' => 0, 'feat' => 1],
            ['title' => 'The Lady Beauty Scarlett', 'author' => 'Arthur Doyle', 'id_category' => 2, 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu feugiat amet, libero ipsum enim pharetra hac. Urna commodo, lacus ut magna velit eleifend.', 'quantity' => 10, 'file' => '2141720084.pdf', 'cover' => 'product-item3.jpg', 'hero' => 0, 'feat' => 1],
            ['title' => 'Great Travel At Desert', 'author' => 'Sanchit Howdy', 'id_category' => 1, 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu feugiat amet, libero ipsum enim pharetra hac. Urna commodo, lacus ut magna velit eleifend.', 'quantity' => 12, 'file' => '2141720084.pdf', 'cover' => 'product-item2.jpg', 'hero' => 0, 'feat' => 1],
            ['title' => 'Simple Way Of Piece Life', 'author' => 'Armor Ramsey', 'id_category' => 4, 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu feugiat amet, libero ipsum enim pharetra hac. Urna commodo, lacus ut magna velit eleifend.', 'quantity' => 9, 'file' => '2141720084.pdf', 'cover' => 'product-item1.jpg', 'hero' => 0, 'feat' => 1],
            ['title' => 'Birds Gonna Be Happy', 'author' => 'Timbur Hood', 'id_category' => 5, 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu feugiat amet, libero ipsum enim pharetra hac. Urna commodo, lacus ut magna velit eleifend.', 'quantity' => 15, 'file' => '2141720084.pdf', 'cover' => 'main-banner2.jpg', 'hero' => 1, 'feat' => 0],
            ['title' => 'Life Of The Wild', 'author' => 'Sanchit Howdy', 'id_category' => 5, 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu feugiat amet, libero ipsum enim pharetra hac. Urna commodo, lacus ut magna velit eleifend.', 'quantity' => 10, 'file' => '2141720084.pdf', 'cover' => 'main-banner1.jpg', 'hero' => 1, 'feat' => 0],
        ];

        DB::table('book')->insert($data);
    }
}
