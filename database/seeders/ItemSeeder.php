<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('items')->truncate();
        DB::table('items')->insert([
            [
                'id' => 1,
                'item_category_id' => 1,
                'name' => 'ジンギスカン1人前',
                'description' => null,
                'price' => 2000,
            ],
            [
                'id' => 2,
                'item_category_id' => 2,
                'name' => 'アメリカンドッグ',
                'description' => null,
                'price' => 300,
            ],
            [
                'id' => 3,
                'item_category_id' => 2,
                'name' => 'フランクフルト',
                'description' => null,
                'price' => 400,
            ],
            [
                'id' => 4,
                'item_category_id' => 2,
                'name' => 'フライドポテト',
                'description' => null,
                'price' => 500,
            ],
            [
                'id' => 5,
                'item_category_id' => 2,
                'name' => 'からあげ5個',
                'description' => null,
                'price' => 600,
            ],
            [
                'id' => 6,
                'item_category_id' => 2,
                'name' => 'やきとり3本',
                'description' => null,
                'price' => 500,
            ],
            [
                'id' => 7,
                'item_category_id' => 2,
                'name' => 'みそおでん2本',
                'description' => null,
                'price' => 500,
            ],
            [
                'id' => 8,
                'item_category_id' => 3,
                'name' => 'ソース焼きそば',
                'description' => null,
                'price' => 700,
            ],
            [
                'id' => 9,
                'item_category_id' => 3,
                'name' => '塩焼きそば',
                'description' => null,
                'price' => 700,
            ],
            [
                'id' => 10,
                'item_category_id' => 3,
                'name' => 'しょうゆラーメン',
                'description' => null,
                'price' => 700,
            ],
            [
                'id' => 11,
                'item_category_id' => 4,
                'name' => '五目チャーハン',
                'description' => null,
                'price' => 700,
            ],
            [
                'id' => 12,
                'item_category_id' => 4,
                'name' => 'エビピラフ',
                'description' => null,
                'price' => 700,
            ],
            [
                'id' => 13,
                'item_category_id' => 4,
                'name' => 'バターチキンカレー',
                'description' => null,
                'price' => 900,
            ],
            [
                'id' => 14,
                'item_category_id' => 4,
                'name' => 'カレーライス',
                'description' => null,
                'price' => 700,
            ],
            [
                'id' => 15,
                'item_category_id' => 4,
                'name' => 'カツカレー',
                'description' => null,
                'price' => 1000,
            ],
            [
                'id' => 16,
                'item_category_id' => 4,
                'name' => '牛カルビ丼',
                'description' => null,
                'price' => 900,
            ],
            [
                'id' => 17,
                'item_category_id' => 4,
                'name' => '豚カルビ丼',
                'description' => null,
                'price' => 900,
            ],
            [
                'id' => 18,
                'item_category_id' => 2,
                'name' => 'つぶ焼き4個',
                'description' => null,
                'price' => 1000,
            ],
            [
                'id' => 19,
                'item_category_id' => 2,
                'name' => 'イカ焼き',
                'description' => null,
                'price' => 1000,
            ],
            [
                'id' => 20,
                'item_category_id' => 2,
                'name' => '枝豆',
                'description' => null,
                'price' => 300,
            ],
        ]);
    }
}
