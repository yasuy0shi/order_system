<button
    id="cart-toggler"
    class="btn btn-lg btn-primary"
    type="button"
    wire:click="$emit('onClicked')"
>
    <i class="bi bi-cart4"></i> 
    @if (!$showCart)
    ご注文を表示する
    @else
    ご注文を非表示にする
    @endif
</button>
