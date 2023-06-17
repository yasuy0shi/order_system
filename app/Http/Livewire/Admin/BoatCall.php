<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class BoatCall extends Component
{
    /**
     * ボート番号
     *
     * @var int
     */
    public int $boatId;

    /**
     * イベントリスナ配列
     *
     * @var array
     */
    protected $listeners = [
        'onSelected',
        'onCallButtonClicked',
    ];

    /**
     * コンポーネントがインスタンス化された直後に呼ばれるライフサイクルフック
     * `render()` が呼び出される前に1回実行する
     *
     * @param int $boatId
     * @return void
     */
    public function mount(): void
    {
        $this->boatId = 1;
    }

    public function onSelected(): void
    {
    }

    public function onCallButtonClicked(int $boatId): void
    {
    }

    public function render()
    {
        return view('livewire.admin.boat-call');
    }
}
