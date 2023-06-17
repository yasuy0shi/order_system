<div class="row">
    <div class="col">
        <select
            class="form-select form-select-lg mb-3"
            aria-label=".form-select-lg"
            wire:model="boatId"
            wire:change="onSelected"
        >
            <option selected></option>
            @for($i = 1 ; $i <= 10 ; $i++)
            <option value="{{ $i }}">{{ $i }}</option>
            @endfor
          </select>
    </div>
    <div class="col">
        <button type="button"
            class="btn btn-lg btn-outline-danger"
            wire:click="$emit('onCallButtonClicked', {{ $boatId }})"
        >
            <i class="bi bi-bell"></i> 呼び出し
        </button>
    </div>
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

    Livewire.on('onCallButtonClicked', (boatId) => {
        speechSynthesis.cancel();

        new Promise((resolve, reject) => resolve())
            .then(() => speak("バナナボートでおまちの" + boatId + "番のお客さま"))
            .then(() => wait(500))
            .then(() => speak("のりばにおこしください。"))
            .catch(e => console.log(e));
    });

    // 定期実行する場合は下記に記述する
    // setInterval(function () {
        
    // }, 1000 * 60 * 10); // 10分毎に実行
</script>
@endpush
