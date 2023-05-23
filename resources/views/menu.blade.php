<!doctype html>
<html>

<head>
    <meta charset='utf-8' />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Menu</title>

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @livewireStyles
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
        @livewire('item-category-tab', [
            'itemCategories' => $itemCategories,
        ])
        @livewire('item-list', [
            'items' => $items,
        ])
    </div>

    @livewireScripts
</body>

<style>
body {
    padding-top: 70px;
}
</style>
</html>
