<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\ItemCategory;

class MenuController extends Controller
{
    public function index(?ItemCategory $itemCategory = null)
    {
        // TODO: 複雑化したらRepositoryパターンにする
        $itemCategories = ItemCategory::get();
        $items = empty($itemCategory)
            ? Item::get()
            : Item::where('item_category_id', $itemCategory->id)->get();

        return view('menu', array_merge(
            ['selectedItemCategory' => $itemCategory],
            compact('itemCategories', 'items')
        ));
    }
}
