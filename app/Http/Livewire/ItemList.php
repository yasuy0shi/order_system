<?php

namespace App\Http\Livewire;

use App\Models\Item;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class ItemList extends Component
{
    /**
     * 商品のコレクション
     *
     * @var Collection<Item>
     */
    public Collection $filteredItems;

    /**
     * 商品カテゴリID
     *
     * @var int|null
     */
    public ?int $itemCategoryId = null;

    /**
     * イベントリスナ配列
     *
     * @var array
     */
    protected $listeners = ['onItemCategoryTabClicked', 'onItemClicked'];

    /**
     * コンポーネントがインスタンス化された直後に呼ばれるライフサイクルフック
     * `render()` が呼び出される前に1回実行する
     *
     * @param Collection<Item> $items
     * @param int|null $itemCategoryId
     * @return void
     */
    public function mount(
        Collection $filteredItems,
        ?int $itemCategoryId = null
    ): void {
        $this->filteredItems = $filteredItems;
        $this->itemCategoryId = $itemCategoryId;
    }

    public function onItemCategoryTabClicked(?int $itemCategoryId): void
    {
        $this->itemCategoryId = $itemCategoryId;
        $this->filteredItems = is_null($itemCategoryId) ?
            Item::get()
            : Item::where('item_category_id', $itemCategoryId)->get();
    }

    public function onItemClicked(Item $item): void
    {
        $this->emit('addItemToCart', $item);
    }

    public function render()
    {
        return view('livewire.item-list');
    }
}
