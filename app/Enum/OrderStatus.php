<?php

namespace App\Enum;

enum OrderStatus: int
{
    /**
     * 注文を受け付けた状態
     */
    case SHIPPED = 1;

    /**
     * 注文の品の調理が完了した状態
     */
    case COOKED = 2;

    /**
     * 注文の品を渡した状態（=完了状態）
     */
    case DELIVERED = 3;
}
