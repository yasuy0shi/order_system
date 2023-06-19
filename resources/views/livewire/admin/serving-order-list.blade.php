@php
/**
 * X秒前、X分前、X時間前、といった表示に変換する。
 * 一分未満は秒、一時間未満は分、一日未満は時間を返す。
 *
 * @param   <String> $time_db       strtotime()で変換できる時間文字列 (例：yyyy/mm/dd H:i:s)
 * @return  <String>                X日前,などといった文字列
 **/
 function convert_to_fuzzy_time($time_db){
    $unix   = strtotime($time_db);
    $now    = time();
    $diff_sec   = $now - $unix;

    if($diff_sec < 60){
        $time   = $diff_sec;
        $unit   = "秒前";
    }
    elseif($diff_sec < 3600){
        $time   = $diff_sec/60;
        $unit   = "分前";
    }
    elseif($diff_sec < 86400){
        $time   = $diff_sec/3600;
        $unit   = "時間前";
    }
    return (int)$time .$unit;
}

// 未受け取りの注文番号
$unclaimedOrderIds = $servingOrders
    ->where('status', App\Enum\OrderStatus::COOKED->value)
    ->map->display_number->all();
$unclaimedOrderIdsStr = '[' . implode(',', $unclaimedOrderIds) . ']';
@endphp

<div>
    <div class="text-end mb-3">
        <button type="button"
            class="btn btn-sm btn-outline-danger"
            wire:click="$emit('onAnnounceUnclaimedOrderButtonClicked', {{ $unclaimedOrderIdsStr }})"
        >
            <i class="bi bi-bell"></i> 未受取者へ放送
        </button>
    </div>

    <ul class="list-group" wire:poll.120s="onPolled">
        @foreach ($servingOrders as $order)
        <li class="list-group-item list-group-item" aria-current="true">
            <div class="d-flex justify-content-between">
                <h5 class="mb-1">#{{ $order->display_number }}</h5>
                <small>{{ convert_to_fuzzy_time($order->created_at) }}</small>
            </div>
            <ul>
                @foreach ($order->orderDetails as $detail)
                <li>{{ $detail->item->name }} x {{ $detail->quantity }}</li>
                @endforeach
            </ul>
            <hr>
            <p>小計: ¥{{ number_format($order->orderDetails->sum('item.price')) }}</p>
            <div class="text-end">
                @switch($order->status)
                    @case(App\Enum\OrderStatus::SHIPPED->value)
                        <button type="button"
                            class="btn btn-sm btn-danger"
                            wire:click="$emit('onCooked', {{ $order->id }})"
                            wire:loading.attr="disabled"
                        >
                            <i class="bi bi-bell-fill"></i> できた
                        </button>
                        @break
                    @case(App\Enum\OrderStatus::COOKED->value)
                        <button type="button"
                            class="btn btn-sm btn-warning"
                            wire:click="$emit('onDelivered', {{ $order->id }})"
                        >
                            <i class="bi bi-hand-thumbs-up-fill"></i> 渡した
                        </button>
                        @break
                    @default
                @endswitch
            </div>
        </li>
        @endforeach
    </ul>
</div>

@push('scripts')
<script>
    function wait(timeout) {
        return new Promise((resolve, reject) => setTimeout(resolve, timeout));
    }

    function speak(text) {
        return new Promise((resolve, reject) => {
            let u = new SpeechSynthesisUtterance(text);
            u.lang = 'ja-JP';
            u.pitch = 1;
            u.rate = 1;
            u.onend = resolve;
            u.onerror = reject;
            speechSynthesis.speak(u);
        });
    }

    Livewire.on('onCooked', (orderId) => {
        speechSynthesis.cancel();

        new Promise((resolve, reject) => resolve())
            .then(() => speak(orderId + "番のお客さま、ご注文ができあがりました。"))
            .then(() => wait(500))
            .then(() => speak("うけとりぐちへ、いらしてください。"))
            .catch(e => console.log(e));
    });

    Livewire.on('onAnnounceUnclaimedOrderButtonClicked', (orderIds) => {
        speechSynthesis.cancel();
        const orderIdsStr = orderIds.map(function (orderId) {
            return orderId + '番';
        }).join('と');

        new Promise((resolve, reject) => resolve())
            .then(() => speak(orderIdsStr + "のお客さま、ご注文ができております。"))
            .then(() => wait(500))
            .then(() => speak("うけとりぐちへ、いらしてください。"))
            .catch(e => console.log(e));
    });

    // 定期実行する場合は下記に記述する
    // setInterval(function () {
        
    // }, 1000 * 60 * 10); // 10分毎に実行
</script>
@endpush
