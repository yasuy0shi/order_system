<?php

namespace App\Http\Livewire;

use App\Models\Item;
use App\Models\OrderDetail;
use App\Util\WireableCollection;
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
    protected $listeners = ['addItemToCart', 'onRemoved'];

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

    public function onPlusCounterClicked(int $orderDetailId): void
    {
    }

    public function onRemoved(int $itemId): void
    {
        $this->orderDetails = $this->orderDetails->reject(
            function ($orderDetail, int $key) use ($itemId) {
                return $orderDetail->item_id === $itemId;
            }
        );
    }

    public function render()
    {
        return view('livewire.cart');
    }
}
