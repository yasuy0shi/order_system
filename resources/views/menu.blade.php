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
                @livewire('toggle-cart')
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
    </div>

    @livewireScripts
</body>

<style>
body {
    padding-top: 70px;
}
</style>
</html>
