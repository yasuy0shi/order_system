<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemCategorySeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('item_categories')->truncate();
        DB::table('item_categories')->insert([
            [
                'id' => 1,
                'name' => '軽食',
            ],
            [
                'id' => 2,
                'name' => 'おつまみ',
            ],
            [
                'id' => 3,
                'name' => '麺類',
            ],
            [
                'id' => 4,
                'name' => 'ごはん類',
            ],
            [
                'id' => 5,
                'name' => '肉類',
            ],
            [
                'id' => 6,
                'name' => 'アルコール',
            ],
            [
                'id' => 7,
                'name' => 'ソフトドリンク',
            ],
            [
                'id' => 8,
                'name' => 'レンタル',
            ],
        ]);
    }
}
