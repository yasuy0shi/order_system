<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ToggleCart extends Component
{
    /**
     * カートを表示するか
     *
     * @var bool
     */
    public bool $showCart = false;

    /**
     * イベントリスナ配列
     *
     * @var array
     */
    protected $listeners = ['onClicked'];

    /**
     * コンポーネントがインスタンス化された直後に呼ばれるライフサイクルフック
     * `render()` が呼び出される前に1回実行する
     *
     * @param bool $showCart
     * @return void
     */
    public function mount($showCart = false): void
    {
        $this->showCart = $showCart;
    }

    /**
     * ボタンが押下された時に発行するイベント
     *
     * @return void
     */
    public function onClicked(): void
    {
        $this->showCart = !$this->showCart;
    }

    public function render()
    {
        return view('livewire.toggle-cart');
    }
}
