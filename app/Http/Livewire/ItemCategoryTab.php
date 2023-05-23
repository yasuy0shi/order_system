<?php

namespace App\Http\Livewire;

use App\Models\ItemCategory;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class ItemCategoryTab extends Component
{
    /**
     * 商品カテゴリのコレクション
     *
     * @var Collection<ItemCategory>
     */
    public Collection $itemCategories;

    /**
     * 選択した商品カテゴリID
     *
     * @var int|null
     */
    public ?int $selectedItemCategoryId = null;

    /**
     * イベントリスナ配列
     *
     * @var array
     */
    protected $listeners = ['onTabClicked'];

    /**
     * コンポーネントがインスタンス化された直後に呼ばれるライフサイクルフック
     * `render()` が呼び出される前に1回実行する
     *
     * @param Collection $itemCategories
     * @param ItemCategory|null $selectedItemCategory
     * @return void
     */
    public function mount(
        Collection $itemCategories,
        ?int $selectedItemCategoryId = null
    ): void {
        $this->itemCategories = $itemCategories;
        $this->selectedItemCategoryId = $selectedItemCategoryId;
    }

    /**
     * タブが押下された時に発行するイベント
     *
     * @param int|null $selectedItemCategoryId
     * @return void
     */
    public function onTabClicked(?int $selectedItemCategoryId): void
    {
        $this->selectedItemCategoryId = $selectedItemCategoryId;
        $this->emitTo('item-list', 'onItemCategoryTabClicked', $selectedItemCategoryId);
    }

    public function render()
    {
        return view('livewire.item-category-tab');
    }
}
