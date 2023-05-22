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
                'item_category_id' => 2,
                'name' => '枝豆',
                'description' => null,
                'price' => 300,
            ],
            [
                'id' => 2,
                'item_category_id' => 1,
                'name' => 'フライドポテト（S）',
                'description' => null,
                'price' => 300,
            ],
            [
                'id' => 3,
                'item_category_id' => 1,
                'name' => 'フライドポテト（L）',
                'description' => null,
                'price' => 500,
            ],
            [
                'id' => 4,
                'item_category_id' => 1,
                'name' => 'アメリカンドッグ',
                'description' => null,
                'price' => 300,
            ],
            [
                'id' => 5,
                'item_category_id' => 1,
                'name' => 'ジャンボフランクフルト',
                'description' => null,
                'price' => 400,
            ],
            [
                'id' => 6,
                'item_category_id' => 1,
                'name' => 'みそおでん（大・2本）',
                'description' => null,
                'price' => 500,
            ],
            [
                'id' => 7,
                'item_category_id' => 3,
                'name' => '焼きそば',
                'description' => null,
                'price' => 650,
            ],
            
            [
                'id' => 8,
                'item_category_id' => 3,
                'name' => '塩焼きそば',
                'description' => null,
                'price' => 650,
            ],
            [
                'id' => 9,
                'item_category_id' => 3,
                'name' => 'しょうゆラーメン',
                'description' => null,
                'price' => 700,
            ],
            [
                'id' => 10,
                'item_category_id' => 3,
                'name' => 'あんかけラーメン',
                'description' => null,
                'price' => 850,
            ],
            [
                'id' => 11,
                'item_category_id' => 3,
                'name' => 'あんかけ焼きそば',
                'description' => null,
                'price' => 850,
            ],
            [
                'id' => 12,
                'item_category_id' => 4,
                'name' => 'カレーライス',
                'description' => null,
                'price' => 700,
            ],
            [
                'id' => 13,
                'item_category_id' => 4,
                'name' => 'エビピラフ',
                'description' => null,
                'price' => 700,
            ],
            [
                'id' => 14,
                'item_category_id' => 4,
                'name' => '五目チャーハン',
                'description' => null,
                'price' => 700,
            ],
            [
                'id' => 15,
                'item_category_id' => 4,
                'name' => 'ナシゴレン',
                'description' => null,
                'price' => 800,
            ],
            [
                'id' => 16,
                'item_category_id' => 4,
                'name' => 'カツカレー',
                'description' => null,
                'price' => 1000,
            ],
            [
                'id' => 17,
                'item_category_id' => 3,
                'name' => 'カツラーメン',
                'description' => null,
                'price' => 1000,
            ],
            [
                'id' => 18,
                'item_category_id' => 4,
                'name' => '豚カルビ丼',
                'description' => null,
                'price' => 900,
            ],
            [
                'id' => 19,
                'item_category_id' => 4,
                'name' => '牛カルビ丼',
                'description' => null,
                'price' => 900,
            ],
            [
                'id' => 20,
                'item_category_id' => 1,
                'name' => 'ザンギ（5個）',
                'description' => null,
                'price' => 600,
            ],
            [
                'id' => 21,
                'item_category_id' => 1,
                'name' => '焼き鳥（3本）',
                'description' => null,
                'price' => 500,
            ],
            [
                'id' => 22,
                'item_category_id' => 5,
                'name' => 'ジンギスカン（1人前）',
                'description' => null,
                'price' => 1500,
            ],
            [
                'id' => 23,
                'item_category_id' => 2,
                'name' => 'つぶ焼き',
                'description' => null,
                'price' => 1000,
            ],
            [
                'id' => 24,
                'item_category_id' => 2,
                'name' => 'イカ焼き',
                'description' => null,
                'price' => 1000,
            ],
            [
                'id' => 25,
                'item_category_id' => 1,
                'name' => 'かき氷',
                'description' => null,
                'price' => 300,
            ],
            [
                'id' => 26,
                'item_category_id' => 6,
                'name' => '生ビール',
                'description' => null,
                'price' => 600,
            ],
            [
                'id' => 27,
                'item_category_id' => 6,
                'name' => '缶ビール',
                'description' => null,
                'price' => 500,
            ],
            [
                'id' => 28,
                'item_category_id' => 7,
                'name' => 'ノンアルコール',
                'description' => null,
                'price' => 400,
            ],
            [
                'id' => 29,
                'item_category_id' => 7,
                'name' => 'ペットボトル',
                'description' => null,
                'price' => 300,
            ],
            [
                'id' => 30,
                'item_category_id' => 6,
                'name' => 'テキーラ',
                'description' => null,
                'price' => 500,
            ],
            [
                'id' => 31,
                'item_category_id' => 6,
                'name' => 'クーニャン',
                'description' => null,
                'price' => 500,
            ],
            [
                'id' => 32,
                'item_category_id' => 6,
                'name' => 'ウーロンハイ',
                'description' => null,
                'price' => 500,
            ],
            [
                'id' => 33,
                'item_category_id' => 6,
                'name' => '緑茶ハイ',
                'description' => null,
                'price' => 500,
            ],
            [
                'id' => 34,
                'item_category_id' => 6,
                'name' => 'ハイボール',
                'description' => null,
                'price' => 500,
            ],
            [
                'id' => 35,
                'item_category_id' => 6,
                'name' => 'イエーガー',
                'description' => null,
                'price' => 500,
            ],
            [
                'id' => 36,
                'item_category_id' => 8,
                'name' => 'BBQコーナーのご利用（お一人様）',
                'description' => '※ 施設料、トイレ使用料を含みます。',
                'price' => 1000,
            ],
            [
                'id' => 37,
                'item_category_id' => 8,
                'name' => 'レンタルコンロ',
                'description' => null,
                'price' => 1000,
            ],
            [
                'id' => 38,
                'item_category_id' => 8,
                'name' => '道産北海炭',
                'description' => null,
                'price' => 500,
            ],
            [
                'id' => 39,
                'item_category_id' => 8,
                'name' => 'パラソル',
                'description' => null,
                'price' => 1000,
            ],
            [
                'id' => 40,
                'item_category_id' => 8,
                'name' => 'シャワーのご利用',
                'description' => null,
                'price' => 400,
            ],
            [
                'id' => 41,
                'item_category_id' => 8,
                'name' => '浮き輪',
                'description' => null,
                'price' => 1000,
            ],
            [
                'id' => 42,
                'item_category_id' => 8,
                'name' => 'サマーベッド',
                'description' => null,
                'price' => 1000,
            ],
            [
                'id' => 43,
                'item_category_id' => 8,
                'name' => 'ビーチサンダル',
                'description' => null,
                'price' => 1000,
            ],
            [
                'id' => 44,
                'item_category_id' => 8,
                'name' => 'サーフパンツ',
                'description' => null,
                'price' => 2500,
            ],
            [
                'id' => 45,
                'item_category_id' => 8,
                'name' => 'コインロッカー',
                'description' => null,
                'price' => 500,
            ],
            [
                'id' => 46,
                'item_category_id' => 8,
                'name' => '温水シャワーのご利用（1回）', // TODO: id=40と被っている可能性あり
                'description' => null,
                'price' => 400,
            ],
            [
                'id' => 47,
                'item_category_id' => 8,
                'name' => 'トイレのご利用（1回）',
                'description' => null,
                'price' => 200,
            ],
            [
                'id' => 48,
                'item_category_id' => 8,
                'name' => '更衣室のご利用（1回）',
                'description' => null,
                'price' => 100,
            ],
        ]);
    }
}
