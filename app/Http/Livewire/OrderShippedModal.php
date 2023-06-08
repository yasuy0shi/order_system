<?php

namespace App\Http\Livewire;

use Livewire\Component;

class OrderShippedModal extends Component
{
    /**
     * 注文表示用番号
     *
     * @var int
     */
    public ?int $orderDisplayNumber = null;

    /**
     * イベントリスナ配列
     *
     * @var array
     */
    protected $listeners = ['onOrderShipped', 'onModalClosed'];

    /**
     * コンポーネントがインスタンス化された直後に呼ばれるライフサイクルフック
     * `render()` が呼び出される前に1回実行する
     *
     * @return void
     */
    public function mount(): void
    {
        $this->orderDisplayNumber = null;
    }

    public function onOrderShipped(int $orderDisplayNumber): void
    {
        $this->orderDisplayNumber = $orderDisplayNumber;
    }

    public function onModalClosed(): void
    {
        $this->orderDisplayNumber = null;
    }

    public function render()
    {
        return view('livewire.order-shipped-modal');
    }
}
