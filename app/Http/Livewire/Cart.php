<?php

namespace App\Http\Livewire;

use App\Enum\OrderStatus;
use App\Models\Item;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Util\WireableCollection;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Cart extends Component
{
    /**
     * 注文一覧
     *
     * @var WireableCollection<OrderDetail>
     */
    public WireableCollection $orderDetails;

    /**
     * イベントリスナ配列
     *
     * @var array
     */
    protected $listeners = [
        'addItemToCart',
        'clear',
        'onPlusCounterClicked',
        'onMinusCounterClicked',
        'onRemoved',
        'onSaved',
    ];

    /**
     * コンポーネントがインスタンス化された直後に呼ばれるライフサイクルフック
     * `render()` が呼び出される前に1回実行する
     *
     * @param int|null $itemCategoryId
     * @return void
     */
    public function mount(): void
    {
        $this->orderDetails = new WireableCollection();
    }

    public function addItemToCart(Item $item): void
    {
        if ($this->orderDetails->pluck('item_id')->contains($item->id)) {
            return;
        }

        $orderDetail = new OrderDetail([
            'item_id' => $item->id,
            'quantity' => 1,
        ]);
        $orderDetail->item = $item;

        $this->orderDetails->push($orderDetail);
    }

    public function clear(): void
    {
        $this->orderDetails = new WireableCollection();
    }

    public function onPlusCounterClicked(int $itemId): void
    {
        $this->orderDetails->firstWhere('item_id', $itemId)->quantity++;
    }

    public function onMinusCounterClicked(int $itemId): void
    {
        $orderDetail = $this->orderDetails->firstWhere('item_id', $itemId);
        $orderDetail->quantity--;

        if (0 >= $orderDetail->quantity) {
            $this->emit('onRemoved', $itemId);
        }
    }

    public function onRemoved(int $itemId): void
    {
        $this->orderDetails = $this->orderDetails->reject(
            function ($orderDetail) use ($itemId) {
                return $orderDetail->item_id === $itemId;
            }
        );
    }

    public function onSaved(): void
    {
        DB::transaction(
            function () {
                // 注文表示用番号
                // NOTE: 日毎にインクリメントを行う
                $displayNumber = Order::lockForUpdate()
                    ->whereDate('created_at', Carbon::today())
                    ->count() + 1;

                $order = new Order([
                    'display_number' => $displayNumber,
                    'user_id' => 0, // NOTE: 仮の値として保持のみ行う
                    'status' => OrderStatus::SHIPPED->value,
                ]);
                $order->save();

                $this->orderDetails->each(
                    function ($detail) use ($order) {
                        $orderDetail = new OrderDetail([
                            'item_id' => $detail->item_id,
                            'quantity' => $detail->quantity,
                        ]);
                        $order->orderDetails()->save($orderDetail);
                    }
                );

                $this->emit('onOrderShipped', $displayNumber);
                $this->emit('clear');
            }
        );
    }

    public function render()
    {
        return view('livewire.cart');
    }
}
