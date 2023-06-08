<div class="row row-cols-2 row-cols-md-3 g-3">
    @foreach ($filteredItems as $item)
    <div class="col">
        <div class="card h-100">
            {{-- 画像が出来次第、表示する --}}
            {{-- <img src="{{ asset('img/noimage.png') }}" class="card-img-top"> --}}
            <div class="card-body">
                <h4 class="card-title">{{ $item->name }}</h4>
                @if (!empty($item->description))
                <p class="card-subtitle small">{{ $item->description }}</p>
                @endif
                <p class="card-text">¥{{ number_format($item->price) }}</p>
                <a class="stretched-link" wire:click="onItemClicked({{ $item }})"></a>
            </div>
        </div>
    </div>
    @endforeach
</div>