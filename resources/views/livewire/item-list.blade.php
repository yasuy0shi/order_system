<div class="row row-cols-2 row-cols-md-3 g-3">
    @foreach ($items as $item)
    <div class="col">
        <div class="card h-100">
            <img src="{{ asset('img/noimage.png')}}" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title">{{ $item->name }}</h5>
                @if (!empty($item->description))
                <p class="card-subtitle small">{{ $item->description }}</p>
                @endif
                <p class="card-text">¥{{ number_format($item->price) }}</p>
            </div>
        </div>
    </div>
    @endforeach
</div>