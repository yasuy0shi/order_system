<!doctype html>
<html>

<head>
    <meta charset='utf-8' />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Menu</title>

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <header>
        <nav class="navbar fixed-top navbar-dark bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">Menu</a>
            </div>
        </nav>
    </header>

    <div class="container-fluid">
        <ul class="nav nav-tabs mb-3">
            <li class="nav-item">
                <a href="/" @class([
                    'nav-link',
                    'active' => empty($selectedItemCategory),
                ])>すべて</a>
            </li>
            @foreach ($itemCategories as $itemCategory)
            <li class="nav-item">
                <a @class([
                    'nav-link',
                    'active' => $itemCategory->is($selectedItemCategory),
                ]) href="/{{ $itemCategory->id }}">{{ $itemCategory->name }}</a>
            </li>
            @endforeach
        </ul>

        <div class="row row-cols-2 row-cols-sm-2 row-cols-md-3 g-3">
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
    </div>
</body>

<style>
body {
    padding-top: 70px;
}
</style>
</html>
