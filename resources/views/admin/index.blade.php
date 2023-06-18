<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">

    <title>管理者ページ</title>

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @livewireStyles
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-danger">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ route('admin.index') }}">管理者ページ</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('admin.banana') }}">バナナボート</a>
                        </li>
                    </ul>
                    <form class="d-flex" method="POST" action="{{ route('admin.logout') }}">
                        @csrf
                        <button
                            class="btn btn-danger"
                            style="--bs-btn-padding-x: 0rem; --bs-btn-padding-y: 0rem;"
                            type="button"
                            onclick="event.preventDefault(); this.closest('form').submit();"
                        >
                            <i class="bi bi-door-closed"></i> ログアウト
                        </button>
                    </form>
                </div>
            </div>
        </nav>
    </header>

    <div class="container-fluid">
        <div class="card">
                <h5 class="card-header d-flex justify-content-between align-items-center">
                    未対応の注文
                </h5>
            <div class="card-body">
                @livewire('admin.serving-order-list', compact('servingOrders'))
            </div>
        </div>
    </div>

    @livewireScripts
    @stack('scripts')
</body>

<style>
body {
    padding-top: 70px;
}
</style>
</html>
