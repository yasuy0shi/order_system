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
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button
                        class="btn btn-lg btn-danger"
                        type="button"
                        onclick="event.preventDefault(); this.closest('form').submit();"
                    >
                        <i class="bi bi-door-closed"></i> ログアウト
                    </button>
                </form>
            </div>
        </nav>
    </header>

    <div class="container-fluid">
        <div class="card">
            <div class="card-header">未対応の注文</div>
            <div class="card-body">
                <ul class="list-group">
                    <li class="list-group-item list-group-item" aria-current="true">
                        <div class="d-flex justify-content-between">
                            <h5 class="mb-1">#3</h5>
                            <small>3分前</small>
                        </div>
                        <ul class="">
                            <li class="">アメリカンドッグ x 1</li>
                            <li class="">フランクフルト x 1</li>
                        </ul>
                        <div class="text-end">
                            <button type="button" class="btn btn-sm btn-danger">
                                <i class="bi bi-bell-fill"></i> できた
                            </button>
                            <button type="button" class="btn btn-sm btn-info d-none">
                                <i class="bi bi-hand-thumbs-up-fill"></i> 渡した
                            </button>
                        </div>
                    </li>
                    <li class="list-group-item list-group-item" aria-current="true">
                        <div class="d-flex justify-content-between">
                            <h5 class="mb-1">#2</h5>
                            <small>13分前</small>
                        </div>
                        <ul class="">
                            <li class="">フライドポテト x 2</li>
                            <li class="">ジンギスカン1人前 x 2</li>
                            <li class="">五目チャーハン x 3</li>
                        </ul>
                        <div class="text-end">
                            <button type="button" class="btn btn-sm btn-danger d-none">
                                <i class="bi bi-bell-fill"></i> できた
                            </button>
                            <button type="button" class="btn btn-sm btn-info">
                                <i class="bi bi-hand-thumbs-up-fill"></i> 渡した
                            </button>
                        </div>
                    </li>
                    <li class="list-group-item list-group-item list-group-item-secondary" aria-current="true">
                        <div class="d-flex justify-content-between">
                            <h5 class="mb-1">#1</h5>
                            <small>29分前</small>
                        </div>
                        <ul class="">
                            <li class="">バターチキンカレー x 1</li>
                            <li class="">しょうゆラーメン x 1</li>
                        </ul>
                        <div class="text-end">
                            <button type="button" class="btn btn-sm btn-danger d-none">
                                <i class="bi bi-bell-fill"></i> できた
                            </button>
                            <button type="button" class="btn btn-sm btn-info d-none">
                                <i class="bi bi-hand-thumbs-up-fill"></i> 渡した
                            </button>
                            <button type="button" class="btn btn-sm btn-primary disabled">
                                <i class="bi bi-emoji-sunglasses"></i> 完了！
                            </button>
                        </div>
                    </li>
                </ul>
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
