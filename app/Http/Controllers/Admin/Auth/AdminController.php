<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Enum\OrderStatus;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function index()
    {
        $servingOrders = Order::with(['orderDetails.item'])
            ->whereDate('created_at', Carbon::today())
            ->where('status', '!=', OrderStatus::DELIVERED->value)
            ->orderBy('id', 'DESC')
            ->get();

        return view('admin.index', compact('servingOrders'));
    }

    public function banana()
    {
        return view('admin.banana');
    }
}
