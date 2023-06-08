<div
    id="orderShipped"
    class="modal fade"
    data-bs-backdrop="static"
    data-bs-keyboard="false"
    tabindex="-1"
    aria-labelledby="orderShippedModalLabel"
    aria-hidden="true"
    wire:ignore.self
    wire:loading.class.remove="show"
>
    <div class="modal-dialog modal-xl modal-dialog-centered">
      <div class="modal-content">
            <div class="modal-header">
                <h5 id="orderShippedModalLabel" class="modal-title">注文完了</h5>
                <button type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                    wire:click="$emit('onModalClosed')"
                ></button>
            </div>
            <div class="modal-body">
                <p class="text-center">ご注文いただき、ありがとうございます。</p>
                <p class="text-center">
                    ご注文番号は、
                    <span class="display-2 lead" wire:loading.remove>
                        <strong>{{ $orderDisplayNumber }}</strong>
                    </span>
                    番です。
                </p>
                <p class="text-center">出来上がりましたら、スタッフより番号をお呼びいたします。</p>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    Livewire.on('onOrderShipped', (orderDisplayNumber) => {
        const orderShippedModal = new bootstrap.Modal(
            document.getElementById('orderShipped')
        );
        orderShippedModal.show();
    });
</script>
@endpush
