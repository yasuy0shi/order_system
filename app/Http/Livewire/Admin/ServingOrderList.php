<?php

namespace App\Http\Livewire\Admin;

use App\Enum\OrderStatus;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Livewire\Component;

class ServingOrderList extends Component
{
    /**
     * 対応中の注文コレクション
     *
     * @var Collection<Order>
     */
    public Collection $servingOrders;

    /**
     * イベントリスナ配列
     *
     * @var array
     */
    protected $listeners = [
        'onPolled',
        'onAnnounceUnclaimedOrderButtonClicked',
        'onCooked',
        'onDelivered'
    ];

    /**
     * コンポーネントがインスタンス化された直後に呼ばれるライフサイクルフック
     * `render()` が呼び出される前に1回実行する
     *
     * @param Collection<Item> $items
     * @param int|null $itemCategoryId
     * @return void
     */
    public function mount(
        Collection $servingOrders
    ): void {
        $this->servingOrders = $servingOrders;
    }

    public function onPolled(): void
    {
        $this->servingOrders = Order::with(['orderDetails.item'])
        ->whereDate('created_at', Carbon::today())
        ->where('status', '!=', OrderStatus::DELIVERED)
        ->orderBy('id', 'DESC')
        ->get();
    }

    public function onAnnounceUnclaimedOrderButtonClicked(array $orderIds): void
    {
        $this->emit('onPolled');
    }

    public function onCooked(int $orderId): void
    {
        $order = Order::findOrFail($orderId);
        $order->status = OrderStatus::COOKED->value;
        $order->save();

        $this->emit('onPolled');
    }

    public function onDelivered(int $orderId): void
    {
        $order = Order::findOrFail($orderId);
        $order->status = OrderStatus::DELIVERED->value;
        $order->save();

        $this->emit('onPolled');
    }

    public function render()
    {
        return view('livewire.admin.serving-order-list');
    }
}
