<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $sql = <<<SQL
CREATE TABLE `orders` (
    `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '注文ID',
    `user_id` int(10) UNSIGNED NOT NULL COMMENT 'ユーザID',
    `created_at` datetime NOT NULL COMMENT '作成日時',
    `updated_at` datetime DEFAULT NULL COMMENT '更新日時',
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='注文';
SQL;
        DB::statement($sql);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
