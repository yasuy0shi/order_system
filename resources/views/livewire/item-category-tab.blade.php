<ul class="nav nav-pills mb-3">
    <li class="nav-item">
        <a @class([
            'nav-link',
            'active' => is_null($selectedItemCategoryId),
        ]) wire:click="$emit('onTabClicked', null)">すべて</a>
    </li>
    @foreach ($itemCategories as $itemCategory)
    <li class="nav-item">
        <a @class([
            'nav-link',
            'active' => ($selectedItemCategoryId === $itemCategory->id),
        ]) wire:click="$emit('onTabClicked', {{ $itemCategory->id }})">
            {{ $itemCategory->name }}
        </a>
    </li>
    @endforeach
</ul>
