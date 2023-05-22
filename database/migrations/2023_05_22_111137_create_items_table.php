<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * 
     * @return void
     */
    public function up(): void
    {
        $sql = <<<SQL
CREATE TABLE `items` (
    `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '商品ID',
    `item_category_id` int(10) UNSIGNED NOT NULL COMMENT '商品カテゴリID',
    `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL COMMENT '商品名',
    `description` varchar(255) COLLATE utf8mb4_general_ci COMMENT '商品説明',
    `price` int(10) UNSIGNED NOT NULL COMMENT '価格',
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='商品';
SQL;
        DB::statement($sql);
    }

    /**
     * Reverse the migrations.
     * 
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
