<!doctype html>
<html>

<head>
    <meta charset='utf-8' />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">

    <title>Menu</title>

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @livewireStyles
</head>

<body>
    <header>
        <nav class="navbar fixed-top navbar-dark bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">メニュー</a>
                <button
                    class="btn btn-lg btn-primary"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#cart"
                    aria-expanded="true"
                >
                    <i class="bi bi-cart4"></i> 
                    <span class="if-collapsed">ご注文を表示する</span>
                    <span class="if-not-collapsed">ご注文を非表示にする</span>
                </button>
            </div>
        </nav>
    </header>

    <div class="container-fluid">
        @livewire('item-category-tab', [
            'itemCategories' => $itemCategories,
        ])
        @livewire('item-list', [
            'filteredItems' => $items,
        ])
        @livewire('cart')
        @livewire('order-shipped-modal')
    </div>

    @livewireScripts
    @stack('scripts')
</body>

<style>
body {
    padding-top: 70px;
}
[data-bs-toggle="collapse"].collapsed .if-not-collapsed {
  display: none;
}
[data-bs-toggle="collapse"]:not(.collapsed) .if-collapsed {
  display: none;
}
</style>
</html>
