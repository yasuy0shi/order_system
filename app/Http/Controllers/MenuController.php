<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\ItemCategory;

class MenuController extends Controller
{
    public function index()
    {
        return view('menu', [
            'itemCategories' => ItemCategory::get(),
            'items' => Item::get(),
        ]);
    }
}
