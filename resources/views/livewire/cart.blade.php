@php
    $subtotal = 0;
    foreach ($orderDetails as $key => $orderDetail) {
        $subtotal += $orderDetail->item->price * $orderDetail->quantity;
    }
@endphp

<div id="cart" class="row sticky-bottom align-items-end justify-content-end">
    <div class="col-xs-12 col-sm-12 col-md-8">
        <div class="card">
            <div class="card-body">
                <button type="button" class="btn btn-lg btn-close float-end" aria-label="Close"></button>
                <h4><i class="bi bi-cart4"></i> ご注文内容</h4>
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($orderDetails as $orderDetail)
                        <tr class="align-middle">
                            <th scope="row">
                                {{ $orderDetail->item->name }}
                            </th>
                            <td>
                                ¥{{ number_format($orderDetail->item->price) }}
                            </td>
                            <td style="min-width: 110px;">
                                <div class="input-group input-group-sm">
                                    <button class="btn btn-primary" type="button">
                                        <i class="bi bi-dash-lg"></i>
                                    </button>
                                    <input type="number"
                                        value="{{ $orderDetail->quantity }}"
                                        min="1"
                                        max="99"
                                        class="form-control text-center"
                                    >
                                    <button class="btn btn-primary" type="button">
                                        <i class="bi bi-plus-lg"></i>
                                    </button>
                                </div>
                            </td>
                            <td class="text-end">
                                <button class="btn btn-outline-danger"
                                    type="button"
                                    wire:click="$emit('onRemoved', {{ $orderDetail->item_id }})"
                                >
                                    <i class="bi bi-trash-fill"></i>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                      <tr>
                        <td colspan="3">小計</td>
                        <td class="text-end">
                            ¥{{ number_format($subtotal) }}
                        </td>
                      </tr>
                    </tbody>
                  </table>
                <a href="#" class="btn btn-lg btn-primary float-end">注文を確定する</a>
            </div>
        </div>
    </div>
</div>
